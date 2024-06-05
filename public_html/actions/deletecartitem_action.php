<?php
include_once("../controllers/cart_controller.php");
include_once("../settings/core.php");



if(isset($_GET['p_id'])){
	$cid=$_GET['c_id'];
	$pid=$_GET['p_id'];
	if(deletecartitem_ctr($cid,$pid)==TRUE){
        header('Location:../view/cart.php');
    }
    else{
	    header('Location:../view/cart.php');
    }

}
else{
	header('Location:../view/index.php');
}

?>