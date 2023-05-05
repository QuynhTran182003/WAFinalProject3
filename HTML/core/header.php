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
                    <img src="..\media\logo.png" alt=""  width="80" height="80">
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
                <a href="myOrder.php"><img src="..\media\bag32.png" alt=""></a>
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
                    <img src="..\media\logo.png" alt=""  width="75" height="75">
                </h2>
            </a>
            <button class="bg-black position-absolute top-40 end-0 m-2 p-2 border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                <img src="..\media\menu.png" class="dropdown-toggle" alt="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            </button>
        </div>

    </header>