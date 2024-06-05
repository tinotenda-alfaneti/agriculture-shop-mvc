<?php
//connect to database class
require dirname(__DIR__)."/settings/db_class.php";

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class product_model extends db_connection
{
	//--INSERT--//
	public function add_brand($brand_name, $brand_owner)
	{
		$sql="INSERT INTO `brands`(`brand_name`, `brand_owner`) VALUES ('$brand_name',  '$brand_owner')";
		return $this->db_query($sql);
	}

	//--UPDATE--//
	public function update_brand($id, $brand_name, $brand_owner)
	{
		$sql="UPDATE `brands` SET `brand_name`='$brand_name' WHERE `brand_id`='$id' AND `brand_owner`='$brand_owner'";
		return $this->db_query($sql);
	}

	//--DELETE--//
	public function delete_brand($id, $brand_owner)
	{
		$sql="DELETE FROM `brands` WHERE `brand_id`='$id' AND `brand_owner`='$brand_owner'";
		return $this->db_query($sql);
	}

	public function get_all_brands($brand_owner)
	{
		$sql="SELECT * FROM `brands` WHERE `brand_owner`='$brand_owner'";
		return $this->db_fetch_all($sql);
	}


	public function add_category($cat_name)
	{
		$sql="INSERT INTO `categories`(`cat_name`) VALUES ('$cat_name')";
		return $this->db_query($sql);
	}

	//--UPDATE--//
	public function update_category($id, $cat_name)
	{
		$sql="UPDATE `categories` SET `cat_name`='$cat_name' WHERE `cat_id`='$id'";
		return $this->db_query($sql);
	}

	//--DELETE--//
	public function delete_category($id)
	{
		$sql="DELETE FROM `categories` WHERE `cat_id`='$id'";
		return $this->db_query($sql);
	}

	public function get_all_categories()
	{
		$sql="SELECT * FROM `categories`";
		return $this->db_fetch_all($sql);
	}

	public function get_products_by_price($minprice, $maxprice)
	{
		$sql = "SELECT * FROM `products` WHERE `product_price` BETWEEN '$minprice' AND '$maxprice'";
		return $this->db_fetch_all($sql);
	}

	public function add_product($cid,$bid,$title,$price,$quantity,$image,$keywords,$description)
	{
		$sql="INSERT INTO `products`( `product_cat`, `product_brand`, `product_title`, `product_price`, `product_quantity`,`product_desc`, `product_image`, `product_keywords`) VALUES ('$cid','$bid','$title','$price','$quantity','$description','$image','$keywords')";
		return $this->db_query($sql);
	}

	public function select_allproducts()
	{
		$sql="SELECT * FROM `products`";
		return $this->db_fetch_all($sql);
	}

	public function select_oneproduct($id)
	{
		$sql="SELECT * FROM `products` WHERE `product_id`='$id'";
		return $this->db_fetch_one($sql);
	}

	public function delete_product($id)
	{
		$sql="DELETE FROM `products` WHERE `product_id`=$id";
		return $this->db_query($sql);
	}

	public function update_product($cid,$bid,$title,$price,$quantity,$keywords,$description,$id)
	{
		$sql="UPDATE `products` SET  `product_quantity`='$quantity',`product_cat`='$cid',`product_brand`='$bid',`product_title`='$title',`product_price`='$price',`product_desc`='$description',`product_keywords`='$keywords' WHERE `product_id`='$id'";
		
		return $this->db_query($sql);
	}

	public function search_products($input)
	{
		$sql="SELECT * FROM `products` WHERE `product_title` LIKE '%$input%'";
		return $this->db_fetch_all($sql);
	}

	public function select_onebrand($id, $brand_owner)
	{
		$sql="SELECT * FROM `brands` WHERE `brand_id`='$id' AND `brand_owner`='$brand_owner'";
		return $this->db_fetch_one($sql);
	}

	public function get_brand($id)
	{
		$sql="SELECT * FROM `brands` WHERE `brand_id`='$id'";
		return $this->db_fetch_one($sql);
	}
	
	public function select_onecategory($id)
	{
		$sql="SELECT * FROM `categories` where `cat_id`='$id'";
		return $this->db_fetch_one($sql);
	}

	public function show_cart($cid,$ip)
	{
		$sql="SELECT * from `cart` where `c_id`='$cid' ";
		return $this->db_fetch_all($sql);
	}
	public function view_order($oid)
	{
		
		$sql="SELECT CONCAT(c.customer_fname, ' ', c.customer_lname) AS customer_name, c.customer_email, c.customer_contact, b.brand_name, c.customer_city, c.customer_country, (SELECT CONCAT(customer_fname, ' ', customer_lname) FROM customer WHERE customer_id = b.brand_owner) AS brand_owner_name, od.qty, p.product_title, p.product_desc, py.amt, py.payment_date, o.invoice_no, o.order_id FROM orders o JOIN orderdetails od ON o.order_id = od.order_id JOIN payment py ON o.order_id = py.order_id JOIN products p ON od.product_id = p.product_id JOIN brands b ON p.product_brand = b.brand_id JOIN customer c ON o.customer_id = c.customer_id WHERE o.order_id='$oid';";
		return $this->db_fetch_all($sql);
	}

	public function purchases_brand_owner($brand_owner) 
	{
		$sql = "SELECT CONCAT(c.customer_fname, ' ', c.customer_lname) AS customer_name, c.customer_email, c.customer_contact, b.brand_name, c.customer_city, c.customer_country, od.qty, p.product_title, p.product_desc, py.amt, py.payment_date, o.order_status, o.invoice_no, o.order_id FROM orders o JOIN orderdetails od ON o.order_id = od.order_id JOIN payment py ON o.order_id = py.order_id JOIN products p ON od.product_id = p.product_id JOIN brands b ON p.product_brand = b.brand_id JOIN customer c ON o.customer_id = c.customer_id WHERE b.brand_owner IN (SELECT brand_id FROM brands WHERE brand_owner = '$brand_owner') ORDER BY py.payment_date DESC;";
		return $this->db_fetch_all($sql);
	}


	
}

?>