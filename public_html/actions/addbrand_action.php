<?php
include_once("../controllers/product_controller.php");
include_once("../settings/core.php");



if(isset($_POST['save'])){
	$bname=$_POST['bname'];
	$sellerid = $_SESSION['id'];
	if(add_brand_ctr($bname, $sellerid)==TRUE){
			header('Location: ../view/admin_dash.php');
		}

}

?>