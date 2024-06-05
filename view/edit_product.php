<?php


    include_once("admin_header.php");
    include_once("../functions/brandsview.php");
    include_once("../controllers/product_controller.php");

    // Assuming you have retrieved product details from the database
    $product_id = $_GET['product_id']; // Get the product ID from the URL
    // Retrieve product details based on the product ID
    $product_details = select_oneproduct_ctr($product_id); // Replace this with your actual function

?>

<body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="../actions/editproduct_action.php" method="POST" class="tm-edit-product-form">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Title
                    </label>
                    <input
                      id="name"
                      name="title"
                      type="text"
                      class="form-control validate"
                      value= "<?php echo htmlspecialchars($product_details["product_title"]); ?>"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="3"
                      name="description"
                      required
                    > <?php echo htmlspecialchars($product_details["product_desc"]);?> </textarea>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                      for="category"
                      >Brand</label
                    >

                    <?php $brand = $product_details['product_brand']; select_drop_Brands($brand);?>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                        <label
                      for="category"
                      >Category</label
                    >
                    <?php $cat = $product_details['product_cat']; select_drop_Categories($cat);?>
                        </div>
                  </div>
                  <div class="form-group mb-3">
                  <label
                      for="keywords"
                      >Keywords</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="2"
                      name="keywords"
                      required
                    > <?php echo htmlspecialchars($product_details["product_keywords"]); ?></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="price"
                      >Price</label
                    >
                    <input
                      id="price"
                      name="price"
                      type="number"
                      step="0.01"
                      class="form-control validate"
                      value= "<?php echo htmlspecialchars($product_details["product_price"]); ?>"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="quantity"
                      >Quantity</label
                    >
                    <input
                      id="qty"
                      name="qty"
                      type="number"
                      step="1"
                      class="form-control validate"
                      value= "<?php echo htmlspecialchars($product_details["product_quantity"]); ?>"
                      required
                    />
                  </div>
                  <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product_id); ?>">
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <div style="width: 490px; height: 400px">
                                <img style="width: 100%; height: 100%; object-fit: fit;" src="../images/products/<?= $product_details["product_image"]?>" alt="product images">
                            </div>
                </div>

              </div>
              <div class="col-12">
                <button type="submit" name="update" class="btn btn-primary btn-block text-uppercase">Update Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
    include("footer.php");
    include("scripts.php");
?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="../jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
