<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiba Sushi</title>
   
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
    <div class="bg-black text-white offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header d-flex align-items-center">
            <?php
                if(isset($_SESSION['username'])){
                    echo '
                    <h5 class="mb-0 offcanvasRightLabel d-flex align-items-center">
                        <img src="..\media\profile.png" alt="" class="me-2">
                        <span>', $_SESSION['username'] ,'</span>
                    </h5>';
                }
            ?>
            <?php
                if(isset($_SESSION['username'])){
                    echo ' 
                    <a href="..\PHP\logout.php" class="h5 mb-0 d-flex align-items-center position-relative py-2 border-0" >
                        <img src="..\media\logout.png" alt="" class="m-1">
                        <span class="" id="logOutOpt">Log out</span>
                    </a>
                    ';
                } else{
                    echo '
                    <a href="..\PHP\login.php" class="h5 mb-0 d-flex align-items-centerposition-relative py-2 border-0" >
                        <img src="..\media\login.png" alt="" class="m-1">
                        <span class="logInOpt" id="logInOpt">Log in</span>
                    </a>
                    ';
                }
            ?>
        </div>
        <div class="offcanvas-body p-0">
          <a class="sidebar-item d-flex align-items-center p-3 rounded" href="index.php"><img src="..\media/home24.png" alt=""><span class="mx-2">Home</span></a>
          <?php
            if(isset($_SESSION['username'])){
                echo ' 
                <a class="sidebar-item d-flex align-items-center p-3 rounded" href="myOrder.php"><img src="..\media/shopping-bag.png" alt=""><span class="mx-2">My Order</span></a>
                ';
            }
          ?>
          <a class="sidebar-item d-flex align-items-center p-3" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><img src="..\media\menu24.png" alt=""><span class="mx-2">Menu</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="gallery.php"><img src="..\media\gallery24.png" alt=""><span class="mx-2">Gallery</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="contact.php"><img src="..\media\telephone.png" alt=""><span class="mx-2">Contact</span></a>
        </div>
    </div>
    <header class="bg-transparent fixed-top" >
        <div class="containerHeader p-2 align-items-center justify-content-evenly" >
            <!-- 1.part selection -->
            <ul class="nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="intro.php"><p class="h4">Home</p></a>
                </li>
                <span class="dividerVertical text-white"></span>
                <li class="nav-item">
                    <a class="nav-link text-white" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><p class="h4">Menu</p></a>
                </li>
            </ul>
            <!-- logo and brand -->
            <h2 class="title">
                <a href="#" class="text-decoration-none text-white d-flex align-items-center">
                    <img src="..\media\logo.png" alt=""  width="90" height="90"><span class="h1">Shiba Sushi</span> 
                </a>
            </h2>
            <!-- 2.part selection -->
            <ul class="nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="gallery.php"><p class="h4">Gallery</p></a>
                </li>
                <span class="dividerVertical text-white"></span>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php"><p class="h4">Contact</p></a>
                </li>
            </ul>

            <?php
                if(isset($_SESSION['username'])){
                    echo ' 
                    <a href="..\PHP\logout.php" class="bg-transparent position-absolute top-40 end-0 m-2 p-2 border-0" type="button">
                        <img src="..\media\logout.png" alt="" class="m-1">
                        <span class="h5" id="logOutOpt">Log out</span>
                    </a>
                    ';
                }
                
            ?>
        </div>
        
        <div class="containerCollapsed justify-content-center align-items-center p-1" >
            <!-- logo -->
            <a href="index.php" class="text-decoration-none ">
                <h2 class="title ">
                    <img src="..\media\logo.png" alt=""  width="75" height="75">
                </h2>
            </a>
            <button class="bg-transparent position-absolute top-40 end-0 m-2 p-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="..\media\menu.png" class="dropdown-toggle" alt="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
        </div>
    </header>
    
    <main>
        <div class="container-fluid p-0 sticky-top ">
            <!-- background -->
            <div class="bg-image">
                <!-- mask of bg -->
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.5);">
                    <!-- content -->
                    <div class="content vh-100 d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-column align-items-center justify-content-center" id="welcome">
                            <h3 class="text-warning m-3 ">Welcome to the world of Sushi<?php
                                if(isset($_SESSION['username']))
                                    echo ', ', $_SESSION['username'], '!';
                                    else{
                                        echo '!';
                                    }
                                ?>
                            </h3>
                            <?php
                                if(isset($_SESSION['username']))
                                    echo '
                                            <a href="..\HTML\menu.php" type="button"class="btn btn-lg btn-outline-warning">Order Online</a>
                                    ';
                                    else{
                                        echo '
                                            <a href="..\PHP\login.php" type="button"class="btn btn-lg btn-outline-warning w-100">Sign in</a>
                                        ';
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include ".\\core\\footer.php"?>


    <script src="..\scripts\script.js"></script>
</body>
</html>