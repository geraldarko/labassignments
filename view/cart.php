<?php 
require("../controllers/cart_controller.php");
session_start();

$cid = $_SESSION['customer_id'];

$count_cart = count_cart_ctrl($cid);
$every_item = every_cart_item_ctr($cid);
$total_price = total_price_ctrl($cid);
// print_r($total_price);


// $count_one_cart = count_one_cart_ctrl($cid);
// print_r($count_one_cart)

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
    <title>Cart</title>
</head>
<body>
<h1>Cart Items</h1>

<br><br>

<button type="button" onclick = "document.location= 'allproduct.php'"><b>All Products</b></button>
<p> Total number of items in the cart: <b><?php echo $count_cart[0]['SUM(qty)'] ?></b></p>

<br><br>
    

<?php
$cart_option = select_cart_ctrl();
//print_r($cart_option);
    
    //if ($product_option) {
        foreach($cart_option as $cart_one){
            // print_r($cart_one);
            $product_name = $cart_one['product_title'];
            // echo "$product_name";
            $product_price = $cart_one['product_price'];
            $product_desc = $cart_one['product_desc'];
            $product_image = $cart_one['product_image']; 

            //echo "<option value = $product_id>$product_name</option>";
        

    
    //else {echo "<option value = 'not available'>product not found</option>";
    
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $pid = $_POST['pid'];
        $txtbox = $_POST['cartitem'];

        $update_textbox = update_textbox_ctrl($pid, $cid, $txtbox);
        if ($update_textbox) {
          header("Location: cart.php");
      }
      else{
          return false;
      }

      }

?>

<div class="container">
  
  <div class="card">
    <div class="card">
      <!-- Image of the product-->
      <center><img src="<?php echo $cart_one['product_image']?>" style="width: 10%; height: 200px"</center>
      <div class="card-body text-center">
        <p class="card-text"><?php echo $cart_one['product_title']?></p>
        <p class="card-text"><b>$<?php echo $cart_one['product_price']?></b></p>
        
        <form method="POST">
        <label for="text"><b>Item Quantity</b></label><br>
        <input type="hidden" name="pid" value="<?php echo $cart_one['product_id'] ?>">
        <input type="number" name="cartitem" value="<?php echo $cart_one['qty']?>">
        <button type="submit"><b>Update</b></button>
        </form>

        <form action="../actions/remove_from_cart.php" method="GET">
          <input type="hidden" name="id" value="<?php echo $cart_one['product_id'] ?>">
          <br>
        <button type="submit" name="deleteProduct"><b>Delete</b></button> 
        </form>
        <br>
       <!--  <form action="../actions/add_to_cart.php" method="POST">
          <input type="hidden" name="pid" value="<?php //echo $cart_one['product_id']?>">
        <button type="submit"><b>Add to Cart</b></button> 
        </form> -->
      </div>
    </div>   
    
  </div>
</div> 
<?php }?>

<br>

<h3>Total Price: GHS <?php echo $total_price["SUM(cart.qty * products.product_price)"]?>.00</h3>
<button type="button" onclick = "document.location= 'payment.php'"><b>Checkout</b></button> 

</body>
</html>
