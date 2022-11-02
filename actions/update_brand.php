<?php
include("../controllers/product_controller.php");

//retrieving the updated value 
if(isset($_POST['submit'])){
    $brand_id =$_POST['brand_id'];
    $brand_name =$_POST['update_brand'];

    update_all_brands_ctrl($brand_id, $brand_name);
    header('Location: ../view/brandmgt.php');
}

?>