<?php
class LoginUser{
    private $username;
    private $password;
    public $error;
    private $storage = "..\\users.json";
    private $stored_users;

    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login();
    
    }
    
    public function login(){
        foreach ($this->stored_users as $user){
            // if($_strike == 0){
            //     $myfile = fopen("..\\log.txt", "w");
            //     $txt = `Some one tried to access to $username`;
            //     fwrite($myfile, $txt);
            // } else {
            if($user['username'] == $this->username){
                if(password_verify($this->password, $user['password'])){
                    session_start();
                    $_SESSION['username'] = $this->username;
                    header('Location: ..\\HTML\\index.php');
                    exit();
                }
            } 
            // }else
        }
        return $this->error = "Username or password might be wrong! Please try again.";
    }
}
    // $username = $_POST['username'];
    // $password  = $_POST['password'];
    // // Read the JSON file 
    // $json = file_get_contents('..\\users.json');
    // // Decode the JSON file
    // $json_data = json_decode($json, true);
    
    // foreach ($json_data as $k){
    //     if($_strike == 0){
    //         $myfile = fopen("..\\log.txt", "w");
    //         $txt = `Some one tried to access to $username`;
    //         fwrite($myfile, $txt);
    //     } else {
    //         if($k['username'] == $username && $k['password'] == $password){
    //             $_SESSION['username'] = $username;
    //             header('Location: ..\HTML\index.php');
    //             return;
    //         } else{
    //             $_strike--;
    //             // echo '<p>Username or password might be wrong! Please try again.</p>';
    //             header('Location: ..\HTML\loginPage.php');

    //         }
    //     }
        
    // }
?>