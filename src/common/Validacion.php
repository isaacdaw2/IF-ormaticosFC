<?php
    class Validacion extends Singleton    {
        private $_rules = array(); // _rules['nombre'] => 'required|alpha_space', _rules['edad'] => 'required|numeric'
        private $_errors = array(); // _errors['nombre'] = array('value' => '','rule' => 'required') o _errors['nombre'] = array('value' => 'Pedro5','rule' => 'alpha_space') o _errors['nombre'] = array('value' => 'Pedro','rule' => 'ok')
        private $_oks = array(); // _oks['nombre'] =>'Luis', _oks['apellidos'] => "Sánchez Ruiz"
        private $_errorFoto;

        private $_exists;
        
        public function addRules($rules){
            $this->_rules = $rules;
        }
        
        public function setExists($dup) {
            $this->_exists = $dup;
        }

        public function run($toValidate){
            foreach ($toValidate as $field => $value) {
                if (!array_key_exists($field, $this->_rules)) continue;
                $rules = explode('|', $this->_rules[$field]);
                if (in_array('required', $rules)) {
                    $this->_validate_required($field, $value);
                    if (getArray($this->getErrorsByField($field), 'rule') == 'required')
                        continue;
                }
                foreach ($rules as $rule) {
                    if ($rule == 'required') continue;
                    $method = '_validate_' . $rule;
                    if (!method_exists(__CLASS__, $method)) continue;
                    $this->$method($field, $value);
                }
                if (empty($this->getErrorsByField($field)))
                    $this->_setError($field, $value, 'ok');
            }
        }

        public function isValid(){
            if (count($this->_oks) == count($this->_errors)){
                return true;
            }
            return false;
        }

        public function getStrRule($rule){
            switch ($rule) {
                // solo hay una posible coincidencia, pero ya añadiremeos más
                case 'alpha_space':
                    return 'Solo puede contener letras (a-z)';
                case 'email':
                    return 'Introduzca bien el mail';
                case 'numeric':
                    return 'Solo puede contener numeros (0-9) y maximo 0-99';
                case 'foto':
                    return $this->_errorFoto;
                case 'duplicate': 
                    return 'Dni duplicado';
                case 'dni':
                    return 'DNI invalido';
                default:
                    return 'Algún fallo desconocido.';
            }
            return '';
        }
        public function restoreValue($name){
            if (array_key_exists($name, $this->_errors)){
            $value = $this->_errors[$name]['value'];
            return $value;
            }
        return '';
        }
        
        private function _validate_duplicate($field, $value) {
            if ($this->_exists)
                $this->_setError($field, $value, 'duplicate');
        }

        public function getOks(){
            return $this->_oks;
        }

        // método que devuelve el elemento del array _errors de un campo (si existe)
        public function getErrorsByField($field){
            return getArray($this->_errors, $field, array());
        }

        public function getErrors(){
            return $this->_errors;
        }

        private function _setError($field, $value, $rule){
            $this->_errors[$field] = array(
                'value' => $value,
                'rule' => $rule);
            if ($rule == 'ok') {
                $this->_oks[$field] = $value;
            }
        }
        // Método que valida que el dato introducido en el campo es correcto
        // Observa que la 2ª parte del nombre del método (alpha_space) coincide con el tipo de dato
        // que se utiliza en el array $_rules de la clase mdlPaso1
        private function _validate_alpha_space($field, $value){
            if (!preg_match('/^[a-zÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ][a-zÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s]+$/i', $value))
                $this->_setError($field, $value, 'alpha_space');
        }
        
        private function _validate_alpha_space_num($field, $value){
            if (!preg_match('/^[a-zÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ][a-zÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\s0-9]{2,35}$/i', $value))
                $this->_setError($field, $value, 'alpha_space_num');
        }
       
        private function _validate_numeric($field, $value){
            if (!preg_match('/^[0-9]{1,2}$/', $value))
                $this->_setError($field, $value, 'numeric');
        }

        private function _validate_telefono($field, $value){
            if (!preg_match('/[0-9]{9,10}/', $value))
                $this->_setError($field, $value, 'telefono');
        }
        
        private function _validate_foto($field, $value) {
            if ($value["error"] == UPLOAD_ERR_OK) {
                if (($value["type"] != "image/pjpeg") and ( $value["type"] != "image/jpeg")) {
                    $this->_setError($field, $value, 'foto');
                    $this->_errorFoto = "<b>JPEG fotos solamente, gracias!</b>";
                } elseif (!move_uploaded_file($value["tmp_name"], "fotos/" . basename($value["name"]))) {
                    $this->_setError($field, $value, 'foto');
                    $this->_errorFoto = "<b>Lo sentimos, hubo un problema al subir esa foto</b>" . $value["error"];
                } else
                    $this->_setError($field, $value, 'ok');
            } else {
                $this->_setError($field, $value, 'foto');
                switch ($value["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $this->_errorFoto = "<b>La foto es más grande de lo que permite el servidor.<b>";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $this->_errorFoto = "<b>La foto es más grande de lo que permite el formulario.<b>";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $this->_setError($field, $value, 'required');

                        if($_SESSION['edicion'])$this->_setError($field, $value, 'ok');
                        break;
                    default:
                        $this->_errorFoto = "Ponte en contacto con el administrador del servidor para obtener ayuda.";
                }
            }
        }

        // método que añade una elemento al array _errors cuando un campo obligatorio no se ha completado
        private function _validate_required($field, $value) {
            $valor = $value;
            if (is_array($value)){
                $valor = implode(',', $value);
            }
            if (strlen($valor) == 0)
                $this->_setError($field, $value, 'required');
            }

        public function restoreCheckboxes($name, $value, $default = false) {
            //si _errors está vacío, es la primera vez que se visuliza el formulario
            if ($this->_errors) {
                if (array_key_exists($name, $this->_errors)) {
                //si no se marca ninguna casilla, _errors[$name]['value'] no existe y foreach da error
                    if ($this->_errors[$name]['value'])
                        foreach ($this->_errors[$name]['value'] as $valor) {
                            if ($valor == $value)
                            return 'checked';
                        }
                }
                // si el nombre del campo no está en _errors, es que es la primera vez que se visualiza el formulario
                // y es cuando podemos poner valores por defecto.
            } elseif ($default)
            return 'checked';
        }

        public function restoreRadios($name, $value, $default = false){
            if (array_key_exists($name, $this->_errors)) {
                if ($this->_errors[$name]['value'] == $value)
                    return 'checked';
                // si el nombre del campo no está en _errors, es que es la primera vez que se visualiza el formulario
                // y es cuando podemos poner valores por defecto.
            } elseif ($default)
                return 'checked';
            return '';
        }

        public function restoreSelects($name, $value, $default = false){
            //si _errors está vacío, es la primera vez que se visualiza el formulario
            if ($this->_errors) {
                if (array_key_exists($name, $this->_errors)) {
                    // _errors[$name]['value'] es un array (Bicicleta, Tren etc.)
                    foreach ($this->_errors[$name]['value'] as $valor) {
                        if ($valor == $value)
                            return 'selected';
                    }
                }
                // es la primera vez que se visualiza el formulario y podemos poner valores por defecto.
            } elseif ($default)
                return 'selected';
        }

        private function _validate_integer($field, $value){
            if (!filter_var($value, FILTER_VALIDATE_INT))
            $this->_setError($field, $value, 'integer');
            }
        
         private function _validate_dni($field, $value){
            if (!preg_match('/^[0-9]{8}[A-Z]{1}$/i', $value))
            $this->_setError($field, $value, 'dni');
            }
        
            private function _validate_email($field, $value) {
                $valor = $value;
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->_setError($field, $value, 'email');
                }
            }
        
    }
?>
