<?php
require_once dirname(__DIR__)."/classes/product_model.php";

//--Insert Brand--//
function add_brand_ctr($name, $brand_owner){
	$addbrand=new product_model();
	return $addbrand->add_brand($name, $brand_owner);
}

function get_all_brands_ctr($brand_owner) {
	$getbrands = new product_model();
	return $getbrands->get_all_brands($brand_owner);
}


function add_category_ctr($name){
	$addcat=new product_model();
	return $addcat->add_category($name);
}

function get_all_categories_ctr() {
	$getcats = new product_model();
	return $getcats->get_all_categories();
}

//--Insert Product--//
function add_product_ctr($cid,$bid,$title,$price,$quantity,$image,$keywords,$description){
	$addproduct=new product_model();
	return $addproduct->add_product($cid,$bid,$title,$price,$quantity,$image,$keywords,$description);
}

//--Select Products--//
function select_allproducts_ctr(){
	$seeproducts=new product_model();
	return $seeproducts->select_allproducts();
}

function select_oneproduct_ctr($id){
	$oneproduct=new product_model();
	return $oneproduct->select_oneproduct($id);
}

function select_onebrand_ctr($id, $brand_owner){
	$onebrand=new product_model();
	return $onebrand->select_onebrand($id, $brand_owner);
}

function select_onecategory_ctr($id){
	$onecat=new product_model();
	return $onecat->select_onecategory($id);
}

function update_brand_ctr($id, $brand_name, $brand_owner) {
	$updatebrand = new product_model();
	return $updatebrand->update_brand($id, $brand_name, $brand_owner);

}

function update_category_ctr($id, $cat_name) {
	$updatecategory = new product_model();
	return $updatecategory->update_category($id, $cat_name);
}

function update_product_ctr($id,$cid,$bid,$title,$price,$quantity,$keywords,$description){
	$updateproduct=new product_model();
	return $updateproduct->update_product($cid,$bid,$title,$price,$quantity,$keywords,$description,$id);
}


function search_products_ctr($input){
	$searchproducts=new product_model();
	return $searchproducts->search_products($input);
}

function get_products_by_price_ctr($minprice, $maxprice) {
	$filterproducts=new product_model();
	return $filterproducts->get_products_by_price($minprice, $maxprice);
}

//--Show Cart--//
function show_cart_ctr($cid,$ip){
	$showcart=new product_model();
	return $showcart->show_cart($cid,$ip);
}

//--DELETE--//
function deleteproduct_ctr($pid){
	$delproduct=new product_model();
	return $delproduct->delete_product($pid);
}
function deletecategory_ctr($cid){
	$delcat=new product_model();
	return $delcat->delete_category($cid);
}
function deletebrand_ctr($bid, $brand_owner){
	$del=new product_model();
	return $del->delete_brand($bid, $brand_owner);
}

function view_order_ctr($oid){
	$vieworder=new product_model();
	return $vieworder->view_order($oid);
}

function purchases_brand_owner_ctr($brand_owner)
{
	$purchases=new product_model();
	return $purchases->purchases_brand_owner($brand_owner);
}



?>