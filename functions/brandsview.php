<?php
include_once dirname(__DIR__)."../controllers/product_controller.php";
include_once("../settings/core.php");

$sellerid = $_SESSION['id'];



function select_drop_Brands($brand){
	global $sellerid;
	?>
	<select class="custom-select tm-select-accounts" id="brand" name="bid">
		<?php
		$result= get_all_brands_ctr($sellerid);
		$i=0;
		if ($result!=false) { 
			if ($brand == -1) { ?>

				<option value="" selected>Select brand</option>

			<?php } 
			while($i < count($result)){
				if ($brand != -1){
					$selected = ($result[$i]['brand_id'] == $brand) ? 'selected' : '';
	
				}
				?>
				<option value="<?php echo $result[$i]['brand_id']; ?>" $selected><?php echo $result[$i]['brand_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No brands have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}

function select_drop_Categories($cat){
	
	?>
	<select class="custom-select tm-select-accounts" id="category" name="cid">
		<?php
		$result= get_all_categories_ctr($sellerid);
		$i=0;
		if ($result!=false) { 
			if ($cat == -1) { ?>

			<option value="" selected>Select category</option>

			<?php } 
			while($i < count($result)){
			if ($cat != -1){
				$selected = ($result[$i]['cat_id'] == $cat) ? 'selected' : '';

			}
			?>
           
				<option value="<?php echo $result[$i]['cat_id']; ?>"><?php echo $result[$i]['cat_name']; ?></option>				
				<?php
				$i++;
			}
		}
		else{
			?>
			<option selected>No categories have been added</option>
			<?php
		}
		?>
	</select>
	<?php 
}

?>