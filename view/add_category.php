<?php 

include("admin_header.php");
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
                    <h2 class="tm-block-title">Add Category</h2>
                    <div class="tm-edit-product-row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mx-auto">
                            <form action="../actions/addcategory_action.php" class="tm-edit-product-form" method="POST">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <input id="name" name="cname" type="text" class="form-control validate" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase">Save Category</button>
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
