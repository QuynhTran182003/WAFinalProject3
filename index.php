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
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="bg-black text-white offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Menu</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
          <a class="sidebar-item d-flex align-items-center p-3 rounded" href="intro.php"><img src="media/home24.png" alt=""><span class="mx-2">Home</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="https://shibasushi.cz/wp-content/uploads/2022/11/MENU-English.pdf"><img src="media/menu24.png" alt=""><span class="mx-2">Menu</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="gallery.php"><img src="media/gallery24.png" alt=""><span class="mx-2">Gallery</span></a>
          <a class="sidebar-item d-flex align-items-center p-3" href="contact.php"><img src="media/telephone.png" alt=""><span class="mx-2">Contact</span></a>
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
                    <img src="media\logo.png" alt=""  width="90" height="90"><span class="h1">Shiba Sushi</span> 
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
            
           
            </a>
            <?php
            if(isset($_SESSION['username'])){
                
                echo ' 
                <div class="position-absolute top-40 end-0 m-2 p-2 border-0">
                    <a href="logout.php" class="position-relative  m-2 p-2 border-0" ><p class="h5">Log out</p></a>
                    </div>
                ';
            } else{
                echo ' <a href="loginPage.php" class="position-absolute top-40 end-0 m-2 p-2 border-0" >
                <p class="h5">Log in</p>';

            }
            ?>
            
        </div>
        <div class="containerCollapsed justify-content-center align-items-center p-1" >
            <!-- logo -->
            <a href="intro.php" class="text-decoration-none ">
                <h2 class="title ">
                    <img src="media\logo.png" alt=""  width="75" height="75">
                </h2>
            </a>
            <button class="bg-transparent position-absolute top-40 end-0 m-2 p-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="media/menu.png" class="dropdown-toggle" alt="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <div class="d-flex flex-column justify-content-center align-items-center vh-100" id="welcome">
                        <h3 class="text-warning m-3 ">Welcome to the world of Sushi<?php
                            if(isset($_SESSION['username']))
                                echo ', ', $_SESSION['username'], '!';
                                else{
                                    echo '!';
                                }
                            ?>
                        </h3>
                        <a href="menu.php" type="button"class="btn btn-lg btn-outline-warning">Order Online</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-black text-white d-flex flex-column text-center p-2">
        <!-- info restaurant -->
        <div class="d-flex justify-content-evenly flex-wrap my-2">
            <!-- opening hrs -->
            <div class=" OpeningHours  mx-5 my-2 p-3">
                <h3 class="mb-3">Opening hours</h3>
                <p><img src="media/calendar.png" alt="" class="mx-1">Pondělí – Neděle</p>
                <p><img src="media/calendar (1).png" alt="" class="mx-1">11:00 – 21:00</p>
            </div>
            <!-- address -->
            <div class="address mx-5 my-2 p-3">
                <h3 class="mb-3">Address</h3>
                <p><img src="media/location.png" alt="" class="mx-1">Budějovická 371 - Jesenice 252 42</p>
            </div>
            <!-- contact -->
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
        <!-- author -->
        <p class="m-0">Copyright 2023 © Quynh Tran</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>