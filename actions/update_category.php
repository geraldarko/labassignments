<?php
include("../controllers/product_controller.php");

//retrieving the updated value 
if(isset($_POST['submit'])){
    $cat_id =$_POST['category_id'];
    $cat_name =$_POST['update_category'];

    $result =  update_all_category_ctrl($cat_id, $cat_name);
    
    if($result){
        // header('location: ../view/category.php');
        echo "success";
    }
}

?>
