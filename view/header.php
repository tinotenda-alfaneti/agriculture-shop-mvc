<?php
    include_once("../settings/core.php");
    include_once("../functions/cartview.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>elevate murimi.</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="../css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="../css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="../css/custom.css">

    <style>
        .quantity-circle {
        position: absolute;
        top: 0;
        right: 0;
        width: 30px;
        height: 30px;
        background-color: black;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 14px;
        font-weight: bold;
        }

    </style>


    <!-- Modernizr JS -->
    <script src="../js/vendor/modernizr-3.11.7.min.js"></script>
</head>

<body> 

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer home-v5">
        <!-- Start Header Style -->
        <header id="header" class="bg__white header--5">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-2 col-lg-2 col-md-3 d-none d-md-block">
                        <nav class="mainmenu__nav d-none d-lg-block">
                            <ul class="main__menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="about.php">About</a></li>
                                
                                
                            </ul>
                        </nav>                       
                    </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-lg-4 col-xl-8 col-md-5 col-4">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="../images/logo/logo1.png" alt="logo">
                                </a>
                            </div>
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-lg-2 col-md-4 col-7">  
                            <ul class="menu-extra menu-extra-mrg-none">

                                <?php 
                                    $requestUri = $_SERVER['REQUEST_URI'];
                                    if (strpos($requestUri, '/shop.php') !== false) {
                                ?>
                                <li class="search search__open d-none d-md-block d-lg-block"><span class="ti-search"></span></li>

                                <?php } ?>

                                <?php
                                    if  (!isLoggedIn()) { ?>
                                        <li><a href="login-register.php"><span class="ti-user"></span></a></li>
                                    <?php } ?>
                                    <?php if (isLoggedIn()) {?>
                                        <li><a href="single-portfolio.php"><span class="ti-user"></span></a></li>
                                    <?php };
                                    
                                ?>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                                <li class="toggle__menu"><span class="ti-menu"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="product_search.php" method="POST">
                                    <input name="query" placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Offset MEnu -->
            <div class="offsetmenu">
                <div class="offsetmenu__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>

                    <?php if (isLoggedIn()) {?>
                    <div class="off__contact">
                        <h4 class="offset__title"><a href="../actions/logout_action.php" rel="noopener noreferrer">Log Out</a></h4>
                    </div>
                    <?php }?>

                    <?php if (isAdmin()) {?>
                    <div class="off__contact">
                        <p></p>
                        <h4 class="offset__title"><a href="admin_dash.php" rel="noopener noreferrer">Visit Shop Dashboard</a></h4>
                    </div>
                    <?php } else if (isLoggedIn()) {?>
                    <div class="off__contact">
                        <p></p>
                        <h4 class="offset__title"><a href="../actions/open_shop.php" rel="noopener noreferrer">Open your e-Shop</a></h4>
                    </div>
                    <?php }?>
                    <div class="offset__sosial__share">
                        <h4 class="offset__title">Follow Us On Social</h4>
                        <ul class="off__soaial__link">
                            <li><a class="bg--twitter" href="#"  title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>
                            
                            <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                            <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                            <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                            <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Offset MEnu -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>

                    <?php
                        if  (isLoggedIn()) { show_cart_side($_SESSION["id"]);  }?>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->