<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
      include("admin_header.php");
      include_once("../functions/productview.php");
      include_once("../settings/core.php");
      include_once("../functions/adminview.php");
  
    if (!isLoggedIn() ) {
        $_SESSION['error'] = 'Please Log in';
        header("Location: login-register.php");
    }
  
    if (!isAdmin() ) {
        $_SESSION['error'] = 'Please Log in as Admin';
        header("Location: login-register.php");
    }
?>
<style>
.table tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Even row color */
}

.table tbody tr:nth-child(odd) {
    background-color: #ffffff; /* Odd row color */
}

</style>

<?php 
    if (isset($_SESSION['successnotif'])) { ?>

            <script>Swal.fire({
            title: "Action Done!",
            text: "<?=$_SESSION['successnotif']?>",
            icon: "success",
            button: "OK",
            });</script>
<?php unset($_SESSION['successnotif']);}?>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" style="margin-top: 90px; margin-bottom: 0px; z-index: 5;" id="top">
      <div class="container" data-layout="container">
          <div class="row g-3 mb-3">
            <div class="col-xxl-6 col-xl-12">
              <div class="row g-3">
                <div class="col-12">
                  <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">
                      <div class="bg-holder d-none d-md-block bg-card z-1" style="background-image:url(../adminassets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;"></div><!--/.bg-holder-->
                      <div class="position-relative z-2">
                        <div>
                          <h3 class="text-primary mb-1" style="color: #b82c46;">Hi, <?=$_SESSION["name"];?>!</h3>
                          <p>Here’s what happening with your store today </p>
                        </div>
                        <div class="d-flex py-3">
                          <div class="pe-3">
                            <p class="text-600 fs-10 fw-medium">Today's visit </p>
                            <h4 class="text-800 mb-0">--------</h4>
                          </div>
                          <div class="ps-3">
                            <p class="text-600 fs-10">Today’s total sales </p>
                            <h4 class="text-800 mb-0">---------- </h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <ul class="mb-0 list-unstyled list-group font-sans-serif">
                        <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs-11"></div>
                                <p class="fs-10 ps-2 mb-0"><strong>5 products</strong> didn’t publish to your Facebook page</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="fs-10 fw-medium" href="#allproducts">Go to products<i class="fas fa-chevron-right ms-1 fs-11"></i></a></div>
                          </div>
                        </li>
                        <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs-11"></div>
                                <p class="fs-10 ps-2 mb-0"><strong>5 brands</strong> didn’t publish to your Facebook page</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="fs-10 fw-medium" href="#allbrands">Go to brands<i class="fas fa-chevron-right ms-1 fs-11"></i></a></div>
                          </div>
                        </li>
                        <li class="list-group-item mb-0 rounded-0 py-3 px-x1 greetings-item border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs-11"></div>
                                <p class="fs-10 ps-2 mb-0"><strong>5 categories</strong> publish to your Facebook page</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="fs-10 fw-medium" href="#allcategories">Go to categories<i class="fas fa-chevron-right ms-1 fs-11"></i></a></div>
                          </div>
                        </li>
                        <li class="list-group-item mb-0 rounded-0 py-3 px-x1 list-group-item-warning text-700 border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs-11 text-primary"></div>
                                <p class="fs-10 ps-2 mb-0"><strong>404</strong> COMING SOON</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="fs-10 fw-medium text-warning-emphasis" href="#!">View payments<i class="fas fa-chevron-right ms-1 fs-11"></i></a></div>
                          </div>
                        </li>
                        <li class="list-group-item mb-0 rounded-0 py-3 px-x1 list-group-item-warning text-700  border-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs-11 text-primary"></div>
                                <p class="fs-10 ps-2 mb-0"><strong>404</strong> COMING SOON</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="fs-10 fw-medium text-warning-emphasis" href="#!">View orders<i class="fas fa-chevron-right ms-1 fs-11"></i></a></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="card h-md-100 ecommerce-card-min-width">
                        <div class="card-header pb-0">
                          <h6 class="mb-0 mt-2 d-flex align-items-center">DUMMY - Weekly Sales<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">
                          <div class="row">
                            <div class="col">
                              <p class="font-sans-serif lh-1 mb-1 fs-7">$47K</p><span class="badge badge-subtle-success rounded-pill fs-11">+3.5%</span>
                            </div>
                            <div class="col-auto ps-0">
                              <div class="echart-bar-weekly-sales h-100 echart-bar-weekly-sales-smaller-width"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card product-share-doughnut-width">
                        <div class="card-header pb-0">
                          <h6 class="mb-0 mt-2 d-flex align-items-center">DUMMY - Product Share</h6>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">
                          <div class="row align-items-end">
                            <div class="col">
                              <p class="font-sans-serif lh-1 mb-1 fs-7">34.6%</p><span class="badge badge-subtle-success rounded-pill"><span class="fas fa-caret-up me-1"></span>3.5%</span>
                            </div>
                            <div class="col-auto ps-0"><canvas class="my-n5" id="marketShareDoughnut" width="112" height="112"></canvas>
                              <p class="mb-0 text-center fs-11 mt-4 text-500">Target: <span class="text-800">55%</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card h-md-100 h-100">
                        <div class="card-body">
                          <div class="row h-100 justify-content-between g-0">
                            <div class="col-5 col-sm-6 col-xxl pe-2">
                              <h6 class="mt-1">DUMMY - Market Share</h6>
                              <div class="fs-11 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                  <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">Falcon</span></div>
                                  <div class="d-xxl-none">57%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                  <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Sparrow</span></div>
                                  <div class="d-xxl-none">20%</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                  <div class="d-flex align-items-center"><span class="dot bg-warning"></span><span class="fw-semi-bold">Phoenix</span></div>
                                  <div class="d-xxl-none">22%</div>
                                </div>
                              </div>
                            </div>
                            <div class="col-auto position-relative">
                              <div class="echart-product-share"></div>
                              <div class="position-absolute top-50 start-50 translate-middle text-1100 fs-7">26M</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h6 class="mb-0 mt-2 d-flex align-items-center">DUMMY - Total Order</h6>
                        </div>
                        <div class="card-body">
                          <div class="row align-items-end">
                            <div class="col">
                              <p class="font-sans-serif lh-1 mb-1 fs-7">58.4K</p>
                              <div class="badge badge-subtle-primary rounded-pill fs-11"><span class="fas fa-caret-up me-1"></span>13.6%</div>
                            </div>
                            <div class="col-auto ps-0">
                              <div class="total-order-ecommerce" data-echarts='{"series":[{"type":"line","data":[110,100,250,210,530,480,320,325]}],"grid":{"bottom":"-10px"}}'></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-6 col-xl-12">
              <div class="card py-3 mb-3">
                <div class="card-body py-3">
                  <div class="row g-0">
                    <div class="col-6 col-md-4 border-200 border-bottom border-end pb-4">
                      <h6 class="pb-1 text-700">DUMMY - Orders </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">15,450 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">13,675 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-primary"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom border-end-md pb-4 ps-3">
                      <h6 class="pb-1 text-700">DUMMY - Items sold </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">1,054 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">13,675 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-warning"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom border-end border-end-md-0 pb-4 pt-4 pt-md-0 ps-md-3">
                      <h6 class="pb-1 text-700">DUMMY - Refunds </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">$145.65 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">13,675 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom border-bottom-md-0 border-end-md pt-4 pb-md-0 ps-3 ps-md-0">
                      <h6 class="pb-1 text-700">DUMMY - Gross sale </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">$100.26 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">$109.65 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-danger"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 border-200 border-bottom-md-0 border-end pt-4 pb-md-0 ps-md-3">
                      <h6 class="pb-1 text-700">DUMMY - Shipping </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">$365.53 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">13,675 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-success"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                    <div class="col-6 col-md-4 pb-0 pt-4 ps-3">
                      <h6 class="pb-1 text-700">DUMMY - Processing </h6>
                      <p class="font-sans-serif lh-1 mb-1 fs-7">861 </p>
                      <div class="d-flex align-items-center">
                        <h6 class="fs-10 text-500 mb-0">13,675 </h6>
                        <h6 class="fs-11 ps-3 mb-0 text-info"><span class="me-1 fas fa-caret-up"></span>21.8%</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <div class="row flex-between-center g-0">
                    <div class="col-auto">
                      <h6 class="mb-0">DUMMY - Total Sales</h6>
                    </div>
                    <div class="col-auto d-flex">
                      <div class="form-check mb-0 d-flex"><input class="form-check-input form-check-input-primary" id="ecommerceLastMonth" type="checkbox" checked="checked" /><label class="form-check-label ps-2 fs-11 text-600 mb-0" for="ecommerceLastMonth">Last Month<span class="text-1100 d-none d-md-inline">: $32,502.00</span></label></div>
                      <div class="form-check mb-0 d-flex ps-0 ps-md-3"><input class="form-check-input ms-2 form-check-input-warning opacity-75" id="ecommercePrevYear" type="checkbox" checked="checked" /><label class="form-check-label ps-2 fs-11 text-600 mb-0" for="ecommercePrevYear">Prev Year<span class="text-1100 d-none d-md-inline">: $46,018.00</span></label></div>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales-ecomm" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales-ecomm"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body pe-xxl-0"><!-- Find the JS file for the following chart at: src/js/charts/echarts/total-sales-ecommerce.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                  <div class="echart-line-total-sales-ecommerce" data-echart-responsive="true" data-options='{"optionOne":"ecommerceLastMonth","optionTwo":"ecommercePrevYear"}'></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-xxl-3 col-md-6 col-lg-5">
              <div class="card shopping-cart-bar-min-height h-100">
                <div class="card-header d-flex flex-between-center">
                  <h6 class="mb-0">DUMMY - Shopping Cart</h6>
                  <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-shopping-cart-bar" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-shopping-cart-bar"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </div>
                <div class="card-body py-0 d-flex align-items-center h-100">
                  <div class="flex-1">
                    <div class="row g-0 align-items-center pb-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Initiated</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-primary" style="width: 50%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-success"></span>43.6%</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"> Session: <span class ="text-600">6817</span> </p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Abandonment rate</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-danger" style="width: 25%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-danger"></span>13.11%</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">44</span> of 61</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Bounce rate</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-primary" style="width: 35%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-success"></span>12.11%</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">8</span> of 61</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Completion rate</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-primary" style="width: 43%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-down text-danger"></span>43.6%</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                      </div>
                    </div>
                    <div class="row g-0 align-items-center pb-3 border-top pt-3">
                      <div class="col pe-4">
                        <h6 class="fs-11 text-600">Revenue Rate</h6>
                        <div class="progress" style="height:5px" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar rounded-3 bg-primary" style="width: 60%"></div>
                        </div>
                      </div>
                      <div class="col-auto text-end">
                        <p class="mb-0 text-900 font-sans-serif"><span class="me-1 fas fa-caret-up text-success"></span>60.5%</p>
                        <p class="mb-0 fs-11 text-500 fw-semi-bold"><span class ="text-600">18</span> of 179</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-md-6 col-lg-7 order-xxl-1">
              <div class="card h-100">
                <div class="card-header bg-body-tertiary py-2 d-flex flex-between-center">
                  <h6 class="mb-0">DUMMY - Top Products</h6>
                  <div class="d-flex"><a class="btn btn-link btn-sm me-2" href="#!">View Details</a>
                    <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-top-products" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-11"></span></button>
                      <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-top-products"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body d-flex h-100 flex-column justify-content-end"><!-- Find the JS file for the following chart at: src/js/charts/echarts/top-products.js--><!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                  <div class="echart-bar-top-products echart-bar-top-products-ecommerce" data-echart-responsive="true"> </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-9 col-md-12">
              <div class="card z-1" id="recentPurchaseTable" data-list='{"valueNames":["name","email","product","payment","amount"],"page":7,"pagination":true}'>
                <div class="card-header">
                  <div class="row flex-between-center">
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Recent Purchases</h5>
                    </div>
                    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                      <div class="d-none" id="table-purchases-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                          </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                      </div>
                      <div id="table-purchases-replace-element"><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">New</span></button><button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button></div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 py-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-sm fs-10 mb-0 overflow-hidden">
                      <thead class="bg-200">
                        <tr>
                          <th class="white-space-nowrap">
                            <div class="form-check mb-0 d-flex align-items-center"><input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' /></div>
                          </th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Customer</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="product">Product</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap text-center" data-sort="payment">Payment</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Amount</th>
                          <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="table-purchase-body">
                        <?php getPurchasesData() ?>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row align-items-center">
                    <div class="pagination d-none"></div>
                    <div class="col">
                      <p class="mb-0 fs-10"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"></span></p>
                    </div>
                    <div class="col-auto d-flex"><button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev"><span>Previous</span></button><button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-9 col-md-12">
              <div class="card z-1" id="customerTableID" data-list='{"valueNames":["name","email","product","payment","amount"],"page":7,"pagination":true}'>
                <div class="card-header">
                  <div class="row flex-between-center">
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                      <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">All Customers</h5>
                    </div>
                    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                      <div class="d-none" id="table-purchases-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                          </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
                      </div>
                      <div id="table-purchases-replace-element"><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">New</span></button><button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button><button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button></div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 py-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-sm fs-10 mb-0 overflow-hidden">
                      <thead class="bg-200">
                        <tr>
                          <th class="white-space-nowrap">
                            <div class="form-check mb-0 d-flex align-items-center"><input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' /></div>
                          </th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="name">Customer</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="product">Contact</th>
                          <th class="text-900 sort pe-1 align-middle white-space-nowrap" data-sort="product">Address</th>
                          <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="table-purchase-body">
                        <?php admin_view_customers(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row align-items-center">
                    <div class="pagination d-none"></div>
                    <div class="col">
                      <p class="mb-0 fs-10"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"></span></p>
                    </div>
                    <div class="col-auto d-flex"><button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev"><span>Previous</span></button><button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button></div>
                  </div>
                </div>
              </div>
            </div>
            <!---Brands and Categories --->
            <div class="col-xxl-4 col-md-6">
              <div class="card h-lg-100 overflow" style="height: 500px; overflow: auto;">
                  <div class="card-body p-0">
                    <div class="table-responsive scrollbar">
                      <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                        <thead class="bg-body-tertiary" id="allbrands">
                          <tr>
                            <th class="text-900">Brand Id</th>
                            <th class="text-900 text-center">Brand Name</th>
                            <th class="text-900 pe-x1 text-end" style="width: 4rem">Manage</th>
                          </tr>
                        </thead>
                        <tbody id="allbrands">
                          <?php admin_view_brands() ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card-footer bg-body-tertiary py-2">
                    <div class="row flex-between-center">
                      <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="add_brand.php">Add Brand</a></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6" >
                <div class="card h-lg-100 overflow-hidden" style="height: 500px; overflow: auto;">
                  <div class="card-body p-0">
                    <div class="table-responsive scrollbar">
                      <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                        <thead class="bg-body-tertiary" id="allbrands">
                          <tr>
                            <th class="text-900">Category Id</th>
                            <th class="text-900 text-center">Category Name</th>
                            <th class="text-900 pe-x1 text-end" style="width: 4rem">Manage</th>
                          </tr>
                        </thead>
                        <tbody id="allcategories">
                          <?php admin_view_categories() ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="card-footer bg-body-tertiary py-2">
                    <div class="row flex-between-center">
                      <div></div>
                      <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="add_category.php">Add Category</a></div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="row" id="allproducts">
            <div class="col">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                      <thead class="bg-body-tertiary">
                        <tr>
                          <th class="text-900">All Products</th>
                          <th class="text-900 text-center">Description</th>
                          <th class="text-900 text-end">Keywords</th>
                          <th class="text-900 text-center">Price</th>
                          <th class="text-900 pe-x1 text-end" style="width: 8rem">Quantity</th>
                          <th class="text-900 pe-x1 text-end" style="width: 4rem">Manage</th>
                        </tr>
                      </thead>
                      <tbody id="allproducts">
                        <?php admin_view_products() ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary py-2">
                  <div class="row flex-between-center">
                    <div class="col-auto"><select class="form-select form-select-sm">
                        <option>Last 7 days</option>
                        <option>Last Month</option>
                        <option>Last Year</option>
                      </select></div>
                    <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="add_product.php">Add Product</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main> <!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->

    <?php
      include("product-quickview.php");
      include("scripts.php");
    ?>
    <script src="../js/jquery-3.3.1.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="../js/bootstrap.min.js"></script>


    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="../vendor/dashboard/vendors/popper/popper.min.js"></script>
    <script src="../vendor/dashboard/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendor/dashboard/vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendor/dashboard/vendors/is/is.min.js"></script>
    <script src="../vendor/dashboard/vendors/chart/chart.min.js"></script>
    <script src="../vendor/dashboard/vendors/countup/countUp.umd.js"></script>
    <script src="../vendor/dashboard/vendors/echarts/echarts.min.js"></script>
    <script src="../vendor/dashboard/vendors/dayjs/dayjs.min.js"></script>
    <script src="../vendor/dashboard/vendors/fontawesome/all.min.js"></script>
    <script src="../vendor/dashboard/vendors/lodash/lodash.min.js"></script>
    <script src="../../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="../vendor/dashboard/vendors/list.js/list.min.js"></script>
    <script src="../adminassets/js/theme.js"></script>
  </body>
</html>