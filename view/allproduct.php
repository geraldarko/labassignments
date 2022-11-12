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
    <th> View </th>
    <th> Add To Cart </th>
  </tr>

  <br>

  <button type="button" onclick = "document.location= 'cart.php'"><b>Cart</b></button>

  <br><br>
<?php
$cid = $_SESSION['customer_id'];

$count_cart = count_cart_ctrl($cid);
?>

<p> Total number of items in the cart: <b><?php echo $count_cart[0]['SUM(qty)'] ?></b></p>

  <br><br>

  <?php 
    $productlist = select_all_product_ctrl();
    foreach($productlist as $showproduct):
    
  ?>

<!-- <div class="container">
  
  <div class="card-columns">
    <div class="card bg">
       Image of the product
      <img src="<?php echo $showproduct['product_image']  ?>" style="width: 100%; height: 150px">
      <div class="card-body text-center">
        <p class="card-text"><?php echo $showproduct['product_title']?></p>
        <p class="card-text"><b>$<?php echo $showproduct['product_price']?></b></p>

        <form action="single_product.php" method="GET">
          <input type="hidden" name="id" value="<?php echo $showproduct['product_id'] ?>">
        <button type="submit"><b>View More</b></button> 
        </form>

        <form action="../actions/add_to_cart.php" method="GET">
         input type="hidden" name="pid" value="<?php echo $showproduct['product_id']?>"> 
        <button type="submit"><b>Add to Cart</b></button> 
        </form>
      </div>
    </div>   
    
  </div>
</div> -->

  <tr>
    <td> <?php $cat = select_category_ctrl($showproduct['product_cat']); echo $cat['cat_name'];?></td>
    <td> <?php $brand = select_brand_ctrl($showproduct['product_brand']);echo $brand['brand_name'];?></td>
    <td> <?php echo $showproduct['product_title']?></td>
    <td> <?php echo $showproduct['product_price']?></td>
    <td> <?php echo $showproduct['product_desc']?></td>
    <td> <img src="<?php echo $showproduct['product_image']?>" width="50" height="50"></td>
    <td> <?php echo $showproduct['product_keywords']?></td>
    <td><div><a href="single_product.php?id=<?php echo $showproduct['product_id'];?>"> <span class="fa fa-eye"></span></a></div></td>
    <form>
    <td><div><a href="../actions/add_to_cart.php?id=<?php echo $showproduct['product_id'];?>"> <span class="fa fa-cart-plus"></span></td>
    </form>
  </tr>
  <?php
    endforeach;
  ?>
</table>
</body>
</html>