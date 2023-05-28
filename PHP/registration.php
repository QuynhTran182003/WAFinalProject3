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

    // class RegisterUser{
    //     private $username;
    //     private $raw_password;
    //     private $encrypted_password;
    //     private $email;
    //     public $error;
    //     public $success;
    //     private $storage = "..\\users.json";
    //     private $stored_users;
    //     private $new_user; 


    //     public function __construct($username, $password, $email){
    //         $this->username = trim($username);
    //         $this->raw_password = trim($password);
    //         $this->email = trim($email);

    //         $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

    //         $this->stored_users = json_decode(file_get_contents($this->storage), true);

    //         $this->new_user = [
    //             "username" => $this->username,
    //             "password" => $this->encrypted_password,
    //             "email" => $this->email
    //         ];

    //         $this->insertUser();
    //     }

    //     private function usernameExists(){
    //         foreach($this->stored_users as $user){
    //             if($this->username == $user['username']){
    //                 $this->error = "Username has been taken, please use a different one";
    //                 return true;
    //             }
    //         }
    //         return false;
    //     }

    //     private function insertUser(){
    //         if($this->usernameExists() == FALSE){
    //             array_push($this->stored_users, $this->new_user);
    //             if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
    //                 return header('Location: ..\\HTML\\loginPage.php');
    //             } else{
    //                 return header('Location: ..\\HTML\\registerPage.php');
    //             }
    //         }
    //     }
    // }
    
?>