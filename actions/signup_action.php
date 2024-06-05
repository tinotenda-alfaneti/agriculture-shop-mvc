<?php
//making action  aware of controller
require("../controllers/customer_controller.php");
session_start();


if(isset($_POST['register'])){
	$cust_fname=$_POST['customerfname'];
	$cust_lname=$_POST['customerlname'];
	$cust_email=filter_var($_POST['customeremail'], FILTER_SANITIZE_EMAIL);
	$cust_country=$_POST['customercountry'];
	$cust_city=$_POST['customercity'];
    $cust_contact=$_POST['customercontact'];
    $unencryptpass=$_POST['password'];
    $confirmpass=$_POST['confirmpassword'];
	$img = $_FILES['customerimage'];
    $password=password_hash($unencryptpass, PASSWORD_DEFAULT); 
    $role=2;

	$passwordRegex = '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/';     

	$isPassValid = preg_match($passwordRegex, $unencryptpass);

	//image upload
	$output_dir = "../images/profiles/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['customerimage']['name']));
	$ImageType      = $_FILES['customerimage']['type'];
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt=str_replace('.','',$ImageExt);
	$ImageName=preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $cust_fname.'-'.$ImageName.'-'.$RandomNum.'.'.$ImageExt;
	$ret[$NewImageName]= $output_dir.$NewImageName;
	

	move_uploaded_file($_FILES["customerimage"]["tmp_name"],$output_dir."/".$NewImageName );
	
	if (!$isPassValid) {
		$_SESSION['error'] = 'Enter a valid password';		
		header('Location:../view/login-register.php');
	}

	if ( $unencryptpass===$confirmpass) {
		if (verify_customer_ctr($cust_email)==TRUE){
			
			$_SESSION['error'] = 'User Already Exists!';		
			header('Location:../view/login-register.php');
		}	
		else 

		if(add_customer_ctr($cust_fname,$cust_lname,$cust_email,$cust_country,$cust_city,$cust_contact,$password,$role,$NewImageName)===TRUE){
			$_SESSION['registered'] = 'Yes';
			$_SESSION['error'] = 'Registration Successful, Please Login';
			header('Location:../view/login-register.php');
		}
		
	}
	else{
		
		$_SESSION['error'] = 'Unable to register user!';		
		header('Location:../view/login-register.php');
	}
}
else {
	
	header('Location:../view/login-register.php');
}
?>