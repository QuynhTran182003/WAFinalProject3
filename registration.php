<?php
    session_start();

    $username = $_POST['username'];
    $password  = $_POST['password'];
    $repeatPassword  = $_POST['repeatPassword'];

    if($password !== $repeatPassword){
        echo '<p>repeated wrong</p> ';
    } else{
        echo 'new user added';
    }
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