<?php
include_once("../controllers/product_controller.php");
include_once("../settings/core.php");




if(isset($_POST['update'])){

	$pid=$_POST['pid']; 
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$quantity=$_POST['qty'];

	if(update_product_ctr($pid,$cid,$bid,$title,$price,$quantity,$keywords,$description)==TRUE){
		$_SESSION['successnotif'] = "Product updated successfully";
        header('Location:../view/admin_dash.php#allproducts');
		}
		

}

?>