<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiba Sushi - Gallery</title>

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
          <a class="sidebar-item d-flex align-items-center p-3" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><img src="..\media/menu24.png" alt=""><span class="mx-2">Menu</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="gallery.php"><img src="..\media/gallery24.png" alt=""><span class="mx-2">Gallery</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="contact.php"><img src="..\media/telephone.png" alt=""><span class="mx-2">Contact</span></a>
        </div>
    </div>
    <?php include ".\\core\\header.php"?>
    
    <main class="bg-black">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner text-center py-5">
              <div class="carousel-item active ">
                <img src="..\media/g5.jpg" class="w-75" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..\media/g6.jpg" class="w-75" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..\media/g7.jpg" class="w-75" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..\media/g8.jpg" class="w-75" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..\media/g9.jpg" class="w-75" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..\media/g10.jpg" class="w-75" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </main>
    <?php include ".\\core\\footer.php"?>


    <script src="..\scripts\scriptGalle.js"></script>
    <script src="..\scripts\scriptLocalStorage.js"></script>


</body>
</html>