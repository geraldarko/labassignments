<?php
require("../controllers/product_controller.php");
require("../functions/function.php");

if(isset($_POST['add_product'])){
    $pcat = $_POST['category'];
    $pbrand = $_POST['brand'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdescr = $_POST['pdescr'];
    $pkey = $_POST['pkey'];


    //adding image
    $pimage = $_FILES['pimage']["name"];
    $targetdir = "../images/product/".$pimage;
    $image = $targetdir.$pimage;
    $tmp = $_FILES['pimage']["tmp_name"];
    
    if(move_uploaded_file($tmp,$targetdir)){
        //echo "Image moved";
        $check= add_product_ctrl($pcat, $pbrand, $ptitle, $pprice, $pdescr, $targetdir, $pkey);

        if ($check) {
            echo "Entry Successful";
            header("Location: ../view/product.php");
        }

        else{
            echo "not working";
        }
    }else{
        echo "Image not moved";
    }

    //  $folder_path = file_upload("images", "product", $tmp, $pimage);





 //check whether function works
 


}

?>