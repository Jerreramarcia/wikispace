<?php

if (isset($_POST["borrarevento"])) {
    if (!isset($_SESSION["username"])) {
        session_start();
    }

    $idcomentario = $_POST["idcomentario"];
    $idevento = $_POST["idevento"];

    require_once("database.php");
    $db = new database();
    $db = $db->connect();

    $query = "DELETE FROM comment WHERE id='$idcomentario'";
    $db->query($query);

    if ($db->connect_error) {
        die("Conexión a la base de datos fallida");
    }else{
        header("Location: evento.php?idevent=".$idevento);
    }
}

if (isset($_POST["borrarnoticia"])) {
    if (!isset($_SESSION["username"])) {
        session_start();
    }

    $idcomentario = $_POST["idcomentario"];
    $idnot = $_POST["idnot"];

    require_once("database.php");
    $db = new database();
    $db = $db->connect();

    $query = "DELETE FROM comment WHERE id='$idcomentario'";
    $db->query($query);

    if ($db->connect_error) {
        die("Conexión a la base de datos fallida");
    }else{
        header("Location: noticia.php?idnew=".$idnot);
    }
}

?>