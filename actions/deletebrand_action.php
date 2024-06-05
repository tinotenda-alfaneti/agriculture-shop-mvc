<?php
include("../controllers/product_controller.php");
include_once("../settings/core.php");



if(isset($_POST['bid'])){
	$bid=$_POST['bid'];
    $brand_owner = $_SESSION['id'];
	if(deletebrand_ctr($bid, $brand_owner)==TRUE){
        $_SESSION['successnotif'] = "Brand deleted successfully";
        header('Location:../view/admin_dash.php');
    }
    else{
        $_SESSION['successnotif'] = "Failed to delete brand";
	    header('Location:../view/admin_dash.php');
    }

}
else{
	header('Location:../view/admin_dash.php');
}

?>