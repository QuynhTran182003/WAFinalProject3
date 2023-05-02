<?php
    session_start();
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

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="bg-black text-white offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header d-flex align-items-center">
            <?php
                if(isset($_SESSION['username'])){
                    echo '
                    <h5 class="mb-0 offcanvasRightLabel d-flex align-items-center">
                        <img src="media\profile.png" alt="" class="me-2">
                        <span>', $_SESSION['username'] ,'</span>
                    </h5>';
                }
            ?>
            <?php
                if(isset($_SESSION['username'])){
                    echo ' 
                    <a href="logout.php" class="h5 mb-0 d-flex align-items-center position-relative py-2 border-0" >
                        <img src="media\logout.png" alt="" class="m-1">
                        <span class="" id="logOutOpt">Log out</span>
                    </a>
                    ';
                } else{
                    echo '
                    <a href="login.php" class="h5 mb-0 d-flex align-items-centerposition-relative py-2 border-0" >
                        <img src="media\login.png" alt="" class="m-1">
                        <span class="logInOpt" id="logInOpt">Log in</span>
                    </a>
                    ';
                }
            ?>
        </div>
        <div class="offcanvas-body p-0">
          <a class="sidebar-item d-flex align-items-center p-3 rounded" href="index.php"><img src="media/home24.png" alt=""><span class="mx-2">Home</span></a>
          <?php
            if(isset($_SESSION['username'])){
                echo ' 
                <a class="sidebar-item d-flex align-items-center p-3 rounded" href="myOrder.php"><img src="media/shopping-bag.png" alt=""><span class="mx-2">My Order</span></a>
                ';
            }
          ?>
          <a class="sidebar-item d-flex align-items-center p-3" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><img src="media/menu24.png" alt=""><span class="mx-2">Menu</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="gallery.php"><img src="media/gallery24.png" alt=""><span class="mx-2">Gallery</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="contact.php"><img src="media/telephone.png" alt=""><span class="mx-2">Contact</span></a>
        </div>
    </div>
    <header class="bg-black">
        <div class="containerHeader p-2 align-items-center justify-content-evenly" >
            <!-- 1.part selection -->
            <ul class="nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><p class="h5">Home</p></a>
                </li>
                <span class="dividerVertical text-white"></span>
                <li class="nav-item">
                    <a class="nav-link text-white" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><p class="h5">Menu</p></a>
                </li>
            </ul>
            <!-- logo and brand -->
            <h2 class="title">
                <a href="index.php" class="text-decoration-none text-white d-flex align-items-center">
                    <img src="media\logo.png" alt=""  width="80" height="80">
                    Shiba Sushi
                </a>
            </h2>
            <!-- 2.part selection -->
            <ul class="nav d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="gallery.php"><p class="h5">Gallery</p></a>
                </li>
                <span class="dividerVertical text-white"></span>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php"><p class="h5">Contact</p></a>
                </li>
            </ul>
            <?php 
            if(isset($_SESSION['username'])){
                echo '<button class="bg-black position-absolute top-40 end-0 m-2 p-2 border-0" type="button">
                <a href="myOrder.php"><img src="media/bag32.png" alt=""></a>
                </button>';
            } else{
                echo '<button class="bg-black position-absolute top-40 end-0 m-2 p-2 border-0" type="button">
               Login
                </button>';
            }
            ?>
            
        </div>
        <div class="containerCollapsed justify-content-center align-items-center p-1" >
            <!-- logo -->
            <a href="index.php" class="text-decoration-none ">
                <h2 class="title ">
                    <img src="media\logo.png" alt=""  width="75" height="75">
                </h2>
            </a>
            <button class="bg-black position-absolute top-40 end-0 m-2 p-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="media/menu.png" class="dropdown-toggle" alt="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
        </div>

    </header>

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
                                <img src="media/background.jpg" class="card-img-top" alt="..." id="111">
                                <div class="card-body" id="111">
                                    <div class="card-info d-flex justify-content-between text-white">
                                        <h6 class="card-title m-0">111. Aburi Losos</h6>
                                        <h6 class="card-title m-0">99 Kč</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button class="btn btn-warning d-flex align-items-center btnAddToCart">
                                        <img src="media/shopping-cart16.png" alt="">   
                                        <span class="px-1">Add To Cart</span>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
    
                        <div class="p-0 col-xl-3 col-lg-4 col-md-6 ">
                            <div class="card bg-black my-5 mx-3 border-warning-subtle" id="${items[i].id}" >
                                <img src="media/background.jpg" class="card-img-top" alt="..." id="${items[i].id}">
                                <div class="card-body" id=${items[i].id}>
                                    <div class="card-info d-flex justify-content-between text-white">
                                        <h6 class="card-title m-0   ">asdfasdf</h6>
                                        <h6 class="card-title m-0   ">$- Kč</h6>
                                    </div>
                                    
                                </div>
                                <div class="p-0 card-footer d-flex justify-content-center">
                                    <button class="m-2 btn btn-warning d-flex align-items-center btnAddToCart">
                                        <img src="media/shopping-cart16.png" alt="">   <span class="px-1">Add To Cart</span>
                                    </button>
                                </div>
                            </div>
                        </div> --> 
    
                        
    
                    </div>
                </div>
            </div>
        </div>
        
    <div class="myModalDiv">
        
    </div>

    </main>

    <footer class="bg-black text-white d-flex flex-column text-center p-2 border-top border-warning">
        <!-- 3 info restaurant (hrs, addres, contact) -->
        <div class="d-flex justify-content-evenly flex-wrap my-2">
            <div class="OpeningHours mx-5 my-2 p-3">
                <h3 class="mb-3">Opening hours</h3>
                <p>
                    <img src="media/calendar.png" alt="" class="mx-1">
                    Pondělí – Neděle </p>
                    

                <p><img src="media/calendar (1).png" alt="" class="mx-1">11:00 – 21:00</p>
            </div>
            <div class="address mx-5 my-2 p-3">
                <h3 class="mb-3">Address</h3>
                <p><img src="media/location.png" alt="" class="mx-1">Budějovická 371 - Jesenice 252 42 </p>
            </div>
            <div class="contact mx-5 my-2 p-3">
                <h3 class="mb-3">Contact</h3>
                <p><img src="media/telephone.png" alt="" class="mx-1">+420 774 688 688 </p>
                <p><img src="media/telephone.png" alt="" class="mx-1">+420 776 866 988</p>
                <p> <img src="media/mail.png" alt="" class="mx-1">shibasushi21@gmail.com</p>
            </div>
        </div>
        <!-- google map embedded -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1664.0893765303474!2d14.516317549564803!3d49.96679467075129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b8f5a0dfd7e13%3A0x25ea1859119c5674!2sShiba%20Sushi%20Restaurace!5e0!3m2!1svi!2scz!4v1681400258023!5m2!1svi!2scz" 
        style="height: 28rem; border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <!-- social media -->
        <div class="containerContactIcon m-4">
            <a href="https://www.facebook.com/profile.php?id=100005155502657" class="m-2"><img class="contactIcon" src="media/facebook.png" alt="fb"></a>
            <a href="https://www.instagram.com/quynhtran183/" class="m-2"><img class="contactIcon" src="media/instagram.png" alt="ins"></a>
            <a href="https://github.com/QuynhTran182003" class="m-2"><img class="contactIcon" src="media/github.png" alt="git"></a>
        </div>
        <!-- author of web -->
        <p class="m-0">Copyright 2023 © Quynh Tran</p>
    </footer>

    <script src="scripts\scriptOrderPg.js"></script>

</body>
</html>