<?php

class Socio {

    public static function insertDB($id_socio)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->insert('socios', $id_socio);
        $database->closeConnection();
        return $datos;
    }

    public static function duplicateDNI($id_socio)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->select('socios', '*', ["id_socio[~]" => $id_socio]);
        $database->closeConnection();
        return $datos;
    }
}

?>