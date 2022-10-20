<?php
require("../controllers/customer_controller.php");
require("../settings/core.php");
session_start();


if (isset($_POST["submit"])) {
    $login_email = $_POST['loginemail'];
    $login_password = $_POST['loginpassword'];

    // check whether function works
    $login_check = login_customer_ctrl($login_email, $login_password);


    if (!$login_check) {
        echo "Login failed";
        //header("Location: ../index.php");
    }

    else {
        echo "login success";
        session_login ($login_check['customer_id'], $login_check['user_role']);
        header("Location: ../loginsucess.php");
    }
}
?>