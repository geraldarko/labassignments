<?php

require("../controllers/product_controller.php");

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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <style> form {padding:0.5rem;font: 1em sans-serif;}</style>
    <style> input {padding: 0.5rem; font: 1em sans-serif;}</style>
  
	<title>Products</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<br>
<table>
    <br>
    <br>
  <tr>
    <th> Category </th>
    <th> Brand </th>
    <th> Product Title </th>
    <th> Product Price</th>
    <th> Product Description</th>
    <th> Product Image</th>
    <th> Product Keyword</th>
    <th> Add To Cart </th>
  </tr>
  <?php 
    $productlist = select_all_product_ctrl();
    foreach($productlist as $showproduct):

  ?>
  <tr>
    <td> <?php $cat = select_category_ctrl($showproduct['product_cat']); echo $cat['cat_name'];?></td>
    <td> <?php $brand = select_brand_ctrl($showproduct['product_brand']);echo $brand['brand_name'];?></td>
    <td> <?php echo $showproduct['product_title']?></td>
    <td> <?php echo $showproduct['product_price']?></td>
    <td> <?php echo $showproduct['product_desc']?></td>
    <td> <img src="<?php echo $showproduct['product_image']?>" width="50" height="50"></td>
    <td> <?php echo $showproduct['product_keywords']?></td>
    <td><div><a href=''> <span class="fa fa-cart-plus"></span></a></div></td>
  </tr>
  <?php
    endforeach;
  ?>
</table>
</body>
</html>