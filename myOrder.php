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
<body class="bg-black">
    <div class=" bg-black text-white offcanvas offcanvas-end w-50" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
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
    <header class="border-bottom border-warning">
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
    <nav style="--bs-breadcrumb-divider: '>'; color: white;" class="h4 pt-4 d-flex justify-content-center" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active text-warning"><a href="#">Order Details</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><a href="checkoutPayment.php">Checkout & Payment</a></li>
            <li class="breadcrumb-item text-white" aria-current="page"><a href="#">Order Complete</a></li>
        </ol>
    </nav>
    <main class="bg-black text-white py-3 d-flex flex-wrap container-fluid">
        <div class="content px-4 py-3 col-md-8 container-fluid border-end">
            <table class="table text-white" id="myTable">
                <thead>
                    <tr>
                      <th scope="col-6">Product</th>
                      <th scope="col-4">Price</th>
                      <th scope="col-1">Quantity</th>
                      <th scope="col-1 " class="text-end">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                  </tbody>
            </table>
        </div>
        <div class="infoOrder px-4 py-3 col-md-4 container-fluid">
            <section>
                <h5 class="border-bottom p-2 fw-bold">Summary</h5>
                <div class="p-2" id="summary">
                    <div id="subtotalRow" class="d-flex justify-content-between">
                        <span>Subtotal</span>
                    </div>
                    <div id="shippingFeeRow" class="d-flex justify-content-between border-bottom">
                        <span class="pb-2">Shipping fee</span>
                    </div>
                    <div id="totalRow" class="d-flex justify-content-between fw-bolder pt-2">
                        <span>Total</span>
                    </div>
                </div>
                <a href="checkOutPayment.php">
                    <button class="w-100 border-0 bg-warning rounded p-2 mt-2 fw-bold">Checkout & Payment</button>
                </a>
            </section>
        </div>
    </main>
    <footer class="bg-black text-white d-flex flex-column text-center p-2">
        
        <!-- google map embedded -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1664.0893765303474!2d14.516317549564803!3d49.96679467075129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b8f5a0dfd7e13%3A0x25ea1859119c5674!2sShiba%20Sushi%20Restaurace!5e0!3m2!1svi!2scz!4v1681400258023!5m2!1svi!2scz" 
        style="height: 28rem;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
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


<script>
    $(document).ready(function(){
        //animation
        $(".sidebar-item").on({
            mouseenter: function(){
                $(this).addClass('bg-dark');
            },
            mouseleave: function(){
                $(this).removeClass('bg-dark');
            }
        })
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
        //todo delete item
        $(".btnDelItem").click(function(){
            // let product = products.find(obj => {
            //             return obj.id == this.id;
            // });
            alert(`Deleted ${this.id}`);
        })
        //show all items to screen by getting from localstorage
        function RenderItems(itemArr){
            let html ='';
            for(let i = 0; i < itemArr.length; i++){
                let id = itemArr[i].product.id;
                let img = itemArr[i].product.image;
                let name = itemArr[i].product.productName;
                let price = itemArr[i].product.price;
                let quantity = itemArr[i].quantity;
                let subtotal = price*quantity;
                let html = `
                <tr class="orderItems">
                    <th scope="row">
                        <button class="btn btn-danger btn-sm m-1 border-0 px-2 btnDelItem" id="${id}">X</button>
                        <img src="${img}" alt="" class="me-2" width="60">
                        <span>${id}. ${name}</span>
                    </th>
                    <td class="align-middle">${price},- Kč</td>
                    <td class="w-25 align-middle">
                        <input type="number" name="Quantity" id="inputQuantity${id}" class="w-50 px-2 bg-dark text-white border border-dark rounded" value="${quantity}" min="1">
                    </td>
                    <td class="text-end align-middle" id="subtotal${id}">${subtotal},- Kč</td>
                </tr>`;
                $("tbody").append(html);
    
                $(`#inputQuantity${id}`).on("change", () => {
                    let temp = $(`#inputQuantity${id}`).val() * price; // dynamically calculate every change on certain input
                    $(`#subtotal${id}`).html(`${temp},- Kč`);
                    totalItems = UpdateOrderDetails();

                    html = `<span id="totalItemsValue">${totalItems},- Kč</span>`;
                    $("#totalItemsValue").html(html);

                    html = `<span id="totalValue">${totalItems + shipping},- Kč</span>`;
                    $("#totalValue").html(html); 
                    
                });
                totalItems += subtotal; //for each item total of items = value of each item
            } //konec for loop

            html = `<span id="totalItemsValue">${totalItems},- Kč</span>`;
            $("#subtotalRow").append(html);

            total = totalItems + shipping;

            html = `<span id="shippingValue">${shipping},- Kč</span>`;
            $("#shippingFeeRow").append(html);

            html = `<span id="totalValue">${total},- Kč</span>`;
            $("#totalRow").append(html);
        }

        function UpdateOrderDetails(){
            var table = $("#myTable tbody");
            totalItems = 0;

            table.find('tr').each(function () {
                let $tds = $(this).find('td');
                let subtotalField = parseInt($tds.eq(2).text());
                // do something with subtotalField

                totalItems += (subtotalField);

            });
            return totalItems;
        }
        let total = 0;
        let totalItems = 0;
        let shipping = 100;

        const str = sessionStorage.getItem("myCart");
        // convert string to valid object
        const parsedArr = JSON.parse(str);

        // console.log(parsedArr);
        RenderItems(parsedArr);
    })
    
</script>
</body>
</html>