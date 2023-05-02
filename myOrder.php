<?php
    session_start();
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
    <header class="bg-black border-bottom border-warning">
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
            <button class="bg-black position-absolute top-40 end-0 m-2 p-2 border-0" type="button">
                <a href="myOrder.php"><img src="media/bag32.png" alt=""></a>
            </button>
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
    <main class="bg-black text-white py-3 border-top border-warning d-flex flex-wrap container-fluid">
        <div class="content px-4 py-3 col-md-8 container-fluid border-end">
            <table class="table text-white">
                <thead>
                    <tr>
                      <th scope="col-6">Product</th>
                      <th scope="col-4">Price</th>
                      <th scope="col-1">Quantity</th>
                      <th scope="col-1 " class="text-end">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    <!-- <tr>
                    <th scope="row d-flex align-items-center">
                        <button class="btn btn-danger btn-sm m-1 border-0 px-2">X</button>
                        <span>01. Miso</span>
                    </th>
                      <td>99</td>
                      <td class="w-25"><input type="number" name="Quantity" id="" class="w-25 px-2 bg-dark text-white border border-dark rounded " value="2"></td>
                      <td>200</td>
                    </tr> -->
                    
                  </tbody>
            </table>
        </div>
        <div class="infoOrder px-4 py-3 col-md-4 container-fluid">
            <section>
                <h5 class="border-bottom p-2 fw-bold">Total in payment</h5>
                <div class="p-2  border-bottom" id="subtotal">
                    <div id="subtotalRow" class="d-flex justify-content-between">
                        <span>Subtotal</span>
                    </div>
            </section>
        </div>
    </main>

    <script>
        function RenderItems(itemArr){
            let total = 0;
            for(let i = 0; i < itemArr.length; i++){
                console.log(itemArr[i]);
                let id = itemArr[i].product.id;
                let name = itemArr[i].product.productName;
                let price = itemArr[i].product.price;
                let quantity = itemArr[i].quantity;
                let subtotal = price*quantity;
                let html = `<tr class="orderItems">
                      <th scope="row">
                        <button class="btn btn-danger btn-sm m-1 border-0 px-2 btnDelItem" id="${id}">X</button>
                        <span>${id}. ${name}</span>
                        </th>
                      <td>${price},- Kč</td>
                      <td class="w-25"><input type="number" name="Quantity" id="input" class="w-50 px-2 bg-dark text-white border border-dark rounded" value="${quantity}" min="1"></td>
                      <td class="text-end">${subtotal},- Kč</td>
                    </tr>`;
                $("tbody").append(html);
                total += subtotal;
            }
            let html = `<span>${total},- Kč</span>`;
            $("#subtotalRow").append(html);

        }
        const str = sessionStorage.getItem("myCart");
        // convert string to valid object
        const parsedArr = JSON.parse(str);


        RenderItems(parsedArr);
        $(".orderItems").on({
            mouseenter: function(){
                $(this).removeClass("text-white");
                $(this).addClass("text-warning");
                $(this).css("cursor", "pointer");
            },  
            mouseleave: function(){
                $(this).removeClass("text-warning");
                $(this).addClass("text-white");
            }
        })
        $(".btnDelItem").click(function(){
            // let product = products.find(obj => {
            //             return obj.id == this.id;
            // });
            alert(`Deleted ${this.id}`);
        })
    </script>
</body>
</html>