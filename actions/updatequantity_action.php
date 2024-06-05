<?php
include("../controllers/cart_controller.php");

if(isset($_POST['quantity'])){
	$qty=$_POST['quantity'];
	$pid=$_POST['pid'];
    $cid=$_POST['cid'];
	if(updatequantity_ctr($cid,$pid,$qty)==TRUE){
			header('Location:../view/cart.php');
		}

}

?>