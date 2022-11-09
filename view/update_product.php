<?php
require("../controllers/product_controller.php");
include("../settings/core.php");

$pid = $_GET['id'];
$product_detail = select_product_ctrl($pid);

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pcat = $_POST['category'];
    $pbrand = $_POST['brand'];
    $ptitle = $_POST['ptitle'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdescr'];
    $pimage = $_POST['pimage'];
    $pkey = $_POST['pkey'];
    

    $check_update = update_all_product_ctrl($pid, $pcat, $pbrand, $ptitle, $pprice, $pdesc, $pimage, $pkey);
    if ($check_update) {
        header("Location: ../view/view_product.php");
    }
    else{
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <style> form {padding:0.5rem;font: 1em sans-serif;}</style>
    <style> input {padding: 0.5rem; font: 1em sans-serif;}</style>
    <title>Update</title>
</head>
<body>
    <form action="../actions/updateproductprocess.php" method="POST" enctype="multipart/form-data">
  <div class="container">
  <button><a href="product.php">Back</a></button>
    <h1>Update Product</h1>
    <p>Please fill in this form to update a product</p>
    
<label for="category"><b>Select a category:</b></label>

<br><br>

        <select name="category" id="category">
        <?php 
        
            $cat_option = select_all_category_ctrl();

            if ($cat_option) {
                foreach($cat_option as $cat_one){
                    $cat_id = $cat_one['cat_id'];
                    $cat_name = $cat_one['cat_name'];

                    echo "<option value = $cat_id>$cat_name</option>";
                }

            }
            else {echo "<option value = 'not available'>Category not found</option>";
            }

        ?>
        </select>

    <br><br>

    <label for="brand"><b>Select a brand:</b></label>

<br><br>

        <select name="brand" id="brand">
        <?php 
        
            $brand_option = select_all_brands_ctrl();

            if ($brand_option) {
                foreach($brand_option as $brand_one){
                    $brand_id = $brand_one['brand_id'];
                    $brand_name = $brand_one['brand_name'];

                    echo "<option value = $brand_id>$brand_name</option>";
                }

            }
            else {echo "<option value = 'not available'>Brand not found</option>";
            }

        ?>
        </select>

        <br><br>

    <label for="text"><b>Product Title</b></label><br>
    <input type="text" placeholder="Enter Product title" name="ptitle" id="ptitle" value="<?php echo $product_detail['product_title'] ?>" required>

    <br><br>

    <label for="text"><b>Product Price (GH₵)</b></label><br>
    <input type="number" placeholder="Enter product price" name="pprice" id="pprice" value="<?php echo $product_detail['product_price'] ?>" required>

    <br><br>

   <label for="text"><b>Product Description</b></label><br>
    <input type="text" placeholder="Enter description" name="pdescr" id="pdescr" value="<?php echo $product_detail['product_desc'] ?>" required>

    <br><br>

    <label for="image"><b>Product Image</b></label><br>
    <input type="file" name="editpimage" id="pimage" value="<?php echo $product_detail['product_image'] ?>">

    <br><br>

    <label for="text"><b>Product Keyword</b></label><br>
    <input type="text" placeholder="Enter product keyword" name="pkey" id="pkey" value="<?php echo $product_detail['product_keywords'] ?>" required>

    <br><br>

    <input type="hidden" name= "pid" value="<?php echo $pid?>">
    <button type="submit" class="registerbtn" name="update_product">Update Product</button>
  </div>

  <script>"../js/form_validation.js"</script>
</body>
</html>

<?php
/* } */
?>