<?php 



include("../settings/core.php");
if (logged_in() == false){
  header('Location: ../index.php');
}
else {
  if (isset($_SESSION['name']) && $_SESSION['role'] == '1') {	
    ?>
    <center>
    <button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button> 
    
    <button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button>

    <button type="button" onclick = "document.location= 'homepage.php'"><b>Home</b></button>
    
    <button type="button" onclick = "document.location= 'brand.php'"><b>Brand</b></button>
    
    <button type="button" onclick = "document.location= 'category.php'"><b>Category</b></button>
    
    <button type="button" onclick = "document.location= 'product.php'"><b>Add Product</b></button>	
    
    <button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>
    </center>
    <?php } 
    
  if (isset($_SESSION['name']) && $_SESSION['role'] == '2'){
    ?> 
    <center>
    <button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button> 
    
    <button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button>	
    
    <button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>	
    
    <button type="button" onclick = "document.location= 'cart.php'"><b>Carts</b></button>
    
    <form action="view/product_search_result.php" method="GET">
    <input type="text" placeholder="Search by title..." name="search" id="search">
      <button type="submit"><b>Search</b></button> 
  </center>

  
  
        <?php }}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
</head>
<body>
    <center><h3>Payment Received, Thank you for shopping with us</h3></center>

    <img src="../images/shoppn.jpg" alt="" width="100%" height="100%">
</body>
</html>