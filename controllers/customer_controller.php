<?php
//connect to the user account class
include("../classes/customer_class.php");
require("../functions/function.php");




//--INSERT--//
function add_customer_ctrl($a, $b, $c, $d, $e, $f){

// creating an instance
  $add = new customer_class;

// return method
  $run_query =  $add -> insert_customer($a, $b, $c, $d, $e, $f);

  if ($run_query) {
    return $run_query; 
  } else {
    return false; 
  }
}




//--SELECT--//
//LOGIN
function login_customer_ctrl($a, $b){

  // creating instance
  $login = new customer_class();

  // return method
  $data = $login -> login_customer($a);
  if (verify_pass($data['customer_pass'], $b) == true) {
    return $data;
  }
  return null;
}

function user_email_ctrl($cid){

  // creating instance
  $user_email = new customer_class();

  // return method
  $data = $user_email -> user_email($cid);
    return $data;
}
//--UPDATE--//

//--DELETE--//

?>
