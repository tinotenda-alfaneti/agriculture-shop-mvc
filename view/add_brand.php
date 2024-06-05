
<?php 

    include_once("admin_header.php");
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
                    <h2 class="tm-block-title">Add Brand</h2>
                    <div class="tm-edit-product-row">
                        <div class="col-xl-8 col-lg-8 col-md-12 mx-auto">
                            <form action="../actions/addbrand_action.php" class="tm-edit-product-form" method="POST">
                                <div class="form-group">
                                    <label for="name">Brand Name</label>
                                    <input id="name" name="bname" type="text" class="form-control validate" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="save" class="btn btn-primary btn-block text-uppercase">Save Brand Name</button>
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

</body>

</html>
