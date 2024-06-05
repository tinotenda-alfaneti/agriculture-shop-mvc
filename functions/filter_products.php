<?php
// Include necessary files (e.g., database connection and product model)
include_once dirname(__DIR__)."../controllers/product_controller.php";

// Check if the minPrice and maxPrice parameters are set
if(isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
    // Get the minimum and maximum prices from the POST parameters
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    
    // Call the method to fetch products within the price range
    $filteredProducts = get_products_by_price_ctr($minPrice, $maxPrice); // Replace with your method to fetch products by price range

    // Check if there are any filtered products
    if ($filteredProducts) {
        $count = 0; // Initialize a counter
    
        foreach ($filteredProducts as $product) {
            if ($count % 3 == 0) {
                echo '<div class="row">'; // Start a new row after every third product
            }
    
            ?>
            <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 tm-product" data-category-Id="<?= $product['product_cat'] ?>" data-product-id="<?= $product['product_id'] ?>">
                <div class="product">
                    <div class="product__inner">
                        <div class="pro__thumb">
                            <a href="#">
                                <div style="width: 250px; height: 250px">
                                    <img style="width: 100%; height: 100%; object-fit: cover;" src="../images/products/<?= $product["product_image"] ?>" alt="product images">
                                </div>
                            </a>
                        </div>
                        <div class="product__hover__info">
                            <ul class="product__action">
                                <li><a data-bs-toggle="modal" data-product-id="<?= $product['product_id'] ?>" data-bs-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                <li><a title="Add To Cart" href="../actions/addcart_action.php?pid=<?= $product['product_id'] ?>&quantity=1"><span class="ti-shopping-cart"></span></a></li>
                                <li><a title="Wishlist" href="404.html"><span class="ti-heart"></span></a></li>
                            </ul>
                        </div>
                        <!-- Quantity Circle -->
                        <div class="quantity-circle"><?= $product['product_quantity'] ?></div>
                    </div>
                    <div class="product__details">
                        <h2><a href="404.html"><?= $product['product_title'] ?></a></h2>
                        <ul class="product__price">
                            <li class="old__price"><?= $product['product_price'] ?></li>
                            <li class="new__price"><?= $product['product_price'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
    
            $count++; // Increment the counter
    
            if ($count % 3 == 0 || $count == count($filteredProducts)) {
                echo '</div>'; // Close the row after every third product or when it's the last product
            }
        }
    } else {
        // Output a message if no products are found within the price range
        echo '<div class="row"><p>No products found within the selected price range.</p></div>';
    }
        
} else {
    // Output an error message if the minPrice and maxPrice parameters are not set
    echo '<div class="row"><p>Error: Missing price range parameters.</p></div>';
}
?>
