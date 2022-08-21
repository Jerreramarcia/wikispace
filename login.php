<?php
require_once("usuario.php");
require_once("database.php");

$error = "";
if(isset($_POST["Login"]))
{
    $db = new Database();
    $db = $db->connect();

    if($db->connect_error){
        die("connection failed");
    }

    $user = $_POST["username"];
    $password = $_POST["password"];
    $salt = "estanoestucontrasenia";

    $password_decrypted = sha1($password.$salt);

    $sql = mysqli_query($db, "SELECT password from user WHERE username = '".$user."'");

    $row = mysqli_fetch_array($sql);

    if($row){
        if($row[0] == $password_decrypted){
            $usuario = new usuario();
            session_start();
            $_SESSION['username'] = $usuario->getUsername($user);
            $_SESSION['name'] = $usuario->getName($user);
            $_SESSION['lastname'] = $usuario->getLastName($user);
            $_SESSION['birthdate'] = $usuario->getBirthdate($user);
            $_SESSION['email'] = $usuario->getEmail($user);
            $_SESSION['id'] = $usuario->getID($user);
            $_SESSION['admin'] = $usuario->getAdmin($user);
            header("Location: home.php");
        }
        else{
            $error = 'Nombre de Usuario y/o contraseña invalida';
        }
    }
    else{
        $error = 'Nombre de Usuario y/o contraseña invalida';
    }

}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <h1>Login</h1>
                    <?php
                    if(isset($_GET["var"])){
                        if($_GET["var"] == 1){
                            ?>
                            <h2>¡Usuario registrado correctamente!</h2>
                            <?php
                        }
                    }
                    ?>
                    <h2><?php echo $error; ?></h2>
                    <form class="buscador" action="login.php" method="post">
                        <input type="text" name="username" id="username" placeholder="Nombre de Usuario" required>
                        <input type="password" name="password" id="password" placeholder="Contraseña" required>
                        <input type="submit" name="Login" style="width: 100%; background-color: #630031" value="Iniciar Sesión">
                    </form>
                </div>
                <div class="buscador">
                    <h2>¿Quieres registrarte? ¡Haz click aquí!</h2>
                    <a href="register.php"><h2>-> Regístrate <-</h2></a>
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
                <p>&copy; 2023 BY VICTOR MACHADO & JUAN MANUEL HERRERA | ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>