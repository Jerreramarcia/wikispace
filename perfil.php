<?php
session_start();
require_once("database.php");
$db = new database();
$db = $db->connect();
if(!is_null($_SESSION['id'])) {
    $id = $_SESSION['id'];
}else{
    header("Location:login.php");
}

$resultado = mysqli_query($db, "SELECT * FROM user WHERE iduser = '$id'");
$var1 = mysqli_fetch_array($resultado);

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perfil</title>
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
					<li>
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
					<li class="selected">
						<a href="perfil.php">Perfil</a>
					</li>
				</ul>
                <ul>
                    <li class="menu"><a href="logout.php">Salir</a></li>
                </ul>
			</div>
		</div>
		<div id="body" class="about">
			<div class="header">
				<div>
					<h1>Mi Perfil</h1>
					<h2>Nombre de Usuario: <?php echo $var1[1] ?></h2>
				</div>
			</div>
			<div class="body">
				<div>
					<img src="images/earth-satellite.jpg" alt="">
                    <h2>Nombre: <?php echo $var1[2] ?></h2>
                    <h2>Apellidos: <?php echo $var1[3] ?></h2>
				</div>
			</div>
			<div class="footer">
				<div>
					<img src="images/space-shuttle.png" alt="">
					<h2>Fecha de Nacimiento: <?php echo $var1[4] ?></h2>
                    <h2>Correo Electrónico: <?php echo $var1[5] ?></h2>
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