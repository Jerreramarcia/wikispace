<?php
session_start();
$cuerpo = $_GET['cuerpo'];
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

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
                <li class="selected">
                    <a href="cuerposcelestes.php">Cuerpos Celestes</a>
                </li>
                <li class="menu">
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
        <div class="header">
            <div>
                <h1>Buscar <?php echo $_GET["cuerpo"]?></h1>
                <div class="search">
                    <form class="buscador" action="busqueda.php" method="post">
                        <input type="text" name="cuerpo" id="cuerpo" placeholder=<?php echo $_GET["cuerpo"]?>>
                        <input type="hidden" name="tipo" value=<?php echo $_GET["cuerpo"];?>>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="connect">
            <div>
                <h1>SOCIAL NETWORKS</h1>
                <div>
                    <a href="https://es-es.facebook.com/" class="facebook">facebook</a>
                    <a href="https://twitter.com/" class="twitter">twitter</a>
                    <a href="https://plus.google.com/" class="googleplus">googleplus</a>
                    <a href="https://www.pinterest.es/" class="pinterest">pinterest</a>
                </div>
            </div>
        </div>
        <div class="footnote">
            <div>
                <p>&copy; 2023 BY VICTOR&JUANMA | ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>