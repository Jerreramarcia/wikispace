<?php

require_once("database.php");

class usuario{

    public function getID($email){
        $db = new Database();
        $db = $db->connect();

        $id = mysqli_query($db, "SELECT iduser from user WHERE username = '".$email."'");
        if (!$id) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($id);
        return $resultado[0];
    }

    public function getUsername($email){
        $db = new Database();
        $db = $db->connect();

        $usern = mysqli_query($db, "SELECT username from user WHERE username = '".$email."'");

        if (!$usern) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($usern);
        return $resultado[0];
    }

    public function getName($email){
        $db = new Database();
        $db = $db->connect();

        $user = mysqli_query($db, "SELECT name from user WHERE username = '".$email."'");
        if (!$user) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($user);
        return $resultado[0];
    }

    public function getLastName($email){
        $db = new Database();
        $db = $db->connect();

        $lastname = mysqli_query($db, "SELECT lastname from user WHERE username = '".$email."'");
        if (!$lastname) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($lastname);
        return $resultado[0];
    }

    public function getBirthdate($email){
        $db = new Database();
        $db = $db->connect();

        $date = mysqli_query($db, "SELECT birthdate from user WHERE username = '".$email."'");
        if (!$date) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($date);
        return $resultado[0];
    }

    public function getEmail($email){
        $db = new Database();
        $db = $db->connect();

        $em = mysqli_query($db, "SELECT email from user WHERE username = '".$email."'");
        if (!$em) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($em);
        return $resultado[0];
    }

    public function getAdmin($email)
    {
        $db = new Database();
        $db = $db->connect();

        $admin = mysqli_query($db, "SELECT admin from user WHERE username = '" . $email . "'");
        if (!$admin) {
            printf("Error: %s\n", mysqli_error($db));
            exit();
        }
        $resultado = mysqli_fetch_array($admin);
        return $resultado[0];
    }

}
?>