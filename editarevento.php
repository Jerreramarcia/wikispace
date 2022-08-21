<?php
session_start();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

if (isset($_POST["editar"])){
    $text=$_POST["newText"];
    $titulo=$_POST["newTitle"];
    $idevento=$_POST["id"];
    $idme = $_SESSION["id"];
    require_once("database.php");
    $db = new database();
    $db = $db->connect();
    $today= gmdate('Y-m-d h:i:s \G\M\T');
    $query = "INSERT INTO editevent (idevent, iduser, editdate) VALUES ($idevento,$idme,'$today')";
    echo $query;
    $db->query($query);
    $query2 = "UPDATE event SET title='".$titulo."',content='".$text."'WHERE idevent=".$idevento;
    $db->query($query2);
    header("Location:evento.php?idevent="."".$idevento."");

}else{

    ?>

    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuerpo Celeste</title>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">
        <script src="js/mobile.js" type="text/javascript"></script>
        <style>
            div#body{
                background-image: url("https://fondosmil.com/fondo/34273.jpg");
            }
        </style>
    </head>
    <body>
    <div id="page">
        <div id="header">
            <div>
                <ul id="navigation">
                    <li class="menu">
                        <a href="home.php" class="logo2"><img src="images/logo.png" style="max-width: 60px;"></a>
                    </li>
                    <li class="menu">
                        <a href="home.php">Home</a>
                    </li>
                    <li class="menu">
                        <a href="cuerposcelestes.php">Cuerpos Celestes</a>
                    </li>
                    <li class="selected">
                        <a href="eventos.php">Eventos</a>
                    </li>
                    <li class="menu">
                        <a href="noticias.php">Noticias</a>
                    </li>
                    <li class="menu">
                        <a href="perfil.php">Perfil</a>
                    </li>
                </ul>
                <ul>
                    <li class="menu"><a href="logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
        <div id="body">
            <?php
            $texto = $_POST["texto"];
            $titulo = $_POST["titulo"];
            $idevento = $_POST["idnoticia"];


            ?>
            <form action="" method="post" style="position: relative;top: 10em;">
                <input id="newTitle" name="newTitle" type="textable" maxlength="255" style="width: -moz-available;" value=<?php echo "'".$titulo."'";?>>
                <textarea id="newText" rows="20" name="newText" maxlength="255" style="width: -moz-available;" ><?php echo $texto;?></textarea>
                <input type="hidden" name="id" id="id" value=<?php echo $idevento?>>
                <input type="submit" name="editar" id="editar" value="Editar">
            </form>
            <?php

            ?>
        </div>


    </body>
    </html>
<?php }?>