<?php
include_once("admin_header.php");


// Assuming $brand_name contains the existing brand name fetched from the database
$brand_name = ""; // Initialize the variable to avoid undefined variable error
$brand_id = "";
if(isset($_GET['brand_id'])) {
    $brand_id = $_GET['brand_id'];
    $brand_name = $_GET['brand_name']; // Assuming the column name in the database is brand_name
}
?>

<body>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <h2 class="tm-block-title">Edit Brand</h2>
                    <div class="tm-edit-product-row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mx-auto">
                            <form action="../actions/editbrand_action.php" class="tm-edit-product-form" method="POST">
                                <div class="form-group">
                                    <label for="name">Brand Name</label>
                                    <!-- Prefill the input field with existing brand name -->
                                    <input id="name" name="bname" type="text" class="form-control validate" value="<?php echo htmlspecialchars($brand_name); ?>" required />
                                </div>
                                <div class="form-group">
                                    <!-- Pass brand_id as a hidden field for identification during update -->
                                    <input type="hidden" name="bid" value="<?php echo htmlspecialchars($brand_id); ?>">
                                    <button type="submit" name="update" class="btn btn-primary btn-block text-uppercase">Update Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>
    <?php include("scripts.php"); ?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../jquery-ui-datepicker/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("#expire_date").datepicker();
        });
    </script>
</body>

</html>
