<?php

require("../controllers/product_controller.php");

include("../settings/core.php");
if (logged_in() == false){
  header('Location: ../index.php');
}
else {

?>

<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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