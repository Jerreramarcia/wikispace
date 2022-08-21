<?php
require_once("database.php");

if(isset($_POST["Register"]))
{
    $db = new database();
    $db = $db->connect();

    if($db->connect_error)
    {
        die("Conexión a la base de datos fallida");
    }
    else
    {
        $username = $_POST["username"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        $dat = getdate();
        $fecha = "" . $dat['year'] . "-" . $dat['mon'] . "-" . $dat['mday'] . " " . $dat['hours'] . ":" . $dat['minutes'] . ":" . $dat['seconds'] . "";

        $date = date('Y-m-d', strtotime($_POST['birthdate']));

        //Compruebo que el correo no existe en la base de datos
        $exist_username = mysqli_query($db, "SELECT count(*) as total from user WHERE username = '".$username."'");
        $row = mysqli_fetch_array($exist_username);

        if($row["total"] == 0 && $pass1 == $pass2)
        {
            $salt = "estanoestucontrasenia";
            $password_encrypted = sha1($pass1.$salt);

            $sql_usr = "INSERT INTO user (username, admin, password, name, lastname, email, birthdate, registerdate) VALUES ('$username', 0,'$password_encrypted', '$name', '$lastname', '$email', '$date', '$fecha')";

            if (!$db -> query($sql_usr)) {
                echo("Error description: " . $db -> error);
            }

            header('Location: login.php?var=1');
        }
        else if($row["total"] == 0 && $pass1 != $pass2)
        {
            #Var = 1 significa que no ha repetido la contraseña correctamente
            header('Location: register.php?var=1');
        }
        else
        {
            #Var = 2 significa que el usuario o el email ya existen
            header('Location: register.php?var=2');
        }
    }
}
?>