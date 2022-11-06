<?php
require("../controllers/product_controller.php");
include("../settings/core.php");

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pcat = $_POST['category'];
    $pbrand = $_POST['brand'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdescr'];
    $pimage = $_POST['pimage'];
    $pkey = $_POST['pkey'];

   /*  echo ($pcat );
    echo ($pbrand );
    echo ($ptitle );
    echo ($pprice );
    echo ($pdesc );
    echo ($pimage );
    echo ($pkey ); */
    
    $pid = $_POST['pid'];
    echo($pid);
    $check_update = update_all_product_ctrl($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkey);
    if ($check_update) {
        header("Location: ../view/product.php");
    }
    else{
        return false;
    }
}

/* if (logged_in() == false){
  header('Location: ../index.php');
}
else { */
?>