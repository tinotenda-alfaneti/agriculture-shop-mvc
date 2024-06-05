<?php
    include_once("../settings/core.php");
    include_once("../controllers/cart_controller.php");

    $curl = curl_init();
    $reference = $_GET["ref"];
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_ea99e27baf869d5a088cee1b7c896b449adf5990",
        "Cache-Control: no-cache",
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    
    if ($err) {
        $_SESSION['paymentmsg'] = "Payment Error";
        header('Location:../view/cart.php');
    } else {
        $cid=$_SESSION['id'];
        $invoice=mt_rand();
        $date=date("Y/m/d");
        $status="pending";
        $amount=$_POST['amnt'];
        if(create_order_ctr($cid,$invoice,$date,$status)==TRUE){
            $result=show_cart_ctr($cid,0);
            $oid=show_order_ctr($cid,$invoice);
            
            $i=0;
            while($i<count($result)){
                order_details_ctr($oid['order_id'],$result[$i]['p_id'],$result[$i]['qty']);
                reduce_quantity_ctr($result[$i]['p_id']);
                $i++;
            }
            $status="success";
            if(deletecart_ctr($cid)==true){
                $result=get_order_ctr($invoice,$_SESSION['id']);
                if(update_order_ctr($result['order_id'],$status)==true){
                    save_payment_ctr($amount,$cid,$oid['order_id'],"GHC",$date);
                    $_SESSION['paymentmsg'] = "Order Placed Successfully";
                    $invoiceData = array(
                        'invoice_number' => $invoice,
                        'date' => $date,
                        'amount_due' => $amount,
                    );
                    header('Location: ../view/invoice.php?oid='.$oid['order_id']);
                    exit;
                }
                
                }

        }
    }
?>