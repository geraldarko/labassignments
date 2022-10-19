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

    <title>Register To Shoppn</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../images/shoppn.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            
            <h3>Register to <strong>Shoppn</strong></h3>
            <p class="mb-4">Free shipping on millions of items. Welcome to Shoppn</p>
            <form action="./registerprocess.php" method="POST">

              <div class="form-group first">
                <label for="fullname">Fullname</label>
                <input type="text" class="form-control" placeholder="Enter your fullname" id="fullname" name="fullname">
              </div>

              <div class="form-group last mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter your email" id="email" name="email">
              </div>

              <div class="form-group first">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password"
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                title="Must contain at least one number and one uppercase 
                and lowercase letter, and at least 6 or more characters" required>
              </div>

              <div class="form-group last mb-3">
                <label for="country">Country</label>
                <input type="text" class="form-control" placeholder="Enter your country" id="country" name="country">
              </div>

              <div class="form-group last mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" placeholder="Enter your city" id="city" name="city">
              </div>

              <div class="form-group first">
                <label for="contact">Contact Number</label>
                <input type="text" class="form-control" placeholder="Enter your contact" id="contact" name="contact">
              </div>

              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <button name="submit" id="button" class="button"> Register </button>

            </form>
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