<?php
    include("admin_header.php");
    include_once("../functions/brandsview.php");

    include_once("../settings/core.php");

    if (!isLoggedIn() && !isAdmin()){
      
        header("location: index.php"); // redirects to login page
            exit;
    }
?>

  <body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="../actions/addproduct_action.php" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
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
                    ></textarea>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                      <label
                      for="category"
                      >Brand</label
                    >
                    <?php select_drop_Brands(-1);?>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                        <label
                      for="category"
                      >Category</label
                    >
                    <?php select_drop_Categories(-1);?>
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
                    ></textarea>
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
                      required
                    />
                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input class="btn btn-primary btn-block mx-auto" id="formFileLg" type="file" placeholder="Product Image" name="image[]" 
                  required accept="image/*" >
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="add" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
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

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>
