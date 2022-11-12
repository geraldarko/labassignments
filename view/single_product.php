<?php require("../controllers/product_controller.php");

include("../settings/core.php");
if (logged_in() == false){
  header('Location: ../index.php');
}
else {
  if (isset($_SESSION['name']) && $_SESSION['role'] == '1') {	
    ?>
  
    <button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button> 
    
    <button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button>

    <button type="button" onclick = "document.location= 'homepage.php'"><b>Home</b></button>
    
    <button type="button" onclick = "document.location= 'brand.php'"><b>Brand</b></button>
    
    <button type="button" onclick = "document.location= 'category.php'"><b>Category</b></button>
    
    <button type="button" onclick = "document.location= 'product.php'"><b>Add Product</b></button>	
    
    <button type="button" onclick = "document.location= ''"><b>All Products</b></button>

    <form action="product_search_result.php" method="GET">
    <input type="text" placeholder="Search by title" name="search" id="search">
      <button type="submit"><b>Search</b></button> 
     
    <?php } 
    
  if (isset($_SESSION['name']) && $_SESSION['role'] == '2'){
    ?> 
    <button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button> 
    
    <button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button>	
    
    <button type="button" onclick = "document.location= ''"><b>All Products</b></button>	
    
    <button type="button" onclick = "document.location= ''"><b>Carts</b></button>
  
    <form action="product_search_result.php" method="GET">
    <input type="text" placeholder="Search by title" name="search" id="search">
      <button type="submit"><b>Search</b></button> 
      
  
     
        <?php }}
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
<br>
<br>
<?php


    $pid = $_GET['id'];
        
    $product_one = select_product_ctrl($pid);

            $product_id = $product_one['product_id'];
            $product_name = $product_one['product_title'];
?>



<div class="container">
  
  <div class="card-columns">
    <div class="card">

     <img class="img" src=<?php echo $product_one['product_image']?> alt="" style="width: 100%; height: 225">
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
