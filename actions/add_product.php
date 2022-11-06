<?php
require("../controllers/product_controller.php");
require("../functions/function.php");

if(isset($_POST['add_product'])){
    $pcat = $_POST['category'];
    $pbrand = $_POST['brand'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdescr = $_POST['pdescr'];
    //$pr_image = $_POST['pimage'];
    $pkey = $_POST['pkey'];
    $pimage = $_FILES['pimage']["name"];
    $tmp = $_FILES['pimage']["tmp_name"];

//     echo $ptitle;
//     echo $pcat;
        //print_r($tmp);
//     echo $pimage;

     $folder_path = file_upload("images", "product", $tmp, $pimage);





 // check whether function works
 $check= add_product_ctrl($pcat, $pbrand, $ptitle, $pprice, $pdescr, $folder_path, $pkey);

 if ($check) {
 	echo "Entry Successful";
 	header("Location: ../view/product.php");
 }

 else{
 	echo "not working";
 }


}

?>