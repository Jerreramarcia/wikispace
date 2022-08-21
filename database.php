<?php

class database{

    var $usuario="root";
    var $password="";
    var $servidor="localhost";
    var $basededatos="wikispace";


    public function connect(){
        $conexion = mysqli_connect("localhost", "root","","wikispace") or die ("No se ha podido conectar a la base de datos");
        return $conexion;
    }

    public function request($search){
        $db = new Database();
        $db = $db->connect();
        $exit = mysqli_query($db, $search);
    }
}

?>