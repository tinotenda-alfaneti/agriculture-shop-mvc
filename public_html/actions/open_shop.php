<?php
include("../controllers/customer_controller.php");
include_once("../settings/core.php");



if(isLoggedIn()){
    $id= $_SESSION['id'];
	if(openshop_ctr($bid, $brand_owner)==TRUE){
        $_SESSION['successnotif'] = "Shop Opened Successfully";
        $_SESSION["role"] = "1";
        header('Location:../view/admin_dash.php');
    }
    else{
        $_SESSION['successnotif'] = "Failed to open shop";
	    header('Location:../view/index.php');
    }

}
else{
	header('Location:../view/index.php');
}

?>