<?php require("../controllers/product_controller.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../css/search.css">
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only"></span></a>
        <form action="product_search_result.php" method="GET">
            <input type="text" placeholder="Search by title..." name="search" id="search">
            <button type="submit"><b>Search</b></button>
        </form>
    </nav>

    <?php
    $search = $_GET['search'];


    $product_search = search_products_ctrl($search);

    foreach ($product_search as $product_one) {
        $product_id = $product_one['product_id'];
        $product_name = $product_one['product_title'];

    ?>


        <div class="container">
            <br>


            <div class="container page-wrapper">
                <div class="page-inner">
                    <div class="row">
                        <div class="el-wrapper">
                      
                            <div class="box-up">
                                <img class="img" src="" alt="">
                                <div class="img-info">
                                    <div class="info-inner">
                                        <span class="p-name"><?php echo $product_one['product_title'] ?></span>
                                        <span class="p-company"><?php echo $product_one['product_keywords'] ?></span>
                                       
                                    </div>
                                    <div class="a-size"><?php echo $product_one['product_desc'] ?></span></div>
                                </div>
                            </div>

                            <div class="box-down">
                                <div class="h-bg">
                                    <div class="h-bg-inner"></div>
                                </div>

                                <a class="cart" href="#">
                                    <span class="price">GH₵:<?php echo $product_one['product_price'] ?></span>
                                    <span class="add-to-cart">
                                        <span class="txt">Add To Cart</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    <?php } ?>

</body>

</html>