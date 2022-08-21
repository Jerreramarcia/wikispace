<?php
session_start();
if(is_null($_SESSION['id'])) {
    header("Location:login.php");
}

include('dom/simple_html_dom.php');
require_once("objetoastronomico.php");
$planeta = str_replace(" ", "+", $_POST['cuerpo']);
$cuerpo = $_POST['tipo'];
$conjunto = $planeta."+".$cuerpo;
$html_2=file_get_html("https://es.wikipedia.org/w/index.php?search=".$conjunto."&title=Especial%3ABuscar&go=Ir&ns0=1&ns100=1&ns104=1");
$direccion = "https://es.wikipedia.org";
foreach ($html_2->find(".mw-search-result-heading>a") as $kwt){
    $direccion = $direccion.$kwt->href;
    break;
}


$html = file_get_html($direccion);
$salida = $html->find(".mw-parser-output>p");
foreach($html->find('sup') as $item) {
    $item->outertext = '';
}
#$html->save();
$body = str_replace("/wiki/", "https://es.wikipedia.org/wiki/", $salida[0]);

foreach ($html->find(".infobox") as $data){
    foreach ($data->find("img") as $img){
        $imagen = $img->src;
    }
    break;
}
$cuerpo = new ObjetoAstronomico($body,$cuerpo,$planeta);
?>


<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Busqueda</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script src="js/mobile.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
</head>
<body>
<div class="loader"></div>
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
					<h1><?php echo $_POST["cuerpo"]?></h1>
                    <?php if($imagen){?>
					<img src=<?php echo $imagen ?>>
                    <?php }  ?>
					<h2>Descripción</h2>
				<?php

                echo $cuerpo->getDescription();

                require_once("database.php");
                $db = new database();
                $db = $db->connect();
                $query = "SELECT nombreFrances FROM objetosastronomicos WHERE nombre='".$_POST["cuerpo"]."'";
                $result = $db->query($query);
                if($nombre = mysqli_fetch_array($result)){

                    #CURL - Consulta de API
                    $curl_handle = curl_init();
                    curl_setopt($curl_handle, CURLOPT_URL, 'https://api.le-systeme-solaire.net/rest/bodies/'.$nombre[0]);
                    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
                    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

                    echo 'https://api.le-systeme-solaire.net/rest/bodies/'.$nombre[0];
                    $buffer = curl_exec($curl_handle);
                    curl_close($curl_handle);
                    if (empty($buffer)) {
                        print "Nothing returned from url.<p>";

                    } else {
                        $json = json_decode($buffer, true);

                        #print_r($json['bodies']['id del body']['parametro']);
                        #foreach ($json['bodies'] as $key) {

                            foreach ($json as $key =>$val){
                                if($val){
                                    if(!is_array($val)){
                                        echo "<p style='color: white'>".$key.": ".$val."</p>";
                                    }
                                    if(is_array($val)){
                                        foreach ($val as $subVal =>$dat){
                                            if(!is_array($dat)){
                                                echo "<p>".$subVal.":".$dat."</p>";
                                            }
                                            if(is_array($dat)){
                                                $i = 0;
                                                foreach ($dat as $subVal2=>$dat2){
                                                        echo "<p>".$subVal2." : ".$dat2."</p>";
                                                }
                                            }

                                        }
                                    }
                                }

                            }

                        #}
                    }


                }else{

                    foreach($html->find('.noprint') as $item) {
                        $item->outertext = '';
                    }
                    $html->save();
                    foreach($html->find("tr") as $result) {
                        foreach($result->find("th") as $salida){
                            echo "<p>".$salida->plaintext."";
                        }
                        foreach($result->find("td") as $salida_2){
                            if(!strpos($salida_2->plaintext,"Wiki")) {
                                echo ": " . $salida_2->plaintext . "<p/>";
                            }else{break;}

                        }

                    }
                }



                ?>
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