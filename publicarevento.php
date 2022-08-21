<?php

if(isset($_POST["publicar"])){
    if(!isset($_SESSION["username"])) {
        session_start();
    }
    $me = $_SESSION["username"];
    $comentario = $_POST["comentario"];
    $titulo = $_POST["titulo"];
    require_once("database.php");
    $db = new database();
    $db = $db->connect();

    $query = "SELECT iduser FROM user WHERE username='".$me."'";
    $exit = $db->query($query);
    $fh = mysqli_fetch_array($exit);
    if($fh[0]){
        $date = getdate();
        $fecha = "" . $date['year'] . "-" . $date['mon'] . "-" . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'] . "";
        $queryComenta = "INSERT INTO event (idpublisher,title,content,publishmentdate) VALUES ('$fh[0]','$titulo','$comentario','$fecha')";
        $db->query($queryComenta);
        if($db->connect_error)
        {
            die("Conexión a la base de datos fallida");
        }
        header("Location: eventos.php");
    }
}

?>