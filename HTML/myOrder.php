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
    <title>Shiba Sushi - My Order</title>

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
    <div class=" bg-black text-white offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
    <nav style="--bs-breadcrumb-divider: '>'; color: white;" class="h4 pt-4 d-flex justify-content-center" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active text-warning"><a href="#">Order Details</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><a href="checkoutPayment.php">Checkout & Payment</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><a href="#">Order Complete</a></li>
        </ol>
    </nav>
    <main class="bg-black text-white py-3 d-flex flex-wrap container-fluid row m-0">
        <div class="content px-sm-4 py-3 col-md-8 col-sm-12 container-fluid">
            <table class="table text-white" id="myTable">
                <thead>
                    <tr class="head-table">
                      <th scope="col"></th>
                      <th scope="col">Id</th>
                      <th scope="col-6">Product</th>
                      <th scope="col-4">Price</th>
                      <th scope="col-1">Quantity</th>
                      <th scope="col-1 " class="text-end">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                  </tbody>
            </table>
            <div class="options d-flex justify-content-end">
                <div class="back-to-menu m-2">
                    <a href="menu.php">
                        <button class="btn btn-warning">< Back To Menu</button>
                    </a>    
                </div>
                <div class="btnApply m-2 ">
                    <!-- <button type="button" class="btn btn-success" id="btnAppChange">Apply Changes</button> -->
                </div>
            </div>
            

        </div>
        <div class="infoOrder px-4 py-3 col-md-4 container-fluid">
            <section>
                <h5 class="border-bottom p-2 fw-bold">Summary</h5>
                <div class="p-2" id="summary">
                    <div id="subtotalRow" class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="totalItemsValue"></span>
                    </div>
                    <div id="shippingFeeRow" class="d-flex justify-content-between border-bottom">
                        <span class="pb-2">Shipping fee</span>
                        <span id="shippingValue"></span>
                    </div>
                    <div id="totalRow" class="d-flex justify-content-between fw-bolder pt-2">
                        <span>Total</span>
                        <span id="totalValue"></span>
                    </div>
                </div>
                <a href="checkOutPayment.php">
                    <button class="w-100 border-0 bg-warning rounded p-2 mt-2 fw-bold">Checkout & Payment</button>
                </a>
            </section>
        </div>
    </main>
    <?php include '.\\core\\footer.php'?>

<script src="..\scripts\scriptMyOrder.js" type="module"></script>
<script src="..\scripts\scriptLocalStorage.js"></script>

</body>
</html>