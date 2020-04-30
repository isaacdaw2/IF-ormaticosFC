<?php
class mdlAbonoSocio extends Singleton
{
    const PAGE = 'insercion';
    public function onGestionPagina()
    {
        if (getGet('pagina') != self::PAGE) {
            return;
        }

// Validamos
        $val = Validacion::getInstance();
// Validamos los elementos que hay en $_POST
        $toValidate = ($_POST);
        $rules = array(
            'nombre' => 'required|alpha_space',
            'apellidos' => 'required|alpha_space',
            'dni' => 'required|dni|duplicate',
            'email' => 'required|email',
            'foto' => 'foto'
        );
        $dni = getPost('dni');
        if (usuario::duplicateDNI($dni)) {
            $val->setExists(true);
        }

        $val->addRules($rules);
        
        if(isset($_POST['insercion'])){
        $toValidate=array();
        foreach($rules as $key => $valor){
            $toValidate[$key]=getPost($key);
        }
         $toValidate =array_merge($toValidate, $_FILES);
        }

        $val->run($toValidate);
        if (!is_null(getPost(self::PAGE))) {
            if ($val->isValid()) {
                // Guardamos los datos en session
                $_SESSION[self::PAGE] = $val->getOks();
                // el argumento de InsertDB() debe ser un array porque el método insert
                // que utiliza medoo espera un array como argumento así que $nombre debe ser un array
                // aunque sólo tenga un elemento (el nombre)
                $_SESSION['insercion']['foto'] = $_SESSION['insercion']['foto']['name'];
                $data = $_SESSION['insercion'];
                // el método insert() que invoca Usuario::insertDB devuelve el valor del ID
                // del último registro insertado
                $datos = usuario::insertDB($data);
                if ($datos) {
                    $_SESSION['ins'] = true;
                } else {
                    $_SESSION['ins'] = false;
                }

                // Cambiamos el paso
                redirectTo('index.php?pagina=mensaje');
            }
        }
    }
    public function onCargarVista($path)
    {
        if (getGet('pagina') != self::PAGE) {
            return;
        }

        ob_start();
        include $path;
        $vista = ob_get_contents();
        ob_end_clean();
        echo AbonoSocioParser::loadContent($vista);
    }
}
