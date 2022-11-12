<?php
require("../controllers/product_controller.php");
include("../settings/core.php");

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
	<button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button> 
	
	<button type="button" onclick = "document.location= 'login/register.php'"><b>Register</b></button>	
	
	<button type="button" onclick = "document.location= ''"><b>All Products</b></button>	
	
	<button type="button" onclick = "document.location= ''"><b>Carts</b></button>

	<form action="view/product_search_result.php" method="GET">
	<input type="text" placeholder="Search by title..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 

	 
			<?php }

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Register</title>
</head>
<body>
    <form action="../actions/add_product.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    
  <center>
    <h1>Add Product</h1>
    <p>Please fill in this form to add a product</p>
    
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
    <input type="text" placeholder="Enter Product title" name="ptitle" id="ptitle" required>

    <br><br>

    <label for="text"><b>Product Price (GH₵)</b></label><br>
    <input type="number" placeholder="Enter product price" name="pprice" id="pprice" required>

    <br><br>

   <label for="text"><b>Product Description</b></label><br>
    <input type="text" placeholder="Enter description" name="pdescr" id="pdescr" required>

    <br><br>

    <label for="image"><b>Product Image</b></label><br>
    <input type="file" name="pimage" id="pimage">

    <br><br>

    <label for="text"><b>Product Keyword</b></label><br>
    <input type="text" placeholder="Enter product keyword" name="pkey" id="pkey" required>

    <br><br>

    <button type="submit" class="registerbtn" name="add_product">Add Product</button>
    <br><br>
    </center>
    </div>


  <center>
  <table>
  <tr>
    <th> Category </th>
    <th> Brand </th>
    <th> Product Title </th>
    <th> Product Price (GH₵)</th>
    <th> Product Description</th>
    <th> Product Image</th>
    <th> Product Keyword</th>
    <th> Update</th>
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
    <td><div><a href='../view/update_product.php?id=<?php echo $showproduct['product_id'];?>'> <span class="fa fa-pencil"></span></a></div></td>
  </tr>
  <?php
    endforeach;
  ?>
</table>
</center>

<?php


?>

  

  

  <script>"../js/form_validation.js"</script>
</body>
</html>

