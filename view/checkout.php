<?php 
include_once("header.php");
include_once("../settings/core.php");
include_once("../controllers/customer_controller.php");

if (!isLoggedIn()) {
    $_SESSION['error'] = 'Please Log in to checkout';
    header("Location: login-register.php");
}
$amount = $_POST["amount"];
$customer = get_customer_ctr($_SESSION["id"]);
?>

<style>


    /* CSS */
.paystackbtn {
  display: flex;
  align-items: center;
  font-family: inherit;
  font-weight: 500;
  font-size: 16px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: #ad5389;
  background: linear-gradient(0deg, rgba(20,167,62,1) 0%, rgba(102,247,113,1) 100%);
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.paystackbtn:hover {
  box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
}

.paystackbtn:active {
  box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}

</style>

        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Billing details</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" value="<?= $customer["customer_fname"]; ?>" placeholder="First Name*">
                                        <input type="text" value="<?= $customer["customer_lname"]; ?>"  placeholder="Last Name*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" value="<?= $customer["customer_email"]; ?>"  placeholder="Emil*">
                                        <input type="text" value="<?= $customer["customer_contact"]; ?>"  placeholder="Phone*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Message*"></textarea>
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                        <select>
                                            <option>Country*</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                            <option>Bangladesh</option>
                                        </select>
                                        <input type="text" placeholder="Company Name*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" value="<?= $customer["customer_email"]; ?>" placeholder="State*">
                                        <input type="text" placeholder="Zip Code*">
                                    </div>
                                    <div class="single-checkout-box checkbox">
                                        <input id="remind-me" type="checkbox">
                                        <label for="remind-me"><span></span>Create a Account ?</label>
                                    </div>
                                </div>
                            </div>
                            <!-- End Checkbox Area -->

                            <!-- Start Payment Way -->
                            <div class="our-payment-sestem">
                                <h2 class="section-title-3">We  Accept :</h2>
                                <ul class="payment-menu">
                                    <li><a href="#"><img src="../images/payment/1.jpg" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="../images/payment/2.jpg" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="../images/payment/3.jpg" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="../images/payment/4.jpg" alt="payment-img"></a></li>
                                    <li><a href="#"><img src="../images/payment/5.jpg" alt="payment-img"></a></li>
                                </ul>
                                <div class="checkout-btn">
                                <button class="paystackbtn" role="button" onclick="payWithPaystack()">Pay With PayStack</button>
                                <!-- <button class="ts-btn btn-light btn-large hover-theme" type="submit" onclick="payWithPaystack()">CONFIRM & BUY NOW</button> -->
                                </div>    
                            </div>
                            <!-- End Payment Way -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                        <div class="checkout-right-sidebar">
                            <div class="our-important-note">
                                <h2 class="section-title-3">Note :</h2>
                                <p class="note-desc">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut laborekf et dolore magna aliqua.</p>
                                <ul class="important-note">
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                                </ul>
                            </div>
                            <div class="puick-contact-area mt--60">
                                <h2 class="section-title-3">Quick Contract</h2>
                                <a href="phone:+8801722889963">+233209246449</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Checkout Area -->

        <?php
            include("footer.php");
            include("product-quickview.php");
            include("scripts.php"); 
        ?>

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
    function payWithPaystack() {

        var handler = PaystackPop.setup({
            key: 'pk_test_df2577fd887e6aa517495ed81c48b7fd80505b0b', // Replace with your public key
            
            email: "<?= $customer['customer_email']; ?>",
            amount:  <?= floatVal($amount); ?> * 100,
            currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
            ref: '' + Math.floor(Math.random() * 1000000 + 1), // Replace with a reference you generated
            metadata: {
                custom_fields: [
                {
                    display_name: "<?= $customer['customer_fname']; ?>",
                    variable_name: "mobile_number",
                    value: "<?= $customer['customer_contact']; ?>"
                }
                ]
            },
            callback: function(response) {
                var reference = response.reference;
                // Prepare data to send via POST
                var postData = {
                    reference: reference,
                    amnt: <?= floatVal($amount); ?> // Assuming $amount is a PHP variable
                };

                // Create a form dynamically
                var form = document.createElement('form');
                form.method = 'post';
                form.action = '../actions/verify_payment.php';

                // Add hidden input fields for each key-value pair in postData
                for (var key in postData) {
                    if (postData.hasOwnProperty(key)) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = key;
                        input.value = postData[key];
                        form.appendChild(input);
                    }
                }

                // Append the form to the body and submit it
                document.body.appendChild(form);
                form.submit();
            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            },
    });
    handler.openIframe();

    }
</script>



</body>


</html>