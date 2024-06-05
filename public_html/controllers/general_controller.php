<?php
//connect to the user account class
// include("../classes/general_class.php");
include dirname(__DIR__).'/classes/general_class.php';

//sanitize data

function add_customer_ctr($a,$b,$c){
	$adduser=new general_class();
	return $adduser->insert_customer($a,$b,$c);
}

function get_all_customers() {
	$getall = new general_class();
	return $getall->get_all_customers();
}

//--INSERT--//

//--SELECT--//

//--UPDATE--//

//--DELETE--//

?>