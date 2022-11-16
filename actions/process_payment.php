<?php
require("../controllers/cart_controller.php");

session_start();

$cid = $_SESSION['customer_id'];


$email = $_POST['email'];
$amount = $_POST['amount'];


$url = "https://api.paystack.co/transaction/initialize";
$fields = [
  'email' => $email,
  'amount' => $amount
  
];
$fields_string = http_build_query($fields);
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Authorization: Bearer sk_test_6f41db942637c6206312550830bdc89659901b89",
  "Cache-Control: no-cache",
));

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);

/*                      ORDER                   */
$invoice = mt_rand();
$date = date("Y-m-d");

$order_entry = insert_order_ctrl($cid, $invoice, $date);


if ($order_entry) {
    echo "order entry successful";    
}
else{
    echo "order entry failed";
}

/*          PAYMENT      */
$oid = order_id_ctrl();
$ooid=$oid["order_id"];
$odate = order_date_ctrl();
$oodate = $odate["order_date"];
$order_id = $oid['order_id'];
$order_date = $odate['order_date'];

$payment_entry = insert_payment_ctrl($amount, $cid, $order_id, $order_date);

if ($payment_entry) {
    echo "payment entry successful";    
}
else{
    echo "payment entry failed";
}


/* MOVE FROM CART */
$cart_id = get_from_cart_ctrl($cid);
//print_r($cart_id);
$pid = $cart_id['p_id'];

$qty = $cart_id['qty'];


$insert_orderdetails = insert_order_details_ctrl($ooid, $pid, $qty);

if ($insert_orderdetails) {
    echo "order detail moved successful";    
}
else{
    echo "order detail move failed";
}

$delete_cart_item = delete_from_cart($cid, $pid);

if ($delete_cart_item) {
    echo "cart item deleted successful";    
}
else{
    echo "cart item delete failed";
}

?>
