<?php session_start(); 
if(!isset($_SESSION[ 'userLogged'])) 
  { 
    header( "Location: ../index.php"); 
  } 
include("scripts/hotalinfo11.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DashBoard</title>

  <!-- Bootstrap -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../packages/DataTables/css/dataTables.bootstrap.css" />
  <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="../packages/DataTables/css/datatables.responsive.css" />
  <link rel="stylesheet" href="../packages/DataTables/css/input.css" />
  <link rel="stylesheet" href="../css/docs.min.css">
  <link href="../css/main.css" rel="stylesheet">


  <meta name="google-translate-customization" content="a4ab8ee26d0a3df4-93d4d732f591be4b-g4ca1c1bb516de0ac-e"></meta>

  <script type="text/javascript">
   function googleTranslateElementInit() {
     new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,tr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
   }
   </script>
  
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>
       
  <style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}
  .goog-te-gadget-simple{
    background-color:#D1DB2C;
    float: right;
  }
  </style>
  <style type="text/css">body {position: static !important; top:0px !important;}</style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <style>
  h5{
    margin-left: 15px;
    font-weight: bold;
  }

  input.checkMargin
  {
    margin-top: 10px;
  }
  .imageclass {
    border: 4px solid lightgreen;
  }
  .title {
    font-size: larger;
    font-weight: bold;
  }
  .table th.centered-cell,
  .table td.centered-cell {
    text-align: center;
  }
  .logo{
   height: 161px;
   width: 35%;
   margin: auto;
   display: block;
   padding-top: 11px;
  }
  p{
    margin-top:7px;
  }
  input.form-control{
    margin-top:7px;
  }
  input.zeroOneWidth{
   max-width: 100px; 
  }
  
  label.labelAlign{
    margin-top: 18px;
  }
  input.oneLine{
    margin-top:0px;
  }
  input#submit{
    max-width:180px;
    width:100%;
    font-size:14px;
    color: #fff;
      background-color: #337ab7;
      border-color: #2e6da4;
  }
  input#delete{
    max-width:180px;
    width:100%;
    font-size:14px;
    color:#fff;
    background-color:#f1695b;
  }
  .form-group{
    padding-top:40px;
  }
  ul#image{
    margin:auto;
    display:block;
  }
  input[type="file"] {
  display: block;
  margin: 15px 211px 10px 96px;
  }
  @media only screen and (min-width:768px){
    .form-horizontal .control-label{
      font-family:"Montserrat";
      font-size:13px;
      text-align:left;
    }
  }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-3 navColor" style="width:260px;padding-left: 0px;">
        <div class="block">
          <img class="center-block logo" src="../images/HSN_logo.png">
        </div>
    <ul class="nav">
           <li><a  href="hotelInfon.php">Hotel Info</a>
           </li>
           <li><a  href="categoryList11.php">Category List</a>
           </li>
           <li><a href="campaign.php">Promotion Type</a>
           </li>
           <li><a  href="promotionn.php">Promotion</a>
           </li>
           <li><a href="userReview1.php">User Reviews</a>
           </li>
           <li><a href="promoCode.php">Promo Code</a>
           </li>
            <li><a href="payment.php">Confirm Hotel & Payment</a>
          </li>
          <li><a href="useradd.php">Add User</a>
          </li>
          <li><a  href="paymentinfo.php">Payment Information</a>
          </li>
          <li><a href="transactiondetails.php">Trasaction Details</a>
           </li>
           <li><a  class="active" href="creditcardinfo.php">Credit Card Info</a>
            </li>
         </ul>
      </div>

      <div class="col-xs-9">
        <strong>Dashboard</strong>
        <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>
          <div id="google_translate_element" ></div>
          <form name="addBet" id="addBet" method="POST" role="form" data-toggle="validator">
         
            <div class="clearfix"></div>
            
            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6 labelAlign"> Credit Card Number</label>
                <div class="col-md-6">
                  <input type="text" id="ccnumber" class="form-control"  pattern="[0-9]{13,16}" required>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6 labelAlign">Card Holder's Name</label>
                <div class="col-md-6">
                  <input type="text" id="ccname" class="form-control" name="option2"  pattern="[a-zA-Z ]{7,25}"  required>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6 labelAlign">Card type (master/visa)</label>
                <div class="col-md-6">
                  <select id="cardtype" class="form-control" required>
                    <option value="Visa">Visa</option>
                    <option value="Master Card">Master Card</option> 
                  </select>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6 labelAlign">Expiry date</label>
                <div class="col-md-6">
                  <input type="date" id="expdate" class="form-control" name="option4"  required>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6 labelAlign">Security code</label>
                <div class="col-md-6">
                  <input type='text' id="securitycode" class="form-control" name="betEnds" pattern="[0-9]{3,3}" required/>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <br>
            <!-- <button type="submit" class="btn btn-primary " id="adddetails">Add Details</button> -->
            <!-- <button type="submit" class="btn" id="adddetails">Add Details</button> -->
            <input type="submit" class="btn btn-primary" id="adddetails" value="Add Details"/>
          </form>
        </div>
    	</div>
      <!-- <div class="loading">Loading&#8230;</div> -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script type="text/javascript" src="../packages/bootstrap-datetimepicker/js/moment-with-locales.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../packages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <!-- // <script src="../js/validator.min.js"></script> -->
    <script type="text/javascript" src="../packages/jstimezonedetect/js/jstz.js"></script>
    <script>

    //To add entry into table
    $(document).ready(function() {
      // $('.loading').css('display', 'none');
      // var tz = jstz.determine(); // Determines the time zone of the browser client
         // var timezone = tz.name(); 
      // alert(timezone);
      // $('[name="betDescription"]').val("");

    
    $('#addBet').on('submit', function (e) {
        e.preventDefault();
        
        var formData = {
            'ccnumber' : $('#ccnumber').val(),
            'ccname'   : $('#ccname').val(),
            'cardtype' : $('#cardtype').val(),
            'expdate'  : $('#expdate').val(),
            'securitycode'    : $('#securitycode').val()
        };

        console.log(formData);

        $.ajax({
          url: 'scripts/creditcardinfo.php',
          type: 'POST',
          data: formData,
        })
        .done(function(data) {
          // $('.loading').css('display', 'none');
          // alert("bet sent!!");
          console.log("success");
          console.log(data);
          alert("Details Successfully Added");
          $('#addBet')[0].reset();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    });
    /*$(function () {
        $('#datetimepicker1').datetimepicker({
          format: "YYYY-MM-DD HH:mm:ss"
        });*/

    });

  </script>
  </body>
</html>