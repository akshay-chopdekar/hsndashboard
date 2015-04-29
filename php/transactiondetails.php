<?php 
session_start(); 
if(!isset($_SESSION[ 'userLogged'])) 
  { 
    header( "Location: ../index.php"); 
  } 
  include("scripts/server_transaction.php");
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
  <link rel="stylesheet" href="../packages/DataTables/css/datatables.responsive.css" />
  <link rel="stylesheet" href="../packages/DataTables/css/input.css" />

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
  p#hotelId{
    margin-top:7px;
  }
  @media screen and (min-width:768px){
    .form-horizontal .control-label{
      text-align:left;
    }
    .hotelid{
      padding-left: 30px;
    }
    .reviewz{
      padding-right: 23px;
    }
  }
  .logo{
   height: 161px;
   width: 35%;
   margin: auto;
   display: block;
   padding-top: 11px;
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
             <li><a  href="userReview1.php">User Reviews</a>
             </li>
             <li><a href="promoCode.php">Promo Code</a>
             </li>
              <li><a href="payment.php">Confirm Hotel & Payment</a>
            </li>
              <li><a href="useradd.php">Add User</a>
            </li>
            <li><a  href="paymentinfo.php">Payment Information</a>
            </li>
            <li><a class="active" href="transactiondetails.php">Trasaction Details</a>
            </li>
            <li><a  href="creditcardinfo.php">Credit Card Info</a>
             </li>
           </ul>
      </div>
           <div class="col-xs-9">
             <strong>Dashboard</strong>
         <!--     <br/> -->
             <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>
             <div id="google_translate_element"></div>
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                 <tr>
                   <th>Hotel Name</th>
                   <th>Hotel Web Price</th>
                   <th>Check In</th>
                   <th>Check Out</th>
                   <th>Transaction Date</th>
                   <th>Price To HSN</th>
                   <th>Price To Customer</th>
                   <th>Coupon</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 foreach($reported as $report)
                 {
                  ?>
                  <tr>
                    <td><?php echo $report['hotelName']?></td>
                    <td><?php echo $report['totalamount']?></td>
                    <td><?php echo $report['fromDate']?></td>
                    <td><?php echo $report['toDate']?></td>
                    <td><?php echo $report['transactionDate']?></td>
                    <td><?php echo $report['priceHSN']?></td>
                    <td><?php echo $report['pricetocustomer']?></td>
                    <td><?php echo $report['creditDiscounts']?></td>
                  </tr>
                  <?php
                  }
                  ?>
               </tbody>
             </table>
             

             <!-- <input type="button" value="Add Promotion code" id="addpromotioncode" class="btn btn-primary"><br/>
             <input type="button" value="new function" id="newfunction" class="btn btn-primary"> -->
           </div>
          
           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                   </button>
                   <h4 class="modal-title" id="myModalLabel">
                                  Review Details
                               </h4>
                 </div>
                 <div class="modal-body">
                   <form class="form-horizontal" role="form" id="myform" enctype="multipart/form-data">

                     <div class="form-group">
                       <label class="control-label col-sm-2" for="email">Promo Code</label>
                       <div class="col-sm-10">
                         <input type="textbox" name="promo code" id="promocode">
                       </div>
                     </div>

                     <div class="form-group">
                       <label class="control-label col-sm-2" for="email">Associated Credits</label>
                       <div class="col-sm-10">
                         <input type="textbox" name="associated credits" id="associatedcredits">
                       </div>
                     </div>

                     <div class="form-group">
                       <div class="col-sm-offset-2 col-sm-10">
                         <input id="insert" type="submit" class="btn btn-default" name="insert" value="Insert">
                       </div>
                     </div>
                 </div>
               </div>


               </form>
             </div>

           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>

       <!-- 2nd model -->

       <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
               </button>
               <h4 class="modal-title" id="myModalLabel">
                                  Edit Promotion
                               </h4>
             </div>
             <div class="modal-body">
               <form class="form-horizontal" role="form" id="myform1" enctype="multipart/form-data">

                 <div class="form-group">
                   <label class="control-label col-sm-2">Promo Id</label>
                   <div class="col-sm-10">
                     <p id="promotionId"></p>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2">Reference No</label>
                   <div class="col-sm-10">
                     <!-- <input type="textbox" name="promo code" id="promocode" disabled> -->
                     <p name="promo code" id="promocode"></p>
                   </div>
                 </div>
                 <div class="form-group">
                   <label class="control-label col-sm-2">Profit Percentage</label>
                   <div class="col-sm-10">
                     <input type="textbox" name="profit" id="profit" maxlength="2">
                   </div>
                 </div>

                 <div class="form-group">
                   <label class="control-label col-sm-2">Status</label>
                   <div class="col-sm-10">
                     <select id="status" name="status"></select>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="col-sm-offset-2 col-sm-10">
                     <input id="submit1" type="submit" class="btn btn-default" name="submit" value="Update">
                   </div>
                 </div>
               </form>
             </div>

           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>

       <!-- 3rd modal -->

       <!-- /.modal -->
       </div>
       </div>



       <script src="../js/jquery.min.js"></script>
       <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="../js/bootstrap.min.js"></script>
       <script src="../packages/DataTables/js/jquery.dataTables.min.js"></script>
       <script src="../packages/DataTables/js/dataTables.bootstrap.js"></script>
       <script src="../packages/DataTables/js/datatables.responsive.js"></script>
       <script src="../packages/DataTables/js/input.js"></script>
       <script>

       $(document).ready(function() {
         var responsiveHelper = undefined;
         var breakpointDefinition = {
           tablet: 1024,
           phone: 480
         };
         var tableElement = $('#example').dataTable();
/*
         tableElement.dataTable({

           processing: false,
           serverSide: true,
           // pagingType: "input",
           autoWidth: false,
           ajax: 'scripts/server_processingpromo.php',

           preDrawCallback: function() {
             // Initialize the responsive datatables helper once.
             if (!responsiveHelper) {
               responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
             }
           },
           rowCallback: function(nRow) {
             responsiveHelper.createExpandIcon(nRow);
           },
           drawCallback: function(oSettings) {
             responsiveHelper.respond();

          
           }
         });*/
         //new code
       });


       //To add entry into table
       $(document).ready(function() {

         var promotionId, promocode, profit;
         var confirm,status;

         // promotionId=$("#promotionId").val();

         $('#example tbody').on('click', 'tr', function(event) {
           event.preventDefault();
           /* Act on the event */
           // alert('hi');
           // 
           $("#status").empty();
           $("#status").append("<option value='1'>accept</option><option value='0'>reject</option>");

           // $('#myModal1').modal();
           promotionId = $(this).find('td').eq(0).text();
           promocode = $(this).find('td').eq(3).text();
           profit = $(this).find('td').eq(4).text();

           // alert("promo id "+promoid1);
           $("form#myform1").find("#promotionId").text(promotionId);
           $("form#myform1").find("#promocode").text(promocode);
           $("form#myform1").find("#profit").val(profit);

           $.ajax({
             url: 'scripts/getpromotionstatus.php',
             type: 'GET',
             dataType: 'json',
             data: {
              promotionId: promotionId
            },
           })
           .done(function(data) {
             console.log("success");
             console.log(data);
             status=data['confirmed'];
             // alert(status);
             if(status == 1)
             {
              $('#status option[value="1"]').attr('selected',true);
              // alert("hi");
              $("#profit").attr('disabled', true);
             }
             else if(status == 0)
             {
              $('#status option[value="0"]').attr('selected',true);
              // alert("bye");
              $("#profit").attr('disabled', false);
             }
           })
           .fail(function() {
             console.log("error");
           });
           
           $("#submit1").show();
         });

        $("#submit1").show();
        $("#profit").on('keyup', function(event) {
          event.preventDefault();
          /* Act on the event */
          // alert("hi");
          if($.isNumeric($("#profit").val()) && $("#profit").val()>=0)
          {
            $("#submit1").show();
          }
          else
          {
            $("#submit1").hide();
          }
        });

         $('form#myform1').on('submit', function(event) {
           event.preventDefault();
           /* Act on the event */
           // alert('hi from form');
           // promoid=$("form#myform").find("#promoid").val();
           promocode = $("form#myform").find("#promocode").val();
           associatedcredits = $("form#myform").find("#associatedcredits").val();
           console.log(" promocode:" + promocode + " associatedcredits:" + associatedcredits);

           promotionId=$("#promotionId").text();
           profit=$("#profit").val();
           status=$("#status").val();
           // alert(profit);
           
           console.log("promotionId"+promotionId);
           $.ajax({
               url: 'scripts/updatepromotion.php',
               type: 'POST',
               // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
               data: {
                 promotionId: promotionId,
                 profit: profit,
                 status:status
               },
             })
             .done(function() {
               console.log("success of update promotion");
               $("#example").DataTable().draw();
               $('#myModal1').modal('hide');
               location.reload();
             })
             .fail(function() {
               console.log("error");
             });
             console.log("hide of mymodal");
           // $('#myModal').modal('hide');
         });

         //update promotion codes
         

         //status code
           $("#sel").empty();
           var sel="";

           $.ajax({
             url: 'scripts/selectpromoid.php',
             type: 'GET',
             dataType: 'json',
             // data: {param1: 'value1'},
           })
           .done(function(data) {
             console.log("success");
             
             for(var i=0;i<data.length;i++)
             {
               var id=data[i]['promoId'];
               sel+="<option value="+id+">"+id+"</option>"
             }
             $("#sel").append(sel);
           })
           .fail(function() {
             console.log("error");
           });

       });
       </script>
     </body>

     </html>
