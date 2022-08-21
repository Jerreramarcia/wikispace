<?php
session_start();
require_once("database.php");
$db = new database();
$db = $db->connect();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}



?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
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
					<li class="selected">
						<a href="home.php">Home</a>
					</li>
					<li class="menu">
						<a href="cuerposcelestes.php">Cuerpos Celestes</a>
					</li>
                    <li class="menu">
                        <a href="eventos.php">Eventos</a>
                    </li>
                    <li class="menu">
                        <a href="noticias.php">Noticias</a>
                    </li>
                    <li>
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
                    <?php
                    include('dom/simple_html_dom.php');
                    $html = file_get_html('https://apod.nasa.gov/apod/astropix.html');

                    $imagenes = $html->find('img');
                    $ruta = 'https://apod.nasa.gov/'.$imagenes[0]->src;
                    ?>
                    <h2>Foto del Día de la NASA:</h2>
                    <img src="<?php echo $ruta ?>" width=40% height=40%></br>

					<?php
                    $result1 = mysqli_query($db,"SELECT * FROM event ORDER BY publishmentdate DESC");
                    $var1 = mysqli_fetch_assoc($result1);
                    ?>

                            <div class="article">
                                <h1>Evento Más Reciente</h1>
                                <h1><?php echo $var1['title'] ?></h1>
                                <p><?php echo $var1['content'] ?></p>
                                <a href="evento.php?idevent=<?php echo $var1['idevent'] ?>" class="more" ><h1>-> Leer <-</h1></a><br><br>
                            </div>

                    <?php
                        $result = mysqli_query($db,"SELECT * FROM new ORDER BY publishmentdate DESC");
                        $var = mysqli_fetch_array($result);
                    ?>

                            <div class="article">
                                <h1>Noticia Más Reciente</h1>
                                <h1><?php echo $var['title'] ?></h1>
                                <p><?php echo $var['content'] ?></p>
                                <a href="noticia.php?idnew=<?php echo $var['idnew'] ?>" class="more" ><h1>-> Leer <-</h1></a>
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