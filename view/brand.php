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
    
    <button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>

    <?php } 
    
  if (isset($_SESSION['name']) && $_SESSION['role'] == '2'){
    ?> 
    <button type="button" onclick = "document.location= '../actions/logout/php'"><b>Logout</b></button> 
    
    <button type="button" onclick = "document.location= 'login/register.php'"><b>Register</b></button>	
    
    <button type="button" onclick = "document.location= ''"><b>All Products</b></button>	
    
    <button type="button" onclick = "document.location= ''"><b>Carts</b></button>
  
    <form action="view/product_search_result.php" method="GET">
    <input type="text" placeholder="Search by title..." name="search" id="search">
      <button type="submit"><b>Search</b></button> 
  
     
        <?php }?>




<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <style>th, td {border: 1px solid black;font: 1em sans-serif;padding: 1rem;}</style>
    <style> form {padding:0.5rem;font: 1em sans-serif;}</style>
    <style> input {padding: 0.5rem; font: 1em sans-serif;}</style>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Brand</title>
</head>
<body>
 <form action="../actions/brandprocess.php" method="POST">
  <div class="container">
    
    <br><br>

    <h3><label for="email"><b>Enter Brand Name</b></label><br></h3>
    <input type="text" placeholder="Enter Brand Name" name="brand_name" id="brand_name" required>

    <br><br>

    <button type="submit" class="subbutton">Submit Brand</button>

  </div>
</form>
<br>

<table>
        <th>Shoppn Brand List</th>
        <th>Update</th>
        <th>Delete</th>

    <?php
        $brandslist = select_all_brands_ctrl();
        foreach ($brandslist as $value) {
        $bid = $value['brand_id'];
    ?>
      
      <div class="css">
        <tr>
          <td>
            <!-- Making sure the initial name is displayed in the textbox -->
            <?php echo ($value['brand_name']);
          $bid = $value['brand_id'] ?></td>
          <td><div><a href='./add_brand.php?bid=<?php echo($bid);?>'> <span class="fa fa-pencil"></span></a></div></td>
          <td><div><a href='./delete_brand.php?bid=<?php echo($bid);?>'> <span class="fa fa-trash"></span></a></div></td>
</td>
        </tr>
        <div>
          
        </div>
    
        
      </div>

<?php

}}
?>
  
</table>
</body>
</html>