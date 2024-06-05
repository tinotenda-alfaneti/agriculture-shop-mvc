<?php
include_once("../controllers/product_controller.php");
include_once("../settings/core.php");



if(isset($_POST['add'])){
	$allowTypes = array('jpg','png','jpeg','gif'); 
	$bid=$_POST['bid'];
	$cid=$_POST['cid'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$keywords=$_POST['keywords'];
	$description=$_POST['description'];
	$quantity=$_POST['qty'];

	//image upload
	$output_dir = "../images/products/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt=str_replace('.','',$ImageExt);
	$ImageName=preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
	$ret[$NewImageName]= $output_dir.$NewImageName;
	

move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	if(add_product_ctr($cid,$bid,$title,$price,$quantity,$NewImageName,$keywords,$description)==TRUE){
		$_SESSION['successnotif'] = "Product added successfully";
		header('Location: ../view/admin_dash.php#allproducts');
	}
	else{
		$_SESSION["error"] = "Failed to save to database";
		header('Location: ../view/admin_dash.php#allproducts');
	}

}
else{
	header('Location: ../view/admin_dash.php#allproducts');
}

?>