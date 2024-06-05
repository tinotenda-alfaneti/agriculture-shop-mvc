<?php
include_once dirname(__DIR__)."../controllers/product_controller.php";

function view_brands() {
    $brands = get_all_brands_ctr($sellerid);
    $i = 0;
    if ($brands != false) { 
			while($i < count($brands)){
				?>
            <tr>
            <td class="tm-product-name-brand" data-brand-id="<?=$brands[$i]['brand_id'];?>"><?=$brands[$i]['brand_name'];?></td>
                <td class="text-center">
                    <a href="#" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                    </a>
                </td>
            </tr>
<?php      $i++; }
    }

}
function view_categories_index() {
    $categories = get_all_categories_ctr();
    $i = 0;
    if ($categories != false) { 
			while($i < count($categories)){
				
?>
    <li  data-category-Id="<?=$categories[$i]['cat_id'];?>"><a href="#"><?=$categories[$i]['cat_name']; ?></a></li>

<?php $i++; }}}

function view_categories_shop() {
    $categories = get_all_categories_ctr();
    $i = 0;
    if ($categories != false) { ?>
        <li><a href="#" data-category-Id="all">All<span>25</span></a></li>
			<?php while($i < count($categories)){
				
?>
    <li><a href="#" data-category-Id="<?=$categories[$i]['cat_id'];?>"><?=$categories[$i]['cat_name']; ?> <span>25</span></a></li>
    
<?php $i++; }}}

function view_categories() {
    $categories = get_all_categories_ctr();
    $i = 0;
    if ($categories != false) { 
			while($i < count($categories)){
				
?>
        <tr>
            <td class="tm-product-name-category" data-category-Id="<?=$categories[$i]['cat_id'];?>"><?=$categories[$i]['cat_name']; ?></td>
            <td class="text-center">
                <a href="#" class="tm-product-delete-link">
                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
            </td>
        </tr>
<?php $i++; }}}



function view_products() {
    $products = select_allproducts_ctr();
    $i = 0;
    if ($products != false) { 
			while($i < count($products)){
				
?>
        <tr>
            <td class="tm-product-name-product" data-product-id="<?=$products[$i]['product_id'];?>"><?=$products[$i]['product_title']; ?></td>
            <td class="tm-product-name-product" data-product-id="<?=$products[$i]['product_id'];?>"><?=$products[$i]['product_desc']; ?></td>
            <td class="tm-product-name-product" data-product-id="<?=$products[$i]['product_id'];?>"><?=$products[$i]['product_keywords']; ?></td>
            <td class="tm-product-name-product" data-product-id="<?=$products[$i]['product_id'];?>"><?=$products[$i]['product_price']; ?></td>
            <td>
                <a href="#" class="tm-product-delete-link">
                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
            </td>
        </tr>
<?php $i++; }}}


function user_grid_view_products() {
    $products = select_allproducts_ctr();
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
            if ($products[$i]["product_quantity"] === "0") {
                $i++;
                continue;
            }
?>
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 tm-product" data-category-Id="<?= $products[$i]['product_cat'] ?>"  data-product-id="<?= $products[$i]['product_id'] ?>">
            <div class="product">
                <div class="product__inner">
                    <div class="pro__thumb">
                        <a href="#">
                            <div style="width: 250px; height: 250px">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="../images/products/<?= $products[$i]["product_image"]?>" alt="product images">
                            </div>
                        </a>
                    </div>
                    <div class="product__hover__info">
                        <ul class="product__action">
                            <li><a data-bs-toggle="modal" data-product-id="<?= $products[$i]['product_id'] ?>" data-bs-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                            <li><a title="Add To Cart" href="../actions/addcart_action.php?pid=<?=$products[$i]['product_id']?>&quantity=1"><span class="ti-shopping-cart"></span></a></li>
                            <li><a title="Wishlist" href="404.html"><span class="ti-heart"></span></a></li>
                        </ul>
                    </div>
                    <!-- Quantity Circle -->
                    <div class="quantity-circle"><?= $products[$i]['product_quantity'] ?></div>
                </div>
                <div class="product__details">
                    <h2><a href="404.html"><?=$products[$i]['product_title']; ?></a></h2>
                    <ul class="product__price">
                        <li class="old__price"><?=$products[$i]['product_price']; ?></li>
                        <li class="new__price"><?=$products[$i]['product_price']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
<?php


$i++; }}}

function user_products_view_index() {
    $products = select_allproducts_ctr();
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
?>
        
        <div class="product" data-category-Id="<?= $products[$i]['product_cat'] ?>" data-product-id="<?= $products[$i]['product_id'] ?>">
            <div class="product__inner">
                <div class="pro__thumb">
                    <a href="#">
                        <div style="width: 270px; height: 270px">
                            <img style="width: 100%; height: 100%; object-fit: cover;" src="../images/products/<?= $products[$i]["product_image"]?>" alt="product images">
                        </div>
                    </a>
                </div>
                <div class="product__hover__info">
                    <ul class="product__action">
                        <li><a data-bs-toggle="modal" data-product-id="<?= $products[$i]['product_id'] ?>" data-bs-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                        <li><a title="Add To Cart" href="../actions/addcart_action.php?pid=<?=$products[$i]['product_id']?>&quantity=1"><span class="ti-shopping-cart"></span></a></li>
                        <li><a title="Wishlist" href="404.html"><span class="ti-heart"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="product__details">
                <h2><a href="404.html"><?=$products[$i]['product_title']; ?></a></h2>
                <ul class="product__price">
                    <li class="old__price"><?=$products[$i]['product_price']; ?></li>
                    <li class="new__price"><?=$products[$i]['product_price']; ?></li>
                </ul>
            </div>
        </div>
<?php


$i++; }}}


function user_search_products($query) {
    $products = search_products_ctr($query);
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
            if ($products[$i]["product_quantity"] === "0") {
                $i++;
                continue;
            }
?>
        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 tm-product" data-category-Id="<?= $products[$i]['product_cat'] ?>" data-product-id="<?= $products[$i]['product_id'] ?>">
            <div class="product">
                <div class="product__inner">
                    <div class="pro__thumb">
                        <a href="#">
                            <div style="width: 250px; height: 250px">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="../images/products/<?= $products[$i]["product_image"]?>" alt="product images">
                            </div>
                        </a>
                    </div>
                    <div class="product__hover__info">
                        <ul class="product__action">
                            <li><a data-bs-toggle="modal" data-product-id="<?= $products[$i]['product_id'] ?>" data-bs-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                            <li><a title="Add To Cart" href="../actions/addcart_action.php?pid=<?=$products[$i]['product_id']?>&quantity=1"><span class="ti-shopping-cart"></span></a></li>
                            <li><a title="Wishlist" href="404.html"><span class="ti-heart"></span></a></li>
                        </ul>
                    </div>
                    <!-- Quantity Circle -->
                    <div class="quantity-circle"><?= $products[$i]['product_quantity'] ?></div>
                </div>
                <div class="product__details">
                    <h2><a href="404.html"><?=$products[$i]['product_title']; ?></a></h2>
                    <ul class="product__price">
                        <li class="old__price"><?=$products[$i]['product_price']; ?></li>
                        <li class="new__price"><?=$products[$i]['product_price']; ?></li>
                    </ul>
                </div>
            </div>
        </div>

<?php


$i++; }}}

function search_list_view_products($query) {
    $products = search_products_ctr($query);
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
            if ($products[$i]["product_quantity"] === "0") {
                $i++;
                continue;
            }
?>
        <!-- Start Single Product -->
        <div class="single__list__content clearfix" data-category-Id="<?= $products[$i]['product_cat'] ?>" data-product-id="<?= $products[$i]['product_id'] ?>">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-5 col-12">
                    <div class="list__thumb">
                        <a href="#">
                            <div style="width: 200px; height: 200px">
                                <img style="width: 100%; height: 100%; object-fit: fill;" src="../images/products/<?= $products[$i]["product_image"]?>" alt="product images">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-9 col-sm-7 col-12">
                    <div class="list__details__inner">
                        <h2><a href="#"><?=$products[$i]['product_title']; ?></a></h2>
                        <p><?= htmlspecialchars($products[$i]["product_desc"]); ?></p>
                        <span class="product__price"><?=$products[$i]['product_price']; ?></span>
                        <div class="shop__btn">
                            <a class="htc__btn" href="../actions/addcart_action.php?pid=<?=$products[$i]['product_id']?>&quantity=1"><span class="ti-shopping-cart"></span>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php


$i++; }}}


function user_list_view_products() {
    $products = select_allproducts_ctr();
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
            if ($products[$i]["product_quantity"] === "0") {
                $i++;
                continue;
            }
?>
        <!-- Start Single Product -->
        <div class="single__list__content clearfix" data-category-Id="<?= $products[$i]['product_cat'] ?>" data-product-id="<?= $products[$i]['product_id'] ?>">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-3 col-sm-5 col-12">
                    <div class="list__thumb">
                        <a href="#">
                            <div style="width: 200px; height: 200px">
                                <img style="width: 100%; height: 100%; object-fit: fill;" src="../images/products/<?= $products[$i]["product_image"]?>" alt="product images">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-xl-9 col-sm-7 col-12">
                    <div class="list__details__inner">
                        <h2><a href="#"><?=$products[$i]['product_title']; ?></a></h2>
                        <p><?= htmlspecialchars($products[$i]["product_desc"]); ?></p>
                        <span class="product__price"><?=$products[$i]['product_price']; ?></span>
                        <div class="shop__btn">
                            <a class="htc__btn" href="../actions/addcart_action.php?pid=<?=$products[$i]['product_id']?>&quantity=1"><span class="ti-shopping-cart"></span>Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php


$i++; }}}

?>
