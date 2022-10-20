<?php
require("../controllers/customer_controller.php");

if (isset($_POST["submit"])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    /*$image = $_POST['image'];*/

    // encryption of password using hash.
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // check whether function works
    $check = addcustomer_ctrl($name, $email, $hash, $country, $city, $contact);

    if ($check) {
        echo "Registration Successful";
        header("Location: ../login/login.php");
    }else{
        echo "not working";
    }

}


?>