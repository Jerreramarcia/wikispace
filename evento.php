<?php
session_start();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

require_once("database.php");
$db = new database();
$db = $db->connect();

$admin = $_SESSION['admin'];

$idevent = $_GET['idevent'];

$result = mysqli_query($db,"SELECT * FROM event WHERE idevent = '$idevent'");
$var = mysqli_fetch_array($result);
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $var[2] ?></title>
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
                <h1><?php echo $var[2]; ?></h1>
                <ul>
                    <li>
                        <div>
                            <h1><?php echo $var[2]; ?></h1>
                            <p><?php echo $var[3]; ?></p>
                            <p>
                                <?php
                                $resultado = mysqli_query($db,"SELECT * FROM user WHERE iduser = '$var[1]'");
                                $var1 = mysqli_fetch_array($resultado);
                                echo "Autor: ".$var1[1]." (".$var1[2]." ".$var1[3].")<br/>";
                                echo "Fecha de Publicación: ".$var[4];
                                if ($admin == 1){
                                ?>
                                <form method="post" action="borrarevento.php">
                                    <input type="hidden" name="idevento" id="idevento" value="<?php echo $idevent ?>">
                                    <input type="submit" name="borrar" value="Borrar">
                                </form>
                                <form method="post" action="editarevento.php">
                                    <input type="hidden" name="idnoticia" id="idnoticia" value=<?php echo $idevent;?>>
                                    <input type="hidden" name="titulo" id="titulo" value=<?php echo "'".$var[2]."'";?>>
                                    <input type="hidden" name="texto" id="text" value=<?php echo "'".$var[3]."'";?>>
                                    <input type="submit" value="Editar">
                                </form>
                            <?php
                                }
                                ?>
                            </p>
                        </div>
                    </li>
                </ul>
                <ul>
                    <li>
                        <h2 style="position: inherit;width: 100%;right: auto;">Comentar</h2>
                        <div id="commentario">
                            <div id="texto">

                                <form method="post" action="comentar.php">
                                    <input type="hidden" name="evento" id="evento" value=<?php echo $idevent?>>
                                    <input type="textarea" id="titulo" name="titulo" maxlength="255" required placeholder="Titulo" style="resize: none"/>>
                                    <input type="textarea" id="comentario" name="comentario" placeholder="Comentario" maxlength="255" required style="resize: none"/>
                                    <button type="submmit" name="comentar">Comentar</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul>
                    <div id="mostrarComentarios">
                        <h1>Comentarios</h1>
                        <?php
                        $query = "SELECT * FROM comment WHERE idevent = ".$idevent." ORDER BY id DESC";
                        $salida = $db->query($query);
                        while($arr = mysqli_fetch_array($salida)){

                            $creador = $arr["creatoruser"];
                            $query_2 = "SELECT username FROM user WHERE iduser = ".$creador;
                            $salida_2 = $db->query($query_2);
                            $nombre = mysqli_fetch_array($salida_2);

                            echo "<div >";
                            echo "<h2>".$nombre["username"]." ".$arr["commentdate"]."</h2>";
                            echo "<p style='background-color: darkmagenta;position: absolute;text-align: inherit;'>";
                            echo "<span style='position: relative;align-content: center;left: 10px;left: center;font-weight: bold;'>".$arr["title"]."</span><br>".$arr["text"]."</p>";
                            echo "</div>";
                            if ($admin == 1){
                                ?>
                                <form method="post" action="borrarcomentario.php">
                                    <input type="hidden" name="idcomentario" id="idcomentario" value="<?php echo $arr['id'] ?>">
                                    <input type="hidden" name="idevento" id="idevento" value="<?php echo $idevent ?>">
                                    <input type="submit" name="borrarevento" value="Borrar">
                                </form>
                                <?php

                            }
                        }
                        ?>
                    </div>
            </div>
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