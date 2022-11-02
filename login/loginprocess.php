<?php
require("../controllers/customer_controller.php");
require("../settings/core.php");



/* if (isset($_POST["submit"])) {
    $login_email = $_POST['loginemail'];
    $login_password = $_POST['loginpassword'];

    // check whether function works in the customer ctrl
    $login_check = login_customer_ctrl($login_email, $login_password);


    if (!$login_check) {
        echo "Login failed";
        //header("Location: ../index.php");
    }

    else {
        echo "login success";
        session_login ($login_check['customer_id'], $login_check['user_role']);
        header("Location: ../view/homepage.php");
    }
} */

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
    
    //     if ($_SESSION['role']==0) header("Location:../view/homepage.php");
    //     else header ("Location:../view/homepage.php");
    //     }
    // else{
    //     echo" <script> alert ('Login Failed') </script> ";
    
    //     // header("Location:login.php");
        
    //     $_SESSION ["error_message"] = $errorlogin;
    }
    // $match = password_verify($password,$password_hash);
}

// $password_hash = $results ["customer_pass"];

// $errorlogin = "Incorrect Login Credentials";

// $match = password_verify($password,$password_hash);

// if ($match == true){
//     $_SESSION['name'] = $results['customer_name'];
//     $_SESSION['customer_id'] = $results['customer_id'];
//     $_SESSION['customer_email'] = $results['customer_email'];
//     $_SESSION['role'] = $results['user_role'];

//     if ($_SESSION['role']==0) header("Location:../view/homepage.php");
//     else header ("Location:../view/homepage.php");
//     }
// else{
//     echo" <script> alert ('Login Failed') </script> ";

//     // header("Location:login.php");
    
//     $_SESSION ["error_message"] = $errorlogin;
// }
?>