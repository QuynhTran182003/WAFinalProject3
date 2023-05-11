<?php
    class RegisterUser{
        private $username;
        private $raw_password;
        private $encrypted_password;
        private $email;
        public $error;
        public $success;
        private $storage = "..\\users.json";
        private $stored_users;
        private $new_user; 


        public function __construct($username, $password, $email){
            $this->username = trim($username);
            $this->raw_password = trim($password);
            $this->email = trim($email);

            $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

            $this->stored_users = json_decode(file_get_contents($this->storage), true);

            $this->new_user = [
                "username" => $this->username,
                "password" => $this->encrypted_password,
                "email" => $this->email
            ];

            $this->insertUser();
        }

        private function usernameExists(){
            foreach($this->stored_users as $user){
                if($this->username == $user['username']){
                    $this->error = "Username has been taken, please use a different one";
                    return true;
                }
            }
            return false;
        }

        private function insertUser(){
            if($this->usernameExists() == FALSE){
                array_push($this->stored_users, $this->new_user);
                if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                    return header('Location: ..\\HTML\\loginPage.php');
                } else{
                    return header('Location: ..\\HTML\\registerPage.php');
                }
            }
        }
    }
    // session_start();
    // $username = $_POST['username'];
    // $mail  = $_POST['email'];
    // $password  = $_POST['password'];
    // $repeatPassword  = $_POST['repeatPassword'];

    // if($password !== $repeatPassword){
    //     echo '<p>repeated wrong</p> ';
    // } else{

    //     echo $username, '<br>';
    //     echo $password;
    //     echo $mail;
    // }

    // // Read the JSON file 
    // $json = file_get_contents('users.json');
    // // Decode the JSON file
    // $json_data = json_decode($json, true);
    
    // foreach ($json_data['users'] as $k){
    //     if($k['username'] == $username && $k['password'] == $password){
    //         $_SESSION['username'] = $username;
    //         header('Location: index.php');
    //         return;
    //     } else{
    //         header('Location: loginPage.php');
    //         echo '<p>Username or password might be wrong! Please try again.</p>';
    //     }
    // }
?>