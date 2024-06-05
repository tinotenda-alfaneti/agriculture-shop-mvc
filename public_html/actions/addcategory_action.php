<?php
include("../controllers/product_controller.php");



if(isset($_POST['save'])){
	$cname=$_POST['cname'];
	if(add_category_ctr($cname)==TRUE){
		$_SESSION['successnotif'] = "Category updated successfully";
			header('Location: ../view/admin_dash.php');
		}

}




?>