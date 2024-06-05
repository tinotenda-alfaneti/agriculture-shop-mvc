<?php
include_once dirname(__DIR__)."../controllers/product_controller.php";
include_once dirname(__DIR__)."../controllers/customer_controller.php";

include_once("../settings/core.php");

$sellerid = $_SESSION['id'];

function admin_view_products() {
    global $sellerid;
    $products = select_allproducts_ctr();
    $i = 0;
    if ($products != false) { 
        while($i < count($products)){
            $brand = select_onebrand_ctr($products[$i]['product_brand'], $sellerid);
            if ($brand === null) {
                $i++;
                continue;
            }
?>

        <tr class="product border-bottom border-200" data-product-id="<?= $products[$i]['product_id'] ?>">
            <td>
            <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="../images/products/<?=$products[$i]["product_image"]; ?>" width="60" alt="" />
                <div class="flex-1 ms-3">
                <h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!"><?=$products[$i]['product_title']; ?></a></h6>
                <p class="fw-semi-bold mb-0 text-500"><?=$brand["brand_name"];?></p>
                </div>
            </div>
            </td>
            <td class="align-middle text-center fw-semi-bold"><?=$products[$i]['product_desc']; ?></td>
            <td class="align-middle text-center fw-semi-bold"><?=$products[$i]['product_keywords']; ?></td>
            <td class="align-middle text-end fw-semi-bold"><?=$products[$i]['product_price']; ?></td>
            <td class="align-middle text-end fw-semi-bold">
            <!-- <div class="progress me-3 rounded-3 bg-200" style="height: 5px; width:60px" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-primary rounded-pill" style="width: 40%;"></div> -->
                <?=$products[$i]['product_quantity']; ?>  
            </td>
            <td class="align-middle white-space-nowrap text-end">
                <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-9" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-9">
                        <a class="quick-view dropdown-item" href="#!" data-bs-toggle="modal" data-bs-target="#productModal" data-product-id="<?= $products[$i]['product_id'] ?>" >View</a>
                        <a class="dropdown-item" href="edit_product.php?product_id=<?= $products[$i]['product_id'] ?>">Edit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="../actions/deleteproduct_action.php?pid=<?= $products[$i]['product_id'] ?>">Delete</a>
                    </div>
                </div>
            </td>
        </tr>
<?php


$i++; }}}

function admin_view_brands() {
    global $sellerid;
    $brands = get_all_brands_ctr($sellerid);
    $i = 0;
    if ($brands != false) { 
			while($i < count($brands)){
				?>

        <tr class="brand border-bottom border-200" data-brand-id="<?=$brands[$i]['brand_id'];?>">
            <td class="align-middle text-center fw-semi-bold"><?=$brands[$i]['brand_id'];?></td>
            <td class="align-middle text-center fw-semi-bold"><?=$brands[$i]['brand_name'];?></td>
            <td class="align-middle white-space-nowrap text-end">
                <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-90" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-90">
                        <a class="dropdown-item" href="edit_brand.php?brand_id=<?=$brands[$i]['brand_id'];?>&brand_name=<?=$brands[$i]['brand_name'];?>">Edit</a>
                    <div class="dropdown-divider"></div>
                    <form action="../actions/deletebrand_action.php" method="post">
                        <input type="hidden" name="bid" value="<?= $brands[$i]['brand_id'] ?>">
                        <button type="submit" class="dropdown-item text-danger" style="background: none; border: none;">Delete</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
<?php      $i++; }
    }

}

function admin_view_categories() {
    $categories = get_all_categories_ctr();
    $i = 0;
    if ($categories != false) { 
			while($i < count($categories)){
				
?>

        <tr class="category border-bottom border-200" data-category-id="<?=$categories[$i]['cat_id'];?>">
            <td class="align-middle text-center fw-semi-bold"><?=$categories[$i]['cat_id'];?></td>
            <td class="align-middle text-center fw-semi-bold"><?=$categories[$i]['cat_name'];?></td>
            <td class="align-middle white-space-nowrap text-end">
            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-9">
                        <a class="dropdown-item" href="edit_category.php?category_id=<?=$categories[$i]['cat_id'];?>&category_name=<?=$categories[$i]['cat_name'];?>">Edit</a>
                    <div class="dropdown-divider"></div>
                    <form action="../actions/deletecategory_action.php" method="post">
                        <input type="hidden" name="cid" value="<?= $categories[$i]['cat_id'] ?>">
                        <button type="submit" class="dropdown-item text-danger" style="background: none; border: none;">Delete</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
<?php      $i++; }
    }

}

function admin_view_customers() {
    $customers = get_customers_ctr();
    $i = 0;
    if ($customers != false) { 
			while($i < count($customers)){
				
?>
    

        <tr class="btn-reveal-trigger">
            <td class="align-middle" style="width: 28px;">
            <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="recent-purchase-1" data-bulk-select-row="data-bulk-select-row" /></div>
            </td>
            <th class="align-middle white-space-nowrap name"><a href="../app/e-commerce/customer-details.html"><?= $customers[$i]["customer_fname"]." ".$customers[$i]["customer_lname"] ?></a></th>
            <td class="align-middle white-space-nowrap email"><?= $customers[$i]["customer_email"] ?></td>
            <td class="align-middle white-space-nowrap product"><?= $customers[$i]["customer_contact"] ?></td>
            <td class="align-middle white-space-nowrap product"><?= $customers[$i]["customer_city"].", ".$customers[$i]["customer_country"] ?></td>
            <td class="align-middle white-space-nowrap text-end">
            <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-1" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-1"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Refund</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete</a>
                </div>
            </div>
            </td>
        </tr>
<?php      $i++; }
    }

}

function getPurchasesData() {
    global $sellerid;

    $databaseResults = purchases_brand_owner_ctr($sellerid);
   
    $invoiceItems = array();

    foreach ($databaseResults as $result) { ?>


        <tr class="btn-reveal-trigger">
        <td class="align-middle" style="width: 28px;">
          <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="recent-purchase-0" data-bulk-select-row="data-bulk-select-row" /></div>
        </td>
        <th class="align-middle white-space-nowrap name"><a href="../app/e-commerce/customer-details.html"><?= $result['customer_name'] ?></a></th>
        <td class="align-middle white-space-nowrap email"><?= $result['customer_email'] ?></td>
        <td class="align-middle white-space-nowrap product"><?=$result['product_title']?></td>
        <td class="align-middle text-center fs-9 white-space-nowrap payment"><span class="badge badge rounded-pill badge-subtle-success"><?= $result['order_status'] ?><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span></td>
        <td class="align-middle text-end amount"><?= $result['amt'] ?></td>
        <td class="align-middle white-space-nowrap text-end">
          <div class="dropstart font-sans-serif position-static d-inline-block"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown-recent-purchase-table-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-recent-purchase-table-0"><a class="dropdown-item" href="invoice.php?oid=<?=$result['order_id']?>">View</a><a class="dropdown-item" href="#!">Refund</a>
              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Delete</a>
            </div>
          </div>
        </td>
      </tr>

       <?php 
    }
}
?>