<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
      include("admin_header.php");
      include_once("../functions/productview.php");
      include_once("../settings/core.php");
      include_once("../functions/invoice_data.php");
  
    if (!isLoggedIn() ) {
        $_SESSION['error'] = 'Please Log in';
        header("Location: login-register.php");
    }
  
    if (!isAdmin() ) {
        $_SESSION['error'] = 'Please Log in as Admin';
        header("Location: login-register.php");
    }

    $order_id = $_GET['oid'];
    $invoiceData = getInvoiceData($order_id);

    if (isset($_SESSION['successnotif'])) { ?>

            <script>Swal.fire({
            title: "Action Done!",
            text: "<?=$_SESSION['successnotif']?>",
            icon: "success",
            button: "OK",
            });</script>
<?php unset($_SESSION['successnotif']);}?>

    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <body>
    <main class="main" style="margin-top: 90px; margin-bottom: 0px; z-index: 5;" id="top">
        <div class="container" data-layout="container">
            <!-- Invoice Header -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md">
                            <h5 class="mb-2 mb-md-0"><?= $invoiceData["invoice-number"] ?></h5>
                        </div>
                        <div class="col-auto">
                            <!-- Download, Print, and Receive Payment Buttons -->
                            <a href="../actions/download_invoice.php?order_id=<?= $order_id ?>" class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><span class="fas fa-arrow-down me-1"></span>Download (.pdf)</a>
                            <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" onclick="window.print()" type="button"><span class="fas fa-print me-1"></span>Print</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Invoice Details -->
            <div class="card">
                <div class="card-body">
                    <!-- Invoice Header Information -->
                    <div class="row align-items-center text-center mb-3">
                        <div class="col-sm-6 text-sm-start"><img src="../../assets/img/logos/logo-invoice.png" alt="invoice" width="150" /></div>
                        <div class="col text-sm-end mt-3 mt-sm-0">
                            <h2 class="mb-3">Receipt</h2>
                            <h5><?= $invoiceData["company-name"] ?></h5>
                            <p class="fs-10 mb-0"><?= $invoiceData["company-address"] ?></p>
                        </div>
                        <div class="col-12">
                            <hr />
                        </div>
                    </div>
                    <!-- Customer Information -->
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-500">Invoice to</h6>
                            <h5><?= $invoiceData["customer-name"] ?></h5>
                            <p class="fs-10"><?= $invoiceData["customer-address"] ?></p>
                            <p class="fs-10"><a href="mailto:<?= $invoiceData["customer-email"] ?>"><?= $invoiceData["customer-email"] ?></a><br /><a href="tel:<?= $invoiceData["customer-phone"] ?>"><?= $invoiceData["customer-phone"] ?></a></p>
                        </div>
                        <div class="col-sm-auto ms-auto">
                            <!-- Invoice Metadata -->
                            <div class="table-responsive">
                                <table class="table table-sm table-borderless fs-10">
                                    <tbody>
                                        <tr>
                                            <th class="text-sm-end">Invoice No:</th>
                                            <td><?= $invoiceData["invoice-number"] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm-end">Order Number:</th>
                                            <td><?= $order_id ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm-end">Invoice Date:</th>
                                            <td><?= $invoiceData["invoice-date"] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm-end">Payment Due:</th>
                                            <td><?= $invoiceData["payment-due"] ?></td>
                                        </tr>
                                        <tr class="alert alert-success fw-bold">
                                            <th class="text-success-emphasis text-sm-end">Amount Due:</th>
                                            <td class="text-success-emphasis"><?= $invoiceData["amount-due"] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Items -->
                    <div class="table-responsive scrollbar mt-4 fs-10">
                        <table class="table table-striped border-bottom">
                            <thead data-bs-theme="light">
                                <tr class="bg-primary dark__bg-1000">
                                    <th class="text-white border-0">Products</th>
                                    <th class="text-white border-0 text-center">Quantity</th>
                                    <th class="text-white border-0 text-end">Rate</th>
                                    <th class="text-white border-0 text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through invoice items -->
                                <?php foreach($invoiceData["items"] as $item): ?>
                                    <tr>
                                        <td class="align-middle">
                                            <h6 class="mb-0 text-nowrap"><?= $item["product-name"] ?></h6>
                                            <p class="mb-0"><?= $item["product-description"] ?></p>
                                        </td>
                                        <td class="align-middle text-center"><?= $item["quantity"] ?></td>
                                        <td class="align-middle text-end"><?= $item["rate"] ?></td>
                                        <td class="align-middle text-end"><?= $item["amount"] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Invoice Summary -->
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <table class="table table-sm table-borderless fs-10 text-end">
                                <tr>
                                    <th class="text-900">Subtotal:</th>
                                    <td class="fw-semi-bold"><?= $invoiceData["subtotal"] ?></td>
                                </tr>
                                <tr>
                                    <th class="text-900">Tax 8%:</th>
                                    <td class="fw-semi-bold"><?= $invoiceData["tax"] ?></td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-900">Total:</th>
                                    <td class="fw-semi-bold"><?= $invoiceData["total"] ?></td>
                                </tr>
                                <tr class="border-top border-top-2 fw-bolder">
                                    <th class="text-900">Amount Due:</th>
                                    <td class="text-900"><?= $invoiceData["amount-due"] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->
    <?php include("scripts.php"); ?>
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