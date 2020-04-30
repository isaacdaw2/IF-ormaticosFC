<?php

class Jugador {

    public static function insertDB($id_jugador)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->insert('jugadores', $id_jugador);
        $database->closeConnection();
        return $datos;
    }

    public static function duplicateDNI($id_jugador)
    {
        $database = medoo::getInstance();
        $database->openConnection(MYSQL_CONFIG);
        $datos = $database->select('jugadores', '*', ["id_jugador[~]" => $id_jugador]);
        $database->closeConnection();
        return $datos;
    }
}

?>