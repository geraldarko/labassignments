<?php

include("../controllers/product_controller.php");
// Retrieves the brand name and passes it into the add brand controller
$brand_name = $_POST['brand_name'];

$brand_check = add_brand_ctrl($brand_name);

if ($brand_check) {
	echo "Brand name inserted successfully";
	header('Location: ../view/brand.php');
}
else{
	echo "brand name insertion failed";
}

?>

