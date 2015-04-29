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
    margin-top:0px;
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
          <li><a  class="active" href="paymentinfo.php">Payment Information</a>
          </li>
          <li><a href="transactiondetails.php">Trasaction Details</a>
           </li>
           <li><a  href="creditcardinfo.php">Credit Card Info</a>
            </li>
         </ul>
      </div>

      <div class="col-xs-9">
        <strong>Dashboard</strong>
        <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>
          <div id="google_translate_element" ></div>
        <div class="form-inline">
       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
           <tr>
             <th>Hotel Id</th>
             <th>Hotel Name</th>
           </tr>
         </thead>
         <!-- tbody section is required -->
         <tbody>
           <?php foreach($reported as $report)
           {
           ?>
           <tr>
               <td><?php echo $report['hotelId'];?></td>
               <td><?php echo $report['hotelName'];?></td>
           </tr>
           <?php
           }
           ?>
         </tbody>
       </table>
       

        </div>
        
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="wrapper">
          
        </div>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                       Hotel Details
                    </h4>
          </div>
          <div class="modal-body scrollspy-example" data-spy="scroll" style="height:461px;overflow:-moz-scrollbars-vertical;overflow-y:auto;" id="scroll1">
            <!-- <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example"> -->
            <form class="form-horizontal" role="form" id="myform" enctype="multipart/form-data">
              <div class="form-group" >
                <label class="control-label col-sm-2" for="email" id="hotalId">Hotel Id</label>
                <div class="col-sm-10">
                  <p id="hotelId"></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Hotel Name</label>
                <div class="col-sm-10">
                  <!-- <input class="form-control" type="text" name="hotelName" id="hotelName"> -->
                  <p id="hotelName"></p>
                </div>
              </div>
              
              <div class="form-group">
                  <label class="control-label col-sm-2">Payment Method</label>
                    <div class="col-sm-10">
                      <select id="paymethod">
                        <option value="Electronic credit card">Electronic credit card</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                      </select>
                    </div>
              </div>

              <!-- <div class="form-group">
                <label class="control-label col-sm-2" for="email">category</label>
                <div class="col-sm-10">
                 <input type="checkbox" name="category" id="category" value="category"></input>
                </div>
              </div>
 -->
            <div id="credit" class="row" >
              <div class="col-md-12">
                <div  class="form-group">
                 <h5>Electronic credit card</h5>
                    <div class="col-sm-10">
                    <label>Credit Card No:</label>
                      <input type="text" id="cardno" pattern="[0-9]{13,16}">
                    </div>
                    <div class="col-sm-10">
                    <label>card name:</label>
                      <select id="cardname">
                        <option value="visa">Visa</option>
                        <option value="Master Card">Master Card</option> 
                      </select>
                      </div>
                    <div class="col-sm-10">
                    <label>expiry date</label>
                      <input type="date" id="expdate">
                    </div>
                </div>
                <!-- (credit card number should be between 13-15)  -->
              </div>
            </div>
           
            <div id="bank" class="row" style="display:none">
              <div class="col-md-12">
                <div  class="form-group">
                  <h5>Bank Transfer</h5>
                  <div class="col-sm-10">
                    <label>Bank Name:</label>
                    <input type="text" id="bankname" >
                  </div>
                  <div class="col-sm-10">
                    <label>Account Number:</label>
                    <input type="text" id="accno" pattern="[0-9]{12}" >
                  </div>
                  <div class="col-sm-10">
                    <label>Bank Code</label>
                    <input type="text" id="bankcode" >
                  </div>
                </div>
              </div>
            </div>

 
            </div>
                <div class="modal-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input class="form-control" id="submit" type="submit" class="btn btn-default" name="submit" value="submit">
                </div>
              </div>
                <!-- <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input class="form-control" id="delete" type="button" class="btn btn-default" name="delete" value="delete">
                </div>
                              </div> -->
                </div>
            </form>
          

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../js/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/bootstrap.min.js"></script>
  <script src="../packages/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../packages/DataTables/js/dataTables.bootstrap.js"></script>
  <script src="../packages/DataTables/js/datatables.responsive.js"></script>
  <script src="../packages/DataTables/js/input.js"></script>
  <script src="http://cdn.datatables.net/plug-ins/725b2a2115b/api/fnReloadAjax.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>


  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function (event) {
      // alert("hi");
      var userTable = $('#example').dataTable();
  </script>


  <script>
  $(document).ready(function() {
    var hotelId,timezone,description,address,url="",breakfast,tradeName,notes,foodBeverage,around,city="",zone="", output2="",langId;
    var files = new FormData();
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      // alert("hiii");
      // 
      $('#myform')[0].reset();
      // alert("hi");
      var paymentdefault;
      paymentdefault=$("#paymethod").val();
      if(paymentdefault=='Electronic credit card')
      {
       // alert('Electronic credit card');
       $("#credit").show();
       $("#bank").hide(); 
      }
      else if(paymentdefault='Bank Transfer')
      {
       // alert('Bank Transfer');
        $("#credit").hide();
        $("#bank").show(); 
      }

      langId=$("#hotalId").text();
      if(langId!='Hotel Id')
      {
        alert("turkish");
      }

      if ($(this).hasClass('success')) 
      {
        $(this).removeClass('success');
      } 
      else 
      {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }
      $("#hotelId").text($(this).find('td').eq(0).text());
      $("#hotelName").text($(this).find('td').eq(1).text());
      hotelId = $(this).find('td').eq(0).text(); /*Get userId for blocking user*/
      // alert($("#scroll1").scrollTop());
      });


    
    //change box hide show
 

     $("#paymethod").on('change', function(event) {
       event.preventDefault();
       /* Act on the event */
       // alert($("#paymethod").val());
       // $('#myform')[0].reset();
       paymentdefault=$("#paymethod").val();
       if(paymentdefault=='Electronic credit card')
       {
        // alert('Electronic credit card');
        $("#credit").show();
        $("#bank").hide(); 
       }
       else if(paymentdefault='Bank Transfer')
       {
        // alert('Bank Transfer');
         $("#credit").hide();
         $("#bank").show(); 
       }
       
     });
      
    // $("#credit").hide();
    // $("#bank").hide(); 

    $('#myModal').on('hidden.bs.modal', function(e) {
      table.$('tr.success').removeClass('success');
    })

    // $("#htmltext").html('<img src="../uploads/IMG_4842.jpg" alt="image" height="80" class="imageclass" width="80">');

    $('form#myform').on('submit', function (event) {
      event.preventDefault();
      // alert("hi");
      // files.append("image", $('#filetoupload')[0].files[0]);
      // var files = $('#filetoupload').prop('files');
      
      var data = new FormData($(this)[0]);

      // alert($("#cardno").val());
      var paymentdefault=$("#paymethod").val();
      // alert(paymentdefault);
      if(paymentdefault=='Bank Transfer')
      {
        data.append('val','banktransfer');
        data.append('hotelId',hotelId);
        data.append('val1',$('#bankname').val());
        data.append('val2',$('#bankcode').val());
        data.append('val3',$('#accno').val());

      }
      else if(paymentdefault=='Electronic credit card')
      {
        data.append('val','electroniccreditcard');
        data.append('hotelId',hotelId);
        data.append('val1',$('#cardno').val());
        data.append('val2',$('#cardname').val());
        data.append('val3',$('#expdate').val());
      }
     $.ajax({
          url: "scripts/paymentinfosave.php",
          // async: false,
           data: data,
          type: "POST",
          // dataType: "json",
           // cache: false,
          processData: false,
          contentType: false,
        })
        .done(function(data) {
          //alert(data.response);
           console.log("success");
           console.log(data);
        })
        .fail(function() {
          //alert(data.response);
           console.log("error");
        });
      $('#myModal').modal('hide');
    });

  });
  </script>
</body>

</html>
