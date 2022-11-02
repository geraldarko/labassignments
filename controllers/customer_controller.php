<?php
//connect to the user account class
include("../classes/customer_class.php");
require("../functions/function.php");




//--INSERT--//
function addcustomer_ctrl($cus_name, $cus_email, $cus_pass, $cus_country, $cus_city, $cus_contact){

// creating an instance
  $add = new customerclass;

// return method
  $run_query =  $add -> insertcustomer($cus_name, $cus_email, $cus_pass, $cus_country, $cus_city, $cus_contact);

  if ($run_query) {
    return $run_query; 
  } else {
    return false; 
  }
}


function logincustomer($cus_email){
  $login = new customerclass();
  $data = $login -> logincustomer($cus_email);
  return $data;
  
}


//--SELECT--//
//LOGIN
function login_customer_ctrl($cus_email, $cus_pass){



  // creating instance
  $login = new customerclass();

  $records = array();
  // return method
  $data = $login -> logincustomer($cus_email);

  if ($data) {
    if (verify_pass($data['customer_pass'], $cus_pass) == true) {
      return true;
    }else {
      return false;
    }
  } else {
    return false; 
  }
  
  
}

function user_email_ctrl($cid){

  // creating instance
  $user_email = new customerclass();

  // return method
  $data = $user_email -> user_email($cid);
    return $data;
}


?>
