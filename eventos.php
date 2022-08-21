<?php
session_start();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

require_once("database.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <script src="js/mobile.js" type="text/javascript"></script>
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
        <div class="header">
            <div>
                <h1>Eventos</h1>
                <ul>
                    <?php
                    $admin = $_SESSION['admin'];
                    if($admin == 1){
                    ?>
                    <li>
                        <div id="commentario">
                            <h1>Crear Evento</h1>
                            <div id="texto">
                                <form method="post" action="publicarevento.php">
                                    <input type="textarea" maxlength="255" name="titulo" id="titulo" placeholder="Título" style="resize: none" required/>
                                    <input type="textarea" maxlength="255" name="comentario" id="comentario" placeholder="Contenido" style="resize: none" required/>
                                    <button type="submmit" name="publicar">publicar</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <?php
                    }
                    $db = new database();
                    $db = $db->connect();
                    $result = mysqli_query($db,"SELECT * FROM event ORDER BY idevent DESC");
                    while($var = mysqli_fetch_array($result)){
                        ?>
                        <li>
                            <div>
                                <h1><?php echo $var[2] ?></h1>
                                <p><?php echo $var[3] ?></p>
                                <a href="evento.php?idevent=<?php echo $var[0] ?>" class="more" >Leer</a>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

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