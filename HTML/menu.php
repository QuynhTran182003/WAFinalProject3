<?php
    session_start();
    if(empty($_SESSION['username'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiba Sushi - Menu / Order Online</title>

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
          <a class="sidebar-item d-flex align-items-center p-3 rounded" href="index.php"><img src="..\media\home24.png" alt=""><span class="mx-2">Home</span></a>
          <?php
            if(isset($_SESSION['username'])){
                echo ' 
                <a class="sidebar-item d-flex align-items-center p-3 rounded" href="myOrder.php"><img src="..\media\shopping-bag.png" alt=""><span class="mx-2">My Order</span></a>
                ';
            }
          ?>
          <a class="sidebar-item d-flex align-items-center p-3" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><img src="..\media\menu24.png" alt=""><span class="mx-2">Menu</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="gallery.php"><img src="..\media\gallery24.png" alt=""><span class="mx-2">Gallery</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="contact.php"><img src="..\media\telephone.png" alt=""><span class="mx-2">Contact</span></a>
        </div>
    </div>
    <?php include ".\\core\\header.php"?>

    <main class="bg-black p-0 border-top border-warning">
        <div class="d-flex">
            <div class="row m-0">
                <!-- navigation -->
                <nav class="col-sm-3 col-md-3 col-lg-2 m-sm-5 p-0">
                    <!-- title navigation -->
                    <h5 class="p-3 text-center text-black bg-warning rounded">Category</h5>
                    <!-- list of category -->
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item bg-black text-light py-2" id="Nigiri">Nigiri</li>
                        <li class="list-group-item bg-black text-light py-2" id="Aburi Nigiri" type="button">Aburi Nigiri</li>
                        <li class="list-group-item bg-black text-light py-2" id="Maki" type="button">Maki</li>
                        <li class="list-group-item bg-black text-light py-2" id="Ura Maki" type="button">Ura Maki</li>
                        <li class="list-group-item bg-black text-light py-2" id="Special Ura Maki" type="button">Special Ura Maki</li>
                        <li class="list-group-item bg-black text-light py-2" id="Futo" type="button">Futo</li>
                        <li class="list-group-item bg-black text-light py-2" id="Sashimi" type="button">Sashimi</li>
                        <li class="list-group-item bg-black text-light py-2" id="Menu" type="button">Menu</li>
                    </ul>
                </nav>
                <!-- container items -->
                <div class="col-sm container p-0">
                    <!-- row -->
                    <div class="row m-0 myCardContainer">
                        <!-- columns -->
                        <!-- <div class="p-0 col-xl-3 col-lg-4 col-md-6">
                            <div class="card bg-black my-5 mx-3 border-warning-subtle" id="111" >
                                <img src="..\media/background.jpg" class="card-img-top" alt="..." id="111">
                                <div class="card-body" id="111">
                                    <div class="card-info d-flex justify-content-between text-white">
                                        <h6 class="card-title m-0">111. Aburi Losos</h6>
                                        <h6 class="card-title m-0">99 Kč</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button class="btn btn-warning d-flex align-items-center btnAddToCart">
                                        <img src="..\media/shopping-cart16.png" alt="">   
                                        <span class="px-1">Add To Cart</span>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
    
                        <div class="p-0 col-xl-3 col-lg-4 col-md-6 ">
                            <div class="card bg-black my-5 mx-3 border-warning-subtle" id="${items[i].id}" >
                                <img src="..\media/background.jpg" class="card-img-top" alt="..." id="${items[i].id}">
                                <div class="card-body" id=${items[i].id}>
                                    <div class="card-info d-flex justify-content-between text-white">
                                        <h6 class="card-title m-0   ">asdfasdf</h6>
                                        <h6 class="card-title m-0   ">$- Kč</h6>
                                    </div>
                                    
                                </div>
                                <div class="p-0 card-footer d-flex justify-content-center">
                                    <button class="m-2 btn btn-warning d-flex align-items-center btnAddToCart">
                                        <img src="..\media/shopping-cart16.png" alt="">   <span class="px-1">Add To Cart</span>
                                    </button>
                                </div>
                            </div>
                        </div> --> 
    
                        
    
                    </div>
                </div>
            </div>
        </div>
        
        <div class="myModalDiv"></div>
    </main>

    <?php include ".\\core\\footer.php"?>

    <script src="..\scripts\scriptOrderPg.js"></script>

</body>
</html>