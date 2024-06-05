<?php
    include_once("header.php");
    include_once("../functions/productview.php");
?>
        
        <!-- Start Slider Area -->
        <div class="slider__container slider--one">
            <div class="slider__activation__wrap owl-carousel owl-theme">
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(../images/slider/bg/veg.jpg) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-8 ms-auto col-md-12 col-12">
                                <div class="slider__inner">
                                    <div class="slider__btn">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="slide slider__full--screen" style="background: rgba(0, 0, 0, 0) url(../images/slider/bg/tom.jpg) no-repeat scroll center center / cover ;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-xl-8 col-md-12 col-12">
                                <div class="slider__inner">
                                    <!-- <h1>New Product <span class="text--theme">Collection</span></h1> -->
                                    <div class="slider__btn">
                                        <!-- <a class="htc__btn" href="cart.html">shop now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
        <section class="htc__new__product bg__white pt--130">
            <div class="container">
                <div class="new__product__wrap clearfix">
                    <div class="row">

                    </div>
                </div>
            </div>
        </section>

        <!-- Start Our Product Area -->
        <section class="htc__product__area ptb--130 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-categories-all">

                            <div class="product-categories-title">
                                <h3>Horticulture & Farm Products</h3>
                            </div>
                            <div class="product-categories-menu">
                                <ul>
                                    <?php view_categories_index() ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style nav" role="tablist">
                                    <li>
                                        <a class="active" href="#home1" data-bs-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>latest </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home2" data-bs-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>best sale </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home3" data-bs-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>top rated</h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home4" data-bs-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>on sale</h4>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="product-slider-active owl-carousel">
                                        <?php  user_products_view_index() ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home2">
                                    <div class="product-slider-active owl-carousel">
                                        <!-- change to best sale -->
                                        <?php  user_products_view_index() ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home3">
                                    <div class="product-slider-active owl-carousel">
                                        <!-- change to best sale -->
                                        <?php  user_products_view_index() ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home4">
                                    <div class="product-slider-active owl-carousel">
                                        <!-- change to best sale -->
                                        <?php  user_products_view_index() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
<?php
    include("footer.php");
    include("product-quickview.php");
    include("scripts.php");
?>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->



</body>

</html>