<?php
include("../controllers/product_controller.php");
include("../settings/core.php");

$bid = $_GET['bid'];
$brand_detail = select_brand_ctrl($bid);

//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Bname_update = $_POST['update_brand'];
    $check_update = update_all_brands_ctrl($bid, $Bname_update);
    if ($check_update) {
        header("location: ../view/brand.php");
    }
    else{
        return false;
    }
}

if (logged_in() == false){
  header('Location: ../index.php');
}
else {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Brand</title>
</head>
<body>
 <form method="POST">
  <div class="container">
    <input type="hidden" name="brand_id" value="<?php echo($bid)?>">
    <button><a href="brand.php">Back</a></button>
    <br><br>
    <h3><label for="text"><b>Brand Name</b></label><br></h3>
    <input type="text" placeholder="Update Brand Name" name="update_brand" id="update_brand" value="<?php echo($brand_detail['brand_name'])?>">

    <button type="submit" name = "submit" class="update_brand">Update Brand</button>

  </div>
    </form>
  </body>
</html>

<?php
}
?>