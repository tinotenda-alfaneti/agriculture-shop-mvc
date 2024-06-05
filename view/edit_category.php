<?php
include_once("admin_header.php");

// Assuming $brand_name contains the existing brand name fetched from the database
$cat_name = ""; // Initialize the variable to avoid undefined variable error
$cat_id = "";
if(isset($_GET['category_id'])) {
    $cat_id = $_GET['category_id'];
    $cat_name = $_GET['category_name']; // Assuming the column name in the database is brand_name
}
?>

<body>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-12 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <h2 class="tm-block-title">Edit Category</h2>
                    <div class="tm-edit-product-row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mx-auto">
                            <form action="../actions/editcategory_action.php" class="tm-edit-product-form" method="POST">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <!-- Prefill the input field with existing brand name -->
                                    <input id="name" name="cname" type="text" class="form-control validate" value="<?php echo htmlspecialchars($cat_name); ?>" required />
                                </div>
                                <div class="form-group">
                                    <!-- Pass brand_id as a hidden field for identification during update -->
                                    <input type="hidden" name="cid" value="<?php echo htmlspecialchars($cat_id); ?>">
                                    <button type="submit" name="update" class="btn btn-primary btn-block text-uppercase">Update Category</button>
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
