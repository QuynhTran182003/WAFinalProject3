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
    <title>Checkout & Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="..\style.css">
</head>
<body class="bg-black">
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

    <nav style="--bs-breadcrumb-divider: '>';" class="h4 pt-4 d-flex justify-content-center" aria-label="breadcrumb">
        <ol class="breadcrumb d-flex flex-wrap">
            <li class="breadcrumb-item text-white "><a href="myOrder.php">Order Details</a></li>
            <li class="breadcrumb-item active text-warning" aria-current="page"><a href="#">Checkout & Payment</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><a href="#">Order Complete</a></li>
        </ol>
    </nav>
    <main class="">
        <form action="orderComplete.php" method="post">
        <div class="container-fluid ">
            <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 card p-4 bg-black border-dark text-white ">
                        <p class="heading text-center h4">PAYMENT DETAILS</p>
                        <form class="card-details" method="POST" action="payment.php">
                            <div class="form-group mb-0">
                                <p class="text-warning mb-0">Card Number</p> 
                                <input class="bg-dark border-0 p-2 text-white rounded-pill" type="number" name="card-num" placeholder="1234 5678 9012 3457" id="cno" minlength="" maxlength="19" required>
                                <img src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px"/>
                            </div>
                            <div class="form-group">
                                <p class="text-warning mb-0">Cardholder's Name</p> 
                                <input class="bg-dark border-0 p-2 text-white rounded-pill" type="text" name="name" placeholder="Jan Novak"  required>
                            </div>
                            <div class="form-group pt-2 mb-3">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-sm">
                                        <p class="text-warning mb-0">Expiration</p>
                                        <input class="bg-dark border-0 p-2 text-white rounded-pill" type="text" name="exp" placeholder="MM/YYYY" id="exp" minlength="" maxlength="7" required>
                                    </div>
                                    <div class="col-sm">
                                        <p class="text-warning mb-0">CVV</p>
                                        <input class="bg-dark border-0 p-2 text-white rounded-pill" type="password" name="cvv" placeholder="&#9679;&#9679;&#9679;" size="3" minlength="3" maxlength="3" required>
                                    </div>
                                </div>
                            </div>		

                            <button type="submit" class="btn btn-primary rounded-pill bg-warning border-0 text-black">Pay ,- KC</button>
                        </form>
                    </div>
            </div>
        </div>
        </form>

    </main>
    <?php include ".\\core\\footer.php"?>
    <script src="..\scripts\scriptLocalStorage.js"></script>

</body>
</html>