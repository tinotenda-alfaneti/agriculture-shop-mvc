<?php
//connect to database class
require_once dirname(__DIR__)."/settings/db_class.php";

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class cart_model extends db_connection
{

	public function add_to_cart($id,$ip,$cid,$quantity)
	{
		$sql="INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) select '$id','$ip','$cid','$quantity' from dual WHERE NOT EXISTS(Select * from cart where `p_id`='$id' and `c_id`='$cid')";
		$this->db_query($sql);
		
		if (mysqli_affected_rows($this->db)==0){
			$sql1="UPDATE `cart` set `qty`=`qty`+'$quantity' where `p_id`='$id' and `c_id`='$cid'";
			return $this->db_query($sql1);
		} else{
			return $this->db_query($sql);
		}
		
	}

    public function reduce_quantity($id)
	{
		$sql="UPDATE `products` SET `product_quantity`=`product_quantity` - 1 WHERE `product_id`='$id'";
		
		return $this->db_query($sql);
	}

    public function deletecartitem($cid,$pid)
        {
            $sql="DELETE FROM `cart` WHERE `c_id`='$cid' and `p_id`='$pid'";
            return $this->db_query($sql);
        }
    public function updatequantity($cid,$pid,$quantity)
        {
            $sql="UPDATE `cart` SET `qty`='$quantity' WHERE `c_id`='$cid' and `p_id`='$pid'";
            return $this->db_query($sql);
        }
    public function deletecart($cid)
        {
            $sql="DELETE FROM `cart` WHERE `c_id`='$cid'";
            return $this->db_query($sql);
        }
    public function create_order($cid,$invoice,$date,$status)
        {
            $sql="INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$cid','$invoice','$date','$status')";
            return $this->db_query($sql);
        }
    public function show_cart($cid,$ip)
        {
            $sql="SELECT * from `cart` where `c_id`='$cid' ";
            return $this->db_fetch_all($sql);
        }
    public function show_order($cid,$invoice)
        {
            $sql="SELECT * from `orders` where `customer_id`='$cid' and `invoice_no`='$invoice' ";
            return $this->db_fetch_one($sql);
        }
    public function order_details($oid,$pid,$qty)
        {
            $sql="INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`) VALUES ('$oid','$pid','$qty')";
            return $this->db_query($sql);
        }
    public function get_order($invoice,$cid)
        {
            $sql="SELECT * from `orders` where `invoice_no`='$invoice'and `customer_id`='$cid' ";
            return $this->db_fetch_one($sql);
        }
    public function update_order($oid,$status)
        {
            $sql="UPDATE `orders` SET `order_status`='$status' WHERE `order_id`='$oid' ";
            return $this->db_query($sql);
        }

    public function save_payment($amount,$cid,$oid,$currency,$date)
        {
            $sql="INSERT INTO `payment`( `amt`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES ('$amount','$cid','$oid','$currency','$date') ";
            return $this->db_query($sql);
        }
	public function view_orders($cid)
        {
            $sql="SELECT * from `orders` where  `customer_id`='$cid' ORDER BY `order_date` DESC ";
            return $this->db_fetch_all($sql);
        }
    public function view_order($oid)
        {
            $sql="SELECT products.product_title,products.product_price,orderdetails.qty,orderdetails.product_id from products,orderdetails where orderdetails.order_id='$oid' and orderdetails.product_id= products.product_id";
            return $this->db_fetch_all($sql);
        }
	public function view_invoice($oid)
        {
            $sql="SELECT * from `orders` where  `order_id`='$oid' ";
            return $this->db_fetch_one($sql);
        }
    
        

        
	
	

}

?>