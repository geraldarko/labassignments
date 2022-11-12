	<!-- landing/index page -->
	<?php

	

	require("../settings/core.php");

	// session_start();
	// Var_dump($_SESSION);

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
		<title>Shoppn Homepage</title>
	</head>


	<body>

	<?php

	//checking if the user is an admin so they can access admin privileges.

if (isset($_SESSION['name']) && $_SESSION['role'] == '1') {	
	?>

	<nav class="navbar navbar-light bg-light">
	<button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button> 
	
	<button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button>

	<button type="button" onclick = "document.location= ''"><b>Home</b></button>
	
	<button type="button" onclick = "document.location= 'brand.php'"><b>Brand</b></button>
	
	<button type="button" onclick = "document.location= 'category.php'"><b>Category</b></button>
	
	<button type="button" onclick = "document.location= 'product.php'"><b>Add Product</b></button>	
	
	<button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>
	 
	<form action="product_search_result.php" method="GET">
	<input type="text" placeholder="Search by title..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 
	<?php } 
	
if (isset($_SESSION['name']) && $_SESSION['role'] == '2'){
	?> 
	<button type="button" onclick = "document.location= '../actions/logout.php'"><b>Logout</b></button> 
	
	<button type="button" onclick = "document.location= '../login/register.php'"><b>Register</b></button>	
	
	<button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>	
	
	<button type="button" onclick = "document.location= 'cart.php'"><b>Carts</b></button>

	<form action="product_search_result.php" method="GET">
	<input type="text" placeholder="Search by title..." name="search" id="search">
    <button type="submit"><b>Search</b></button> 

	 
			<?php }?>
	</nav>
	</body>

	

	
	</html>	