<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    include_once("header.php");
    include_once("../settings/core.php");

    if (!isLoggedIn()) {
        $_SESSION['error'] = 'Please Log in to access cart';
        header("Location: login-register.php");
    }
    $id = "";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Cart</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                    <?php show_cart_full($_SESSION['id']) ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->


        <?php     
        include("footer.php");
        include("product-quickview.php");
        include("scripts.php"); 
        ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('quantity').addEventListener("focusout", function() {
            document.getElementById('cart0').submit();
        });
    });
</script>
<script>
    document.getElementById('checkoutLinkCart').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior
        document.getElementById('checkoutFormCart').submit(); // Submit the form
    });
</script>

        

</body>

</html>