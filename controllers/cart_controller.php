<?php
//connect to the user account class
require_once dirname(__DIR__)."/classes/cart_model.php";


//--Add to cart--//
function add_to_cart_ctr($id,$ip,$cid,$quantity){
	$addcart=new cart_model();
	return $addcart->add_to_cart($id,$ip,$cid,$quantity);
}

//--UPDATE--//
function updatequantity_ctr($cid,$pid,$quantity){
	$updateqtycart=new cart_model();
	return $updateqtycart->updatequantity($cid,$pid,$quantity);
}

//--DELETE--//
function deletecart_ctr($cid){
	$delcart=new cart_model();
	return $delcart->deletecart($cid);
}
function deletecartitem_ctr($cid, $pid){
	$delcart=new cart_model();
	return $delcart->deletecartitem($cid, $pid);
}

function order_details_ctr($oid,$pid,$qty){
	$addorderdetails=new cart_model();
	return $addorderdetails->order_details($oid,$pid,$qty);
}

function create_order_ctr($cid,$invoice,$date,$status){
	$addorder=new cart_model();
	return $addorder->create_order($cid,$invoice,$date,$status);
}

function show_cart_ctr($cid,$ip){
	$showcart=new cart_model();
	return $showcart->show_cart($cid,$ip);
}

function reduce_quantity_ctr($id){
	$updateproduct=new cart_model();
	return $updateproduct->reduce_quantity($id);
}

function show_order_ctr($cid,$invoice){
	$seeorder=new cart_model();
	return $seeorder->show_order($cid,$invoice);
}

function save_payment_ctr($amount,$cid,$oid,$currency,$date){
	$savepayment=new cart_model();
	return $savepayment->save_payment($amount,$cid,$oid,$currency,$date);
}

function update_order_ctr($oid,$status){
	$updateorder=new cart_model();
	return $updateorder->update_order($oid,$status);
}

function get_order_ctr($invoice,$cid){
	$getorder=new cart_model();
	return $getorder->get_order($invoice,$cid);
}

?>