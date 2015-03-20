<?php
include 'DBConfig.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysql_real_escape_string($_GET['code']);

	$c=mysql_query("SELECT id FROM emailSubscribtion WHERE activationcode='$code'");

		if(mysql_num_rows($c) > 0)
		{

		$count=mysql_query("SELECT id FROM emailSubscribtion WHERE activationcode='$code' and status='0'");

		if(mysql_num_rows($count) == 1)
		{
    		
		 

    		mysql_query("UPDATE emailSubscribtion SET status='1' WHERE activationcode='$code'");
    		

    			 
   		 }
    	else
    		{
			 

    		}

 		}
  	else
    	{
			$msg ="Wrong activation code.";
    	}

}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-US"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
    <!--  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
  <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
  <title>Better the Game  </title>
  <meta name="description" content="">

  <meta name="author" content="">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

   

  <script src="content/themes/assets/js/jquery-1.9.0.min.js"></script>

  <link rel="stylesheet" type="text/css" href="content/themes/assets/css/new-subscription-page.css">
</head>
  <body class="loaded">
    
    
      <!-- body starts here -->
      <div class="form-navbar">
        
      </div>
      <div id="wraps">
        <div id="shorts">
          <div id="actions">
            <div class="holder-text">
              <h4>
                Your'e  Awesome !! Congratulations you have now successfully subscribed to our news letter 
              </h4>
                
            </div>
          </div>
        </div>
      </div>
      
      <div class="textField">
        
      </div>
      <footer>
        
      </footer>
      <!-- body ends here -->

      <?php 
        //require_once('mainFooter.php'); 
      ?>
  </body>
</html>



<!-- 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Helix Tech - Solutions made Possible! </title>
    <meta name="description" content="">

    <meta name="author" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php

     //require_once('mainHeader.php'); ?>

      <link rel="stylesheet" type="text/css" href="content/themes/assets/css/subscription-styles.css">
  </head>
  <body>
    <center>
      <div class="out-box">
        <div class="outer-border"> 
          <div style="display:inline-block;position:relative;">
            <img src="http://helixtech.in/content/themes/icons/helixlogo.png">
          </div>
          <div style="display:inline-block;">
            <h2>Helix Tech NewsLetter Service</h2>
          </div>

          <p style="margin-left:10px;">
            Your'e  Awesome !! Congratulations you have now successfully subscribed to our news letter 
          </p>

            click <a href="unsub_form.php" style="color:#afcd47;">here</a> to unsubscribe
            <br>
          <p style="margin-left:10px;">
            for any other queries regarding our news letter please write to us at info@helixtech.in
          </p>    
        </div>

        <div class="footer-text" style="width:100%;">
          <div class="left" > 
           <a href="#" >Terms of Service</a> |<a href="#" >Privacy Policy</a>
          </div>
          <div class="right" >  
            &copy; 2013 Helixtech
          </div>
        </div>
      </div>
    </center>
  </body>    
</html>
 -->