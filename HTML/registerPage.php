<?php 
    // if(isset($_POST['submit'])){
    //     $user = new RegisterUser($_POST['username'], $_POST['password'], $_POST['email']);
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiba - Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\style.css">
</head>
<body>
    <main class="text-center d-flex justify-content-center align-items-center" style="
        background-image: url('..\\media\\bgLogin.jpg');
        height: 100vh;
        background-size: cover;
        background-position: center;
        z-index:-2;
        "
    >
        <div class="form-box text-white w-50 rounded p-4" style="background-color: rgb(0,0,0,0.5);">
            <div class="form-value d-flex justify-content-center align-items-center">
                <form action="..\PHP\registration.php" method="post">
                    <img src="..\media\logo.png" alt="" width="80" height="80">
                    <h2 class=" text-center">Register</h2>
                    
                    <div class="inputbox my-3 border-bottom border-2">
                        <input type="text" name="username" class=" w-75 bg-transparent h5 border-0" style="outline:none;" placeholder="Username"required>
                        <img src="..\media\profile.png" alt="">
                    </div>
                    <div class="inputbox my-3 border-bottom border-2">
                        <input type="text" name="email" class=" w-75 bg-transparent h5 border-0" style="outline:none;" placeholder="Email"required>
                        <img src="..\media\mail.png" alt="">
                    </div>
                    <div class="inputbox my-3 border-bottom border-2">
                        <input id="password" type="password" name="password" class="w-75 bg-transparent h5 border-0" style="outline: none;" placeholder="Password"required>
                        <img src="..\media\lock.png" alt="">
                    </div>
                    <div class="inputbox my-3 border-bottom border-2">
                        <input id="repeatPassword" type="password" name="repeatPassword" class="w-75 bg-transparent h5 border-0" style="outline: none;" placeholder="Repeat password"required>
                        <img src="..\media\lock.png" alt="">
                    </div>
                    <!-- <div class="forget my-4 ">
                            <input type="checkbox"><span class="h5 m-2">Remember Me</span>
                            <a href="#"><span class="h5 m-2">Forget Password</span></a>
                    </div> -->
                    <button class="btn btn-light rounded w-100" type="submit" name="submit">
                        <span class="h6 fw-bold">
                            Sign Up
                        </span>    
                    </button>
                    <p class="error text-danger fw-bold pt-2 h5"><?php echo @$user->error?></p>
                </form>
            
            </div>
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"){
                    echo "<p>Fill in all fields!</p>";
                }
                else if($_GET["error"] == "invaliduid"){
                    echo "<p>Choose a proper username!</p>";
                    
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<p>Invalid email</p>";
                    
                }
                else if($_GET["error"] == "unmatchpassword"){
                    echo "<p>Passwords dont match!</p>";
                    
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p>Username has been taken!</p>";
                    
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Something went wrong, please try again later!</p>";
                    
                }
                else if($_GET["error"] == "none"){
                    header('Location: ..\\HTML\\loginPage.php');
                    exit();
                    
                }
            }
        ?>
        </div>

        
    </main>
</body>
</html>