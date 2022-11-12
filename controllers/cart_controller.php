<?php
//connect to the user account class
include_once("../classes/cart_class.php");

//sanitize data
// function cleanText($data) 
// {
//   $data = trim($data);
//   //$data = stripslashes($data);
//   //$data = htmlspecialchars($data);
//   return $data;
// }



//--INSERT--//


// CART
function add_cart_ctrl($p_id, $ip_add, $c_id){

  //creating an instance
  $add_cart = new cart_class();

  // return method
  return $add_cart -> insert_cart($p_id, $ip_add, $c_id);
}

function select_cart_ctrl($c_id){

  //creating an instance
  $select_cart = new cart_class();

  // return method
  return $select_cart -> select_cart($c_id);
}

// count cart
function count_cart_ctrl($cid){

  $count_cart = new cart_class();

  return $count_cart -> count_cart($cid);
}

// count one cart item
function count_one_cart_ctrl($cid){

  $count_one_cart = new cart_class();

  return $count_one_cart -> count_one_cart($cid);
}

function duplicate_cart_ctrl($pid, $cid){

  $duplicate_cart = new cart_class();

  return $duplicate_cart -> duplicate_cart($pid, $cid);
}

function duplicate_one_cart_ctrl($pid, $cid){

  $duplicate_one_cart = new cart_class();

  return $duplicate_one_cart -> duplicate_one_cart($pid, $cid);
}

function update_cart_qty_ctrl($pid, $cid){
  $update_cart = new cart_class();
  return $update_cart -> update_cart_qty($pid, $cid);
}

function update_more_cart_qty_ctrl ($pid, $cid){
  $update_more_cart = new cart_class();
  return $update_more_cart -> update_more_cart_qty($pid, $cid);
}

  // 
function delete_cart_qty_ctrl($pid, $cid){
  $delete_cart = new cart_class();
  return $delete_cart -> delete_cart_qty($pid, $cid);
}

function update_textbox_ctrl($pid, $cid, $txtbox){
  $update_textbox = new cart_class();
  return $update_textbox -> update_textbox($pid, $cid, $txtbox);
}


function every_cart_item_ctr($cid){
  $every_cart = new cart_class();
  return $every_cart -> every_cart_item($cid);
}

function total_price_ctrl($cid){
  $total_price = new cart_class();
  return $total_price -> total_price($cid);
}

function add_payment_detail_ctrl($email, $amt){
  $add = new cart_class();

  return $add -> insert_detail($email, $amt);
}

function insert_order_ctrl($cid, $invoice, $date){
  $add = new cart_class();

  return $add -> insert_order($cid, $invoice, $date);
}

function insert_payment_ctrl($amt, $cid, $oid, $date){
  $insert_payment = new cart_class();

  return $insert_payment -> insert_payment($amt, $cid, $oid, $date);
}

function order_id_ctrl(){
  $order_id = new cart_class();

  return $order_id -> order_id();
}

function order_date_ctrl(){
  $order_date = new cart_class();

  return $order_date -> order_date();
}

function get_from_cart_ctrl($cid){
  $get_cart = new cart_class();

  return $get_cart -> get_from_cart($cid);
}

function insert_order_details_ctrl($oid, $pid, $qty){
  $insert_orderdetails = new cart_class();

  return $insert_orderdetails -> insert_order_details($oid, $pid, $qty);
}

function delete_from_cart($cid,$pid){
  $delete_from_cart = new cart_class;

  return $delete_from_cart -> delete_from_cart($cid,$pid);

}

?>
