<?php

if (isset($_POST["borrar"])) {
    if (!isset($_SESSION["username"])) {
        session_start();
    }

    $idevento = $_POST["idevento"];
    require_once("database.php");
    $db = new database();
    $db = $db->connect();

    $query = "DELETE FROM event WHERE idevent='$idevento'";
    $db->query($query);

    if ($db->connect_error) {
        die("Conexión a la base de datos fallida");
    }else{
        header("Location: eventos.php");
    }
}

?>