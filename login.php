<?php
$_strike = 3;
    
    session_start();

    $username = $_POST['username'];
    $password  = $_POST['password'];
    // Read the JSON file 
    $json = file_get_contents('users.json');
    // Decode the JSON file
    $json_data = json_decode($json, true);
    
    foreach ($json_data['users'] as $k){
        if($_strike <= 0){
            $myfile = fopen("log.txt", "w");
            $txt = `Some one tried to access to $username`;
            fwrite($myfile, $txt);
        } else {
            if($k['username'] == $username && $k['password'] == $password){
                $_SESSION['username'] = $username;
                header('Location: index.php');
                return;
            } else{
                $_strike--;
                echo '<p>Username or password might be wrong! Please try again.</p>';
                header('Location: loginPage.php');

            }
        }
        
    }
?>