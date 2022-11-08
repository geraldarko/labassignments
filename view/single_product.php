<?php require("../controllers/product_controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Single Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> 
 
<?php


    $pid = $_GET['id'];
        
    $product_one = select_product_ctrl($pid);

            $product_id = $product_one['product_id'];
            $product_name = $product_one['product_title'];
?>

<div class="container">
  
  <div class="card-columns">
    <div class="card bg-primary">

      <img src="<?php echo $product_one['product_image']  ?>" style="width: 350px; height: 150px">
      <div class="card-body text-center">
        <p class="card-text"><?php echo $product_one['product_title']?></p>
        <p class="card-text"><b>$<?php echo $product_one['product_price']?></b></p>
        <p class="card-text"><?php echo $product_one['product_desc']?></p>
        <p class="card-text"><?php echo $product_one['product_keywords']?></p>
       
        <button type="button" onclick = "document.location= ''"><b>Add to Cart</b></button> 
      </div>
    </div>   
    
  </div>
</div>

</body>
</html>
