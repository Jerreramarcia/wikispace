<?php

if (isset($_POST["borrar"])) {
    if (!isset($_SESSION["username"])) {
        session_start();
    }

    $idnoticia = $_POST["idnoticia"];
    require_once("database.php");
    $db = new database();
    $db = $db->connect();

    $query = "DELETE FROM new WHERE idnew='$idnoticia'";
    $db->query($query);

    if ($db->connect_error) {
        die("Conexión a la base de datos fallida");
    }else{
        header("Location: noticias.php");
    }
}

?>