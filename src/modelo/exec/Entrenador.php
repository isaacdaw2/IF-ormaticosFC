<?php

class Entrenador {

    public static function insertDB($id_entrenadores)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->insert('entrenadores', $id_entrenadores);
        $database->closeConnection();
        return $datos;
    }

    public static function duplicateDNI($id_socio)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->select('entrenadores', '*', ["id_entrenadores[~]" => $id_entrenadores]);
        $database->closeConnection();
        return $datos;
    }
}

?>