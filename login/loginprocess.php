<?php
require("../controllers/customer_controller.php");
require("../settings/core.php");


if (isset($_POST["submit"])) {
    $password = $_POST['loginpassword'];
    $cus_email =$_POST['loginemail'];
    $logincheck = login_customer_ctrl($cus_email,$password);
    
    if ($logincheck == true){
        $results = logincustomer($cus_email);
        $_SESSION['name'] = $results['customer_name'];
        $_SESSION['customer_id'] = $results['customer_id'];
        $_SESSION['customer_email'] = $results['customer_email'];
        $_SESSION['role'] = $results['user_role'];
        header("location: ../view/homepage.php");
    }
}

?>