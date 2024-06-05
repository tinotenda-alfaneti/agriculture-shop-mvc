<?php
include("../controllers/product_controller.php");
include_once("../settings/core.php");


if(isset($_POST['update'])){
	$cname=$_POST['cname'];
$cid=$_POST['cid'];
	if(update_category_ctr($cid, $cname)==TRUE){
			$_SESSION['successnotif'] = "Category updated successfully";
			header('Location:../view/admin_dash.php');
		}

}
?>