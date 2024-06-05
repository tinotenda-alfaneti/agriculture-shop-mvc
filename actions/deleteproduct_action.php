<?php
include("../controllers/product_controller.php");



if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	if(deleteproduct_ctr($pid)==TRUE){
        $_SESSION['successnotif'] = "Product deleted successfully";
        header('Location:../view/admin_dash.php#allproducts');
    }
    else{
	    header('Location:../view/admin_dash.php#allproducts');
    }

}
else{
	header('Location:../view/index.php');
}

?>