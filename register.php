<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <script src="js/mobile.js" type="text/javascript"></script>
</head>
<body>
<div id="page">
    <div id="body">
        <div class="header">
            <div>
                <div class="search">
                    <h1>Register</h1>
                    <?php
                    if(isset($_GET["var"])){
                        if($_GET["var"] == 1){
                            ?>
                            <h2>¡No ha introducido las contraseñas correctamente!</h2>
                            <?php
                        }else if($_GET["var"] == 2){
                            ?>
                            <h2>¡Email o Username en uso!</h2>
                            <?php
                        }
                    }
                    ?>
                    <form class="buscador" name="register" action="signup.php" method="post">
                        <input type="text" name="username" id="username" placeholder="Nombre de Usuario" required>
                        <input type="text" name="name" id="name" placeholder="Nombre" required>
                        <input type="text" name="lastname" id="lastname" placeholder="Apellidos" required>
                        <input type="text" name="email" id="email" placeholder="Correo Electrónico" required>
                        <input type="date" name="birthdate" id="birthdate" placeholder="Fecha de Nacimiento" required>
                        <input type="password" name="pass1" id="pass1" placeholder="Contraseña" required>
                        <input type="password" name="pass2" id="pass2" placeholder="Repetir Contraseña" required>
                        <input type="submit" name="Register" style="width: 100%; background-color: #630031" value="Registrarse">
                    </form>
                </div>
                <div class="search">
                    <h2>¿Ya tienes una cuenta? ¡Inicia sesión!</h2>
                    <a href="login.php"><h2>-> Inicia Sesion <-</h2></a>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="connect">
            <div>
                <h1>SOCIAL NETWORKS</h1>
                <div>
                    <a href="https://twitter.com/_victor1808" class="twitter">twitter</a>
                    <a href="https://twitter.com/jerreramarcia" class="twitter">twitter</a>
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