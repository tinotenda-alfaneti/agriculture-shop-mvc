<?php
include("../controllers/product_controller.php");
include_once("../settings/core.php");



if(isset($_POST['cid'])){
	$cid=$_POST['cid'];
	if(deletecategory_ctr($cid)==TRUE){
        $_SESSION['successnotif'] = "Category deleted successfully";
        header('Location:../view/admin_dash.php');
    }
    else{
        $_SESSION['successnotif'] = "Failed to delete category";
	    header('Location:../view/admin_dash.php');
    }

}
else{
	header('Location:../view/admin.php');
}

?>