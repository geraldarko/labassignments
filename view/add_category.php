<?php
include("../controllers/product_controller.php");
include("../settings/core.php");

$cat_id = $_GET['cat_id'];
$category_detail = select_category_ctrl($cat_id);


//initiating a server to get the post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $Cname_update = $_POST['update_category'];
  $check_update = update_all_category_ctrl($cat_id, $Cname_update);
  if ($check_update) {
    header("location: ../view/category.php");
  } else {
    return false;
  }
}


if (logged_in() == false) {
  header('Location: ../index.php');
} else {

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Category</title>
  </head>

  <body>
    <form method="POST">
      <div class="container">
        <input type="hidden" name="category_id" value="<?php echo $cat_id ?>">

        <h3><label for="text"><b>Category Name</b></label><br></h3>
        <input type="text" placeholder="Update Category Name" name="update_category" id="update_category" value="<?php echo ($category_detail['cat_name']) ?>">

        <button type="submit" name="submit" class="update_category">Update Category</button>

      </div>
    </form>
  </body>

  </html>

<?php
}
?>