<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shiba Sushi - Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&family=Dosis:wght@300&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
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

    <main class="bg-black text-white">
        <section class="poster"><img src="..\media/backgroundContact.jpg" alt="" class="poster w-100 opacity-75"></section>
        <!-- About reservation -->
        <div class="reservation d-flex justify-content-evenly align-items-center row m-0">
            <!-- additional info -->
            <section class="col-lg-8 w-50 py-5 mx-sm-3 text-center">
                <p class="h5">Dear customers,</p>
                <p class="h5">in order to avoid a long waiting time and the case of rejection due to a lot of orders at the same time, we recommend that you make a reservation or call at least 2-3 hours in advance. This way we could better bring you the best quality of all dishes.</p><br>
                <p class="h5">Thank you for your understanding and cooperation.</p><br>
                <p class="h5">Your Shiba Team</p>
            </section>
            <!-- reservation form -->
            <section class="col-lg-4 reservationForm d-flex align-items-center flex-column">
                <h1 class="p-4">Make a Resevertion</h1>
                <form action="..\PHP\reserve.php" method="post" class="border-top py-4 border-light container-sm">
                    <div class=" mb-3 d-flex align-items-center ">
                        <label for="name" class="col-4">Name</label>
                        <div class="col-8">
                            <input class="text-white form-control bg-dark border border-dark" type="text" name="name" id="name" placeholder="Name" required>
                        </div>
                    </div>
                    
                    <div class=" mb-3 d-flex align-items-center">
                        <label for="name" class="col-4">Last Name</label>
                        <div class="col-8">
                            <input class="text-white form-control  bg-dark border border-dark" type="text" name="lastName" id="lastName" required>
                        </div>
                    </div>
                    
                    <div class=" mb-3 d-flex align-items-center ">
                        <label for="email" class="col-4">Email</label>
                        <div class="col-8">
                        <input type="text" class="text-white form-control  bg-dark border border-dark" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center ">
                        <label for="name" class="col-4">Phone</label>
                        <div class="col-8">
                            <input class="text-white form-control  bg-dark border border-dark" type="tel" name="tel" id="tel" required>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="name" class="col-4">Number of people</label>
                        <div class="col-8">
                            <select class="form-select bg-dark text-white border border-dark" id="mySelect" name="numberPeople">
                                <option selected>Select number of people</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="3">5</option>
                                <option value="3">6</option>
                                <option value="3">7</option>
                                <option value="3">8</option>
                                <option value="3">9</option>
                                <option value="3">10+ (Please contact to us)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center ">
                        <label for="name" class="col-4" >Date & Time</label>
                        <div class="d-flex col-8">
                            <input id="date" class="text-white form-control me-2 bg-dark text-white border border-dark " name="date" type="date" />
                            <input id="time" class="text-white form-control bg-dark text-white border border-dark" name="time" type="time" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="w-100 btn btn-warning py-2">Reserve</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    
    <?php include ".\\core\\footer.php"?>

    <script src="..\scripts\scriptContact.js"></script>
</body>
</html>