<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        
        $password = $_POST["password"];
        $rptPass = $_POST["repeatPassword"];

        require_once '..\\PHP\\dbh.php';
        require_once '..\\PHP\\functions.php';

        if(emptyInputSignUp($username, $email, $password, $rptPass) !== false){
            header('Location: ..\\HTML\\registerPage.php?error=emptyinput');
            exit();
        }
        if(invalidUid($username) !== false){
            header('Location: ..\\HTML\\registerPage.php?error=invaliduid');
            exit();
        }
        if(invalidEmail($email) !== false){
            header('Location: ..\\HTML\\registerPage.php?error=invalidemail');
            exit();
        }
        if(pwdMatch($password, $rptPass) !== false){
            header('Location: ..\\HTML\\registerPage.php?error=unmatchpassword');
            exit();
        }
        if(uidExisted($conn, $username, $email) !== false){
            header('Location: ..\\HTML\\registerPage.php?error=usernametaken');
            exit();
        }

        createUser($conn, $username, $email, $password);
    } else{
        header('Location: ..\\HTML\\registerPage.php');
        exit();
    }

?>