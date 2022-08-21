<?php

if(isset($_POST["comentar"]) and isset($_POST["noticia"])){
    if(!isset($_SESSION["username"])) {
        session_start();
    }
        $me = $_SESSION["username"];
        $comentario = $_POST["comentario"];
        $titulo = $_POST["titulo"];
        $idNoticia = $_POST["noticia"];
        require_once("database.php");
        $db = new database();
        $db = $db->connect();

        $query = "SELECT iduser FROM user WHERE username='".$me."'";
        $exit = $db->query($query);
        $fh = mysqli_fetch_array($exit);
        if($fh[0]){
            $date = getdate();
            $today = "" . $date['year'] . "-" . $date['mon'] . "-" . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'] . "";
            $queryComenta = "INSERT INTO comment (title,text,commentdate,creatoruser,idnew) VALUES ('$titulo','$comentario','$today',$fh[0],$idNoticia)";
            $db->query($queryComenta);
            if($db->connect_error)
            {
                die("Conexión a la base de datos fallida");
            }
        header("Location:noticia.php?idnew=".$idNoticia);
        }

}else{
    if (isset($_POST["comentar"]) and isset($_POST["evento"])){
        if(!isset($_SESSION["username"])) {
            session_start();
        }
        $me = $_SESSION["username"];
        $comentario = $_POST["comentario"];
        $titulo = $_POST["titulo"];
        $idEvento = $_POST["evento"];
        require_once("database.php");
        $db = new database();
        $db = $db->connect();

        $query = "SELECT iduser FROM user WHERE username='".$me."'";
        $exit = $db->query($query);
        $fh = mysqli_fetch_array($exit);
        if($fh[0]){
            $today= gmdate('Y-m-d h:i:s \G\M\T');
            $queryComenta = "INSERT INTO comment (title,text,commentdate,creatoruser,idevent) VALUES ('$titulo','$comentario','$today',$fh[0],$idEvento)";
            $db->query($queryComenta);
            if($db->connect_error)
            {
                die("Conexión a la base de datos fallida");
            }
            header("Location:evento.php?idevent=".$idEvento);
        }


    }
}

?>
