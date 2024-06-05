<?php


require_once("../classes/customer_model.php");


//--Register--//
function add_customer_ctr($cust_fname,$cust_lname,$cust_email,$cust_country,$cust_city,$cust_contact,$password,$role,$cust_image){
	$addcustomer=new customer_model();
	return $addcustomer->add_customer($cust_fname,$cust_lname,$cust_email,$cust_country,$cust_city,$cust_contact,$password,$role,$cust_image);
}


function verify_customer_ctr($email){
	$verify=new customer_model();
	return $verify->verify_customer($email);
}

//--UPDATE--//
function update_customer_ctr($id,$fname,$lname,$email,$country,$city,$contact,$password,$cust_image)
{
	$update = new customer_model();
	return $update->update_customer($id,$fname,$lname,$email,$country,$city,$contact,$password,$cust_image);
}

function openshop_ctr($id) {
	$update = new customer_model();
	return $update->openshop($id);
}

//--DELETE--//
function delete_customer_ctr($id)
{
	$delete = new customer_model();
	return $delete->delete_customer($id);
}

function get_customer_ctr($id)
{
	$get = new customer_model();
	return $get->get_customer($id);

}

function get_customers_ctr()
{
	$get = new customer_model();
	return $get->get_customers();

}

?>