<?php
include("../controllers/product_controller.php");
include_once("../settings/core.php");


if(isset($_POST['update'])){
	$bname=$_POST['bname'];
	$sellerid = $_SESSION['id'];
	$bid=$_POST['bid'];
	if(update_brand_ctr($bid, $bname, $sellerid)==TRUE){
			$_SESSION['successnotif'] = "Brand updated successfully";
			header('Location:../view/admin_dash.php');
		}

}
?>