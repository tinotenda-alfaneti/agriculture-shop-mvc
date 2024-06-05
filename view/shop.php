<?php
    include_once("header.php");
    include_once("../functions/productview.php");
    include_once("../settings/core.php");
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Shop</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our ShopSide Area -->
        <section class="htc__shop__sidebar bg__white ptb--120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-xl-9 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                                <div class="producy__view__container">
                                    <!-- Start Short Form -->
                                    <div class="product__list__option">
                                        <div class="order-single-btn">
                                            <select class="select-color selectpicker">
                                              <option>Sort by newness</option>
                                              <option>Match</option>
                                              <option>Updated</option>
                                              <option>Title</option>
                                              <option>Category</option>
                                              <option>Rating</option>
                                            </select>
                                        </div>
                                        <div class="shp__pro__show">
                                            <span>Showing 1 - 4 of 25 results</span>
                                        </div>
                                    </div>
                                    <!-- End Short Form -->
                                    <!-- Start List And Grid View -->
                                    <ul class="view__mode nav" role="tablist">
                                        <li role="presentation" class="grid-view "><a class="active" href="#grid-view" role="tab" data-bs-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                        <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-bs-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                    </ul>
                                    <!-- End List And Grid View -->
                                </div>
                            </div>
                        </div>
                        <div class="shop__grid__view__wrap another-product-style">
                            <!-- Start Single View -->
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade show active clearfix">
                                <div id="searchResults" class="row">
                                   <?php user_grid_view_products(); ?>

                                </div>
                            </div>
                            <!-- End Single View -->
                            <!-- Start Single View -->
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <!-- Start List Content-->
 
                                <?php user_list_view_products(); ?>

                                <!-- End List Content-->
                                <!-- Start List Content-->
                                
                            </div>
                            <!-- End Single View -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3 col-md-12 col-12">
                        <div class="htc__shop__left__sidebar mrg-xs">
                            <!-- Start Range -->
                            <div class="htc-grid-range">
                                <h4 class="section-title-4">FILTER BY PRICE</h4>
                                <div class="content-shopby">
                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">
                                                    <div class="price--output">
                                                        <span>Price :</span><input type="text" id="amount" readonly>
                                                    </div>
                                                    <div class="price--filter">
                                                        <a href="#">Filter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Range -->
                            <!-- Start Product Cat -->
                            <div class="htc__shop__cat">
                                <h4 class="section-title-4">PRODUCT CATEGORIES</h4>
                                <ul class="sidebar__list">

                                    <?php view_categories_shop(); ?>
                                    
                                </ul>
                            </div>
                            <!-- End Product Cat -->
                            <!-- Start Tag Area -->
                            <div class="htc__shop__cat htc__shop__cat-none">
                                <h4 class="section-title-4">Tags</h4>
                                <ul class="htc__tags">
                                    <li><a href="#">All</a></li>
                                    <li><a href="#">Seeds</a></li>
                                    <li><a href="#">Fertilizers</a></li>
                                    <li><a href="#">Pesticides</a></li>
                                    <li><a href="#">Farm Tools</a></li>
                                    <li><a href="#">Livestock</a></li>
                                    <li><a href="#">Irrigation</a></li>
                                    <li><a href="#">Organic</a></li>
                                    <li><a href="#">Agrochemicals</a></li>
                                </ul>
                            </div>
                            <!-- End Tag Area -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our ShopSide Area -->
       <?php
            include("footer.php");
            include("product-quickview.php");
            include("scripts.php");
       ?>
    <!-- Include jQuery and jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(document).ready(function() {
        // Initialize the slider
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 1000, // Change the max value to match your maximum price
            values: [0, 1000], // Initial range, change as needed
            slide: function(event, ui) {
                $("#amount").val("GHs" + ui.values[0] + " - GHs" + ui.values[1]);
                filterProducts(ui.values[0], ui.values[1]);
            }
        });

        // Set initial value on page load
        $("#amount").val("GHs" + $("#slider-range").slider("values", 0) +
            " - GHs" + $("#slider-range").slider("values", 1));
    });

    function filterProducts(minPrice, maxPrice) {
        $.ajax({
            url: '../functions/filter_products.php', // Replace 'filter_products.php' with the URL of your filtering script
            type: 'POST',
            data: { minPrice: minPrice, maxPrice: maxPrice },
            success: function(response) {
                $('#grid-view').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
    </script>
    <script>
        function filterProductsByCategory(categoryId) {
            var products = document.querySelectorAll('.tm-product');
            products.forEach(function(product) {
                if (product.dataset.categoryId === categoryId || categoryId === 'all') {
                    product.style.display = ''; // Show products belonging to the selected category or show all products if 'all' is selected
                } else {
                    product.style.display = 'none'; // Hide products not belonging to the selected category
                }
            });
        }

        // Add event listeners to category links
        document.querySelectorAll('.sidebar__list a').forEach(function(categoryLink) {
            categoryLink.addEventListener('click', function(event) {
                event.preventDefault(); 
                var categoryId = this.dataset.categoryId;

                filterProductsByCategory(categoryId);
            });
        });
    </script>


</body>
</html>