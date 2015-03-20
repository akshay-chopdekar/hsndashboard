<!DOCTYPE html>
<html lang="en">
<?php session_start();?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BetterTheGame DashBoard</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="css/main.css" rel="stylesheet">
    
    <!-- Raleway medium font -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!--     <h1>Hello, world!</h1> -->
  <div class="container-fluid">
    <div class="center-div">
      <img src="images/logo.png" class="img-responsive center-block">
      <img src="images/text_img.png" class="img-responsive center-block">
      <h4 class="text-center welAdmin">Welcome Admin!</h4>
      <form class="navbar-form" method="post" action="php/usercheck.php">
        <div class="form-group">
          <input name="password" type="password" class="form-control text-center password" placeholder="password">
          <h5 class="error text-center">
            <?php 
            if (isset($_SESSION['error']) ) {
            echo $_SESSION['error'];
            }
            else
            {
              //echo "nd";
            }
            unset($_SESSION['error']);
            ?>
          </h5>
        </div>
        <br>
        <button type="submit" class="btn btn-default center-block login">LOGIN</button>
      </form>
      <div class="text-center">
        <span class="pb">Powered by</span>
        <a target="_blank" href="http://www.helixtech.co"><span class="helixTech">Helix Tech</span></a>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>