<?php
    session_start();

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once '..\\PHP\\dbh.php';
        require_once '..\\PHP\\functions.php';

        if(emptyInputLogin($username, $password) !== false){
            header('Location: ..\\HTML\\loginPage.php?error=emptyinput');
            exit();
        }
        
        if($_SESSION['login_attempts'] == 3){
            $myfile = fopen("..\\log.txt", "a") or die("Unable to open file!");
            $txt = date("d.m.Y h:i:sa") . ': Someone is trying to login into system.';
            fwrite($myfile, $txt);
            fclose($myfile);
            $_SESSION['login_attempts'] = 0;
            header("location: ..\\HTML\\index.php");

        }else{
            loginUser($conn, $username, $password);
        }
    }
        else{
            header("location: ..\\HTML\\loginPage.php");
        }
    
?>