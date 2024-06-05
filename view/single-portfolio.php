<?php
    include("header.php");
    include_once("../settings/core.php");
    include_once("../controllers/customer_controller.php");
    $customer = get_customer_ctr($_SESSION["id"]);
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">single portfolio</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">single portfolio</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <div class="single-portfolio-area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="single-portfolio-img">
                            <div style="width: 650px; height: 640px">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="../images/profiles/<?=$customer['customer_image']?>" alt="product images">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="portfolio-description mrg-sm">
                            <h2><?=$customer['customer_fname']." ".$customer['customer_lname']?></h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliqu erat volutpat. Ut wisi enim ad minim veniam.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna</p>
                            <div class="portfolio-info">
                                <ul>
                                    <li><span>Email:</span><?=$customer['customer_email']?></li>
                                    <li><span>Contact:</span><?=$customer['customer_contact']?></li>
                                    <li><span>City:</span><?=$customer['customer_city']?></li>
                                    <li><span>Country:</span><?=$customer['customer_country']?></li>
                                </ul>
                            </div>
                            <div class="portfolio-social">
                                <ul>
                                    <li>Share: </li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    <!-- Body main wrapper end -->
    <?php
            include("footer.php");
            include("product-quickview.php");
            include("scripts.php");
       ?>

</body>
</html>