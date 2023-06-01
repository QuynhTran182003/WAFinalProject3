<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once '..\\PHP\\dbh.php';
        require_once '..\\PHP\\functions.php';

        if(emptyInputLogin($username, $password) !== false){
            header('Location: ..\\HTML\\loginPage.php?error=emptyinput');
            exit();
        }
        loginUser($conn, $username, $password);
    }
    else{
        header("location: ..\\HTML\\loginPage.php");
    }
?>