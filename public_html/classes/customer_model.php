<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class customer_model extends db_connection
{
	//--INSERT--//
	public function add_customer($cust_fname,$cust_lname,$cust_email,$cust_country,$cust_city,$cust_contact,$password,$role,$cust_image)
	{
		$sql="INSERT INTO `customer`(`customer_fname`,`customer_lname`,`customer_email`,`customer_country`,`customer_city`, `customer_contact`, `customer_pass`, `user_role`, `customer_image`) VALUES ('$cust_fname','$cust_lname','$cust_email','$cust_country','$cust_city','$cust_contact','$password','$role', '$cust_image')";
		return $this->db_query($sql);
	}

	public function verify_customer($email)
	{
		$sql="SELECT * FROM `customer` WHERE `customer_email`='$email' ";
		return $this->db_fetch_one($sql);
	}

	//--UPDATE--//
	public function update_customer($id,$fname,$lname,$email,$country,$city,$contact,$password,$img)
	{
		$sql="UPDATE `customer` SET `customer_fname`='$fname',`customer_lname`='$lname',`customer_pass`='$password',`customer_country`='$country',`customer_city`='$city',`customer_contact`='$contact', `customer_image`='$img' WHERE `customer_id`='$id'";
		return $this->db_query($sql);
	}

	public function openshop($id)
	{
		$sql="UPDATE `customer` SET `user_role`='1'";
		return $this->db_query($sql);
	}

	//--DELETE--//
	public function delete_customer($id)
	{
		$sql="DELETE FROM `customer` WHERE `pid`='$id'";
		return $this->db_query($sql);
	}

	public function get_customer($id) 
	{
		$sql="SELECT * FROM `customer` WHERE `customer_id`='$id' ";
		return $this->db_fetch_one($sql);
	}

	public function get_customers() 
	{
		$sql="SELECT * FROM `customer`";
		return $this->db_fetch_all($sql);
	}
	
}

?>