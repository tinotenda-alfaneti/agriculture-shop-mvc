

<?php
    include_once("header.php");
    include_once("../functions/productview.php");
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
                                <div class="row">
                                    
                                <?php 
                                   $query = $_POST["query"];
                                   user_search_products($query) ?>

                                </div>
                            </div>
                            <!-- End Single View -->
                            <!-- Start Single View -->
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <!-- Start List Content-->
 
                                <?php 
                                   $query = $_POST["query"];
                                   search_list_view_products($query); ?>

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

       <script>// Add event listener to product elements

       // Add click event listener to "Quick View" buttons
document.querySelectorAll('.quick-view').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        var productId = button.dataset.productId;
        // Send AJAX request to fetch product details
        fetchProductDetails(productId);
    });
});

// Function to fetch product details using AJAX
function fetchProductDetails(productId) {

    fetch('../functions/modal_view.php?product_id=' + productId)
        .then(function(response) {
            console.log(response);
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json(); // Parse response JSON
        })
        .then(function(product) {
            console.log('Product details:', product);
            // Populate modal with product data
            populateModal(product);
        })
        .catch(function(error) {
            console.error('Error fetching product details:', error.message);
            // Display error message or handle error condition
        });
}

// Function to populate modal with product data
function populateModal(product) {
    // Update modal content with product details
    var modal = document.getElementById('productModal');
    modal.querySelector('.main-image img').src = "../images/products/" + product.product_image;
    modal.querySelector('.product-info h1').textContent = product.product_title;
    modal.querySelector('.product-info p #brand').textContent = product.brand;
    modal.querySelector('.product-info p #category').textContent = product.category;
    modal.querySelector('.new-price').textContent = product.product_price;
    modal.querySelector('.old-price').textContent = product.product_price;
    modal.querySelector('.quick-desc').textContent = product.product_desc;
    modal.querySelector('.keywords p').textContent = product.product_keywords;
    
}
    </script>


</body>
</html>