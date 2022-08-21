<?php
session_start();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cuerpos Celestes</title>
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
					<h1>Cuerpos Celestes</h1>
					<ul>
						<li>
							<a href="cuerpoceleste.php?cuerpo=planeta"><img src="images/planeta.jpg" style="max-width: 240px"></a>
							<div>
								<h1>Planetas</h1>
								<p>Un planeta es un objeto astronómico que orbita una estrella y que es lo suficientemente masivo como para ser redondeado por su propia gravedad, pero no lo suficientemente masivo como para causar fusión termonuclear, y que ha despejado su región vecina de planetesimales.</p>
								<a href="cuerpoceleste.php?cuerpo=planeta" class="more" >Planetas</a>
							</div>
						</li>
						<li>
							<a href="cuerpoceleste.php?cuerpo=estrella"><img src="images/estrella.jpg" style="max-width: 240px"></a>
							<div>
								<h1>Estrellas</h1>
								<p>Una estrella es un esferoide luminoso formado mayoritariamente por plasma, que mantiene su forma debido a su propia gravedad y que brillan con luz propia. La palabra proviene del latín stella.</p>
								<a href="cuerpoceleste.php?cuerpo=estrella" class="more" style="max-width: 200px">Estrellas</a>
							</div>
						</li>
                        <li>
                            <a href="cuerpoceleste.php?cuerpo=satelite"><img src="images/satelite.jpg" style="max-width: 240px"></a>
                            <div>
                                <h1>Satélites</h1>
                                <p>Un satélite es un objeto que orbita (da vueltas) alrededor de un planeta. Hay centenares de satélites naturales, o lunas, en nuestro sistema solar, pero, desde 1957, también se han lanzado al espacio miles de satélites artificiales (fabricados por el hombre).</p>
                                <a href="cuerpoceleste.php?cuerpo=satelite" class="more" style="max-width: 200px">Satélites</a>
                            </div>
                        </li>
                        <li>
                            <a href="cuerpoceleste.php?cuerpo=cometa"><img src="images/cometa.jpg" style="max-width: 240px"></a>
                            <div>
                                <h1>Cometas</h1>
                                <p>Los cometas son los cuerpos celestes constituidos por hielo, polvo y rocas que están en el espacio exterior y que orbitan alrededor del Sol siguiendo diferentes trayectorias elípticas. Los cometas, junto con los asteroides, planetas y satélites, forman parte del Sistema solar.</p>
                                <a href="cuerpoceleste.php?cuerpo=cometa" class="more">Cometas</a>
                            </div>
                        </li>
                        <li>
                            <a href="cuerpoceleste.php?cuerpo=constelacion"><img src="images/constelacion.jpg" style="max-width: 240px"></a>
                            <div>
                                <h1>Constelaciones</h1>
                                <p>Una constelación, en astronomía, es el límite en que está dividida la bóveda celeste, cada una está conformada por una agrupación convencional de estrellas, cuya posición en el cielo nocturno es aparentemente invariable. Los pueblos, generalmente de civilizaciones antiguas, decidieron vincularlas mediante trazos imaginarios, creando así siluetas virtuales sobre la esfera celeste.</p>
                                <a href="cuerpoceleste.php?cuerpo=constelacion" class="more">Constelaciones</a>
                            </div>
                        </li>
                        <li>
                            <a href="cuerpoceleste.php?cuerpo=galaxia"><img src="images/galaxia.jpg" style="max-width: 240px"></a>
                            <div>
                                <h1>Galaxias</h1>
                                <p>Una galaxia es un conjunto de estrellas, nubes de gas, planetas, polvo cósmico, materia oscura y energía unidas gravitatoriamente en una estructura más o menos definida. La palabra «galaxia» procede de los griegos, los cuales atribuían el origen de la Vía Láctea a las gotas de leche derramadas en el universo por la diosa Hera mientras alimentaba al infante Hércules.</p>
                                <a href="cuerpoceleste.php?cuerpo=galaxia" class="more">Galaxias</a>
                            </div>
                        </li>
                        <li>
                            <a href="cuerpoceleste.php?cuerpo=nebulosa"><img src="images/nebulosa.jpg" style="max-width: 240px"></a>
                            <div>
                                <h1>Nebulosas</h1>
                                <p>Las nebulosas son regiones del medio interestelar constituidas por gases (principalmente hidrógeno y helio) además de elementos químicos en forma de polvo cósmico. Tienen una importancia cosmológica notable porque muchas de ellas son los lugares donde nacen las estrellas por fenómenos de condensación y agregación de la materia, en otras ocasiones se trata de los restos de estrellas ya extintas o en extinción.</p>
                                <a href="cuerpoceleste.php?cuerpo=nebulosa" class="more">Nebulosas</a>
                            </div>
                        </li>
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