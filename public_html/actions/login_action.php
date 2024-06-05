<?php

include("../controllers/customer_controller.php");


$email=$_POST['username'];
$unencryptpass=$_POST['password'];


if(isset($_POST['login'])){
    
	if(verify_customer_ctr($email)!=false){

		$result=verify_customer_ctr($email);

		$encryptpass= $result['customer_pass'];

	    if(password_verify($unencryptpass, $encryptpass)){
			session_start();
			$_SESSION['id'] = $result['customer_id'];
			$_SESSION['name'] = $result['customer_fname']." ".$result['customer_lname'];
			$_SESSION['email'] = $result['customer_email'];
			$_SESSION['role'] = $result['user_role'];
			header('Location:../view/index.php');
		}
		else{
			session_start();
			$_SESSION['error'] = 'Invalid login details!';		
			header('Location:../view/login-register.php');
		}		
	}
	else{
		session_start();
		$_SESSION['error'] = 'Invalid login details!';		
		header('Location:../view/login-register.php');
	}	
}


else {
	
	header('Location:../view/login-register.php');
}
?>