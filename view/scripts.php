<?php
include_once("../settings/core.php");

?>
    <!-- jquery latest version -->
    <script src="../js/vendor/jquery-v1.12.4.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="../js/plugins.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="../js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="../js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    modal.querySelector('#add_cart a').href = "../actions/addcart_action.php?pid=" + product.product_id + "?&quantity=1";
    
}
    </script>

<script>
    document.getElementById('checkoutLink').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        document.getElementById('checkoutForm').submit(); // Submit the form
    });
</script>
