<?php

class Usuario {

    public static function existeUsuario($dni) {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = ($database->count('usuarios', ['dni' => $dni]) > 0) ? true : false;
        $database->closeConnection();
        return $datos;
    }

    public static function insertDB($data)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->insert('usuarios', $data);
        $database->closeConnection();
        return $datos;
    }

    public static function duplicateUsuario($dni)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->select('usuarios', '*', ["dni[~]" => $dni]);
        $database->closeConnection();
        return $datos;
    }


    public static function searchUsuarioDB($dni, $clave) {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->count('usuarios', [
                'AND' => [
                    'dni' => $dni,
                    'contraseña' => $clave
                ]
            ]) > 0;
        $database->closeConnection();
        return $datos;
    }
}

?>
