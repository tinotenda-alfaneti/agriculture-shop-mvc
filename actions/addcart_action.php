<?php
include_once("../controllers/cart_controller.php");
include_once("../settings/core.php");

if (!isLoggedIn()) {
    $_SESSION['error'] = 'Please Log in to add to cart';
    header("Location: ../view/login-register.php");
}

 $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    if(isset($_GET['pid'])){
	$pid=$_GET['pid'];
	$quantity=$_GET['quantity'];

	if(add_to_cart_ctr($pid,$ip,$_SESSION['id'],$quantity)==TRUE){
            $_SESSION['successnotif'] = "Cart item added successfully";
			header('Location:../view/cart.php');
		}
}

?>