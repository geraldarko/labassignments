<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Shoppn</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../images/shoppn.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Shoppn</strong></h3>
            <p class="mb-4">Free shipping on millions of items. Welcome to Shoppn</p>
            <form action="./loginprocess.php" method="POST">
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter your email" name="loginemail">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your Password" name="loginpassword">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <button name="submit" id="button" class="button"> Login </button>
             
            </form>

            
            <button id="button" class="button m-1"> <a href="register.php" style="color:white; text-decoration:none;"> Register </a></button> 
           


            
          </div>
        </div>
          
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>