<?php

include_once dirname(__DIR__)."/controllers/product_controller.php";

function show_cart_side($id){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=show_cart_ctr($id,$ip);
	$i=0;
	$total=0;?>
	<div class="shp__cart__wrap">
	<?php
	if ($result!=false) {
		while($i<count($result))
		{
			$product=select_oneproduct_ctr($result[$i]['p_id']);
			?>
            <div class="shp__single__product">
                <div class="shp__pro__thumb">
                    <a href="#">
                        <img src="../images/products/<?= $product["product_image"]?>" alt="product images">
                    </a>
                </div>
                <div class="shp__pro__details">
                    <h2><a href="404.html"><?= $product["product_title"]?></a></h2>
                    <span class="quantity"><?=$result[$i]['qty']?></span>
                    <span class="shp__price"><?= $product["product_price"]?></span>
                </div>
                <div class="remove__btn">
					<a href="../actions/deletecartitem_action.php?c_id=<?=$result[$i]['c_id']?>&p_id=<?=$result[$i]['p_id']?>"  title="Remove this item"><i class="zmdi zmdi-close"></i></i></a>
                </div>
            </div>
			

			<?php 

			$total+=($product['product_price'])*($result[$i]['qty']);
			$i++;
		}

        ?>

<ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price"><?= $total ?></li>
                    </ul>
					</div>
					<ul class="shopping__btn">
                        <li><a href="cart.php">View Cart</a></li>
                        <li class="shp__checkout">

                            <!-- Hidden form -->
                            <form id="checkoutForm" action="checkout.php" method="post" style="display: none;">
                                <input type="hidden" name="amount" value="<?= $total ?>">
                            </form>

                            <!-- Link to trigger form submission -->
                            <li class="shp__checkout"><a href="#" id="checkoutLink">Checkout</a></li>

                        </li>
                    </ul>
        <?php

}
else{
	echo "Your Cart is Empty";
}

}


function show_cart_full($id){
	$ip = $_SERVER['REMOTE_ADDR'];

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	$result=show_cart_ctr($id,$ip);
	$i=0;
	$total=0;?>

<form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
	
	
	
	
	<?php
	if ($result!=false) {
		while($i<count($result))
		{
			$product=select_oneproduct_ctr($result[$i]['p_id']);
			?>

            <tr>
                <td class="product-thumbnail"><a href="#"><img src="../images/products/<?= $product["product_image"]?>" alt="product images"></a></td>
                <td class="product-name"><a href="#"><?= $product["product_title"]?></a></td>
                <td class="product-price"><span class="amount"><?= $product["product_price"]?></span></td>
				<td class="product-quantity">
					<form method="POST" action="../actions/updatequantity_action.php" id='<?=$result[$i]['p_id']?>'>
						<input type="hidden" name="pid" value="<?php echo $product['product_id'];  ?>">
						<input type="hidden" name="cid" value="<?php echo $result[$i]['c_id'];  ?>">
						<input type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="<?php echo $result[$i]['qty'];  ?>" min="1" max="100" onfocusout="document.getElementById('<?=$result[$i]['p_id']?>').submit();">

					</form>
				</td>
                <!-- <td class="product-quantity"><input type="number" value="<?=$result[$i]['qty']?>" /></td> -->
                <td class="product-subtotal"><?= floatVal($result[$i]['qty']) * floatVal($product["product_price"])?></td>
                <td class="product-remove"><a href="../actions/deletecartitem_action.php?c_id=<?=$result[$i]['c_id']?>&p_id=<?=$result[$i]['p_id']?>">X</a></td>
            </tr>
			

			<?php 

			$total+=($product['product_price'])*($result[$i]['qty']);
			$i++;
		}

?>

</tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <input type="submit" value="Update Cart" />
                                        <a href="shop.php">Continue Shopping</a>
                                    </div>
                                    <div class="coupon">
                                        <h3>Coupon</h3>
                                        <p>Enter your coupon code if you have one.</p>
                                        <input type="text" placeholder="Coupon code" />
                                        <input type="submit" value="Apply Coupon" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <h2>Cart Totals</h2>
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount"><?=$total?></span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>
                                                        <ul id="shipping_method">
                                                            <li>
                                                                <input type="radio" /> 
                                                                <label>
                                                                    Free Shipping
                                                                </label>
                                                            </li>
                                                            <li></li>
                                                        </ul>
                                                        <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                                    </td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount"><?=$total?></span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <li class="shp__checkout">

                                                <!-- Hidden form -->
                                                <form id="checkoutFormCart" action="checkout.php" method="post" style="display: none;">
                                                    <input type="hidden" name="amount" value="<?= $total ?>">
                                                </form>

                                                <!-- Link to trigger form submission -->
                                                <li class="shp__checkout"><a href="#" id="checkoutLinkCart">Proceed toCheckout</a></li>

                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
	


<?php
} else{
	echo "Your Cart is Empty";
}

}


?>
