<?php session_start(); if(!isset($_SESSION[ 'userLogged'])) { header( "Location: ../index.php"); } ?>
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

  <link rel="stylesheet" href="../css/bootstrap-multiselect.css" type="text/css"/>

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
  .title {
    font-size: larger;
    font-weight: bold;
  }
  .table th.centered-cell,
  .table td.centered-cell {
    text-align: center;
  }
  input[type="file"]{
    margin: 15px 211px 10px auto;
  }
  textarea{
    border-radius:4px;
  }
  input#submit{
    max-width: 150px;
    width: 100%;
  }
  p#cname1{
    margin-top:7px;
  }
  .form-control{
    margin-top: 7px;
  }
  @media screen and (min-width:768px){
    .form-horizontal .control-label{
      text-align:left;
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
         <li><a  href="campaign.php">Promotion Type</a>
         </li>
         <li><a  href="promotionn.php">Promotion</a>
         </li>
         <li><a href="userReview1.php">User Reviews</a>
         </li>
         <li><a href="promoCode.php">Promo Code</a>
         </li>
          <li><a href="payment.php">Confirm Hotel & Payment</a>
        </li>
          <li><a class="active" href="useradd.php">Add User</a>
        </li>
        <li><a  href="paymentinfo.php">Payment Information</a>
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
        <div id="google_translate_element"></div>
        <div class="form-inline">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th data-class="expand">User Id</th>
                <th>Hotel Id</th>
                <th>User Name</th>
              </tr>
            </thead>
            <!--tbody section is required-->
            <tbody></tbody>
          </table>
        </div>
        <input type="button" value="Add User" id="adduser" class="btn btn-primary pull-left">
      </div>
    </div>
    <!-- Modal -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                       User Details
                    </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="myform1" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Campaign name</label>
                <div class="col-sm-10">
                  <p id="cname1"></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Campaign Tagline</label>
                <div class="col-sm-10">
                  <textarea type="text" name="cdes1" id="cdes1" cols="60"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Background Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
              </div>

              <div class="control-label">
                <p id="check">
                </p>
              </div>

          </div>
          <div class="modal-footer">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input id="update" type="submit" class="btn btn-default" name="submit" value="update">
                </div>
              </div>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!--         2nd modal for  editing campaign-->

    <div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                         Edit User
                      </h4>
          </div>
          <div class="modal-body">

            <form class="form-horizontal" role="form" id="myform22" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-sm-2" >User Id</label>
                <div class="col-sm-3">
                  <p name="hotels" id="userid22" >
                  </p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Hotel Id</label>
                <div class="col-sm-3">
                  <p name="hotels" id="hotelid22" >
                  </p>
                </div>
              </div>

               <div class="form-group">
                 <label class="control-label col-sm-2" >First Name</label>
                 <div class="col-sm-5">
                    <input type="text" id="fname22" class="form-control" pattern=".{5,15}" required>
                 </div>
               </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Last Name</label>
                <div class="col-sm-5">
                 <input type="text" id="lname22" class="form-control" pattern=".{5,15}" required>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >User Name</label>
                <div class="col-sm-5">
                  <input type="text" id="username22" class="form-control" pattern=".{5,15}" required>
                </div>
              </div>
                
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password</label>
                <div class="col-sm-5">
                   <input type="password" id="password22" class="form-control" pattern=".{5,15}" required>
                </div>
              </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-5">
                   <input type="email" id="email22" class="form-control" required placeholder="Enter a valid email address">
                 </div>
                </div>

              <p id="notification">*All Fields Are Mandatory<br/>
              *All Fields Should Be Between 5-15 characters
              </p>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input id="delete22" type="button" class="btn btn-default" name="delete" value="Delete User">
                  </div>
                </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input id="submit22" type="submit" class="btn btn-default" name="submit" value="submit">
                </div>
              </div>

            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- 3rd modal for user add  -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                         Add User
                      </h4>
          </div>
          <div class="modal-body">

            <form class="form-horizontal" role="form" id="myform2" enctype="multipart/form-data">

              <div class="form-group">
                <label class="control-label col-sm-2" >Hotel Id</label>
                <div class="col-sm-3">
                  <p name="hotels" id="hotelid" >
                  </p>
                </div>
              </div>

               <div class="form-group">
                 <label class="control-label col-sm-2" >First Name</label>
                 <div class="col-sm-5">
                    <input type="text" id="fname" class="form-control" pattern=".{5,15}" required>
                 </div>
               </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Last Name</label>
                <div class="col-sm-5">
                 <input type="text" id="lname" class="form-control" pattern=".{5,15}" required>
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >User Name</label>
                <div class="col-sm-5">
                  <input type="text" id="username" class="form-control" pattern=".{5,15}" required>
                </div>
              </div>
                
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password</label>
                <div class="col-sm-5">
                   <input type="password" id="password" class="form-control" pattern=".{5,15}" required>
                </div>
              </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-5">
                   <input type="email" id="email" class="form-control" required placeholder="Enter a valid email address">
                 </div>
                </div>

              <p id="notification">*All Fields Are Mandatory<br/>
              *All Fields Should Be Between 5-15 characters
              </p>
                
            <!--     <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input id="delete" type="button" class="btn btn-default" name="delete" value="Delete User">
              </div>
            </div> -->

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input id="submit" type="submit" class="btn btn-default" name="submit" value="submit">
                </div>
              </div>

            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

  </div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--   <script src="../js/jquery.min.js"></script>
   -->  <!-- Include all compiled plugins (below), or include individual files as needed -->

  <script src="../packages/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="../packages/DataTables/js/dataTables.bootstrap.js"></script>
  <script src="../packages/DataTables/js/datatables.responsive.js"></script>
  <script src="../packages/DataTables/js/input.js"></script>

    

  <script>
  'use strict';

  $(document).ready(function() {
    var responsiveHelper = undefined;
    var breakpointDefinition = {
      tablet: 1024,
      phone: 480
    };
    var tableElement = $('#example');

    tableElement.dataTable({
      processing: false,
      serverSide: true,
      // pagingType: "input",
      autoWidth: false,
      ajax: 'scripts/server_processingforUser.php',
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
    });
  });


  //To add entry into table
  $(document).ready(function() {
    var camId,op="",stat;
    var table = $('#example').DataTable();

    // $('#hotels').multiselect();
    
   
    $('#example tbody').on('click', 'tr', function() {
      var userId,hotelId;
      $('#myModal22').modal();

      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }
      userId = $(this).find('td').eq(0).text();
      hotelId = $(this).find('td').eq(1).text();

      $('#userid22').html(($(this).find('td').eq(0).text()));
      $("#hotelid22").html(($(this).find('td').eq(1).text()))

        $( '#myform22' ).each(function(){
            this.reset();
        });

        $.ajax({
          url: 'scripts/getuseradddetails.php',
          type: 'GET',
          dataType: 'json',
          data: {
            hotelId: hotelId,
            userId:userId
          },
        })
        .done(function(data) {
          console.log("success get details");
          console.log(data);
          $("#fname22").val(data['users'][0]['firstName']);
          $("#lname22").val(data['users'][0]['lastName']);
          $("#username22").val(data['users'][0]['userName']);
          $("#email22").val(data['users'][0]['email']);

        })
        .fail(function() {
          console.log("error get details");
        });
        
     
    });

/*    $('form#myform1').on('submit', function(event) {
      event.preventDefault();
      var da
      ta = new FormData($(this)[0]);
   
      alert('hi'+camId);
      stat=$('input[type="radio"]:checked').val();

      data.append('stat',stat);
      data.append('promotionId',camId);

    $.ajax({
        url: "scripts/updatecampaign.php",
        async: false,
        data: data,
        type: "POST",
        dataType: "json",
         cache: false,
        processData: false,
        contentType: false,
      })
      .done(function(data) {
        alert(data.response);
         console.log("success");
        $("#example").DataTable().draw();
      })
      .fail(function() {
        alert(data.response);
         console.log("error");
      });
    $('#myModal').modal('hide');
      
    });


    $('#myModal').on('hidden.bs.modal', function(e) {
      table.$('tr.success').removeClass('success');
    });*/

    $('#adduser').on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert('hi');
       
        $( '#myform2' ).each(function(){
            this.reset();
        });

      $('#myModal1').modal();
      $.ajax({
          url: 'scripts/gethotelids.php',
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          console.log("success");
          console.log(data);
          console.log(data['hotels'][0]['hotelId']);
          var output = "";
          $("#hotelid").empty();
          /*var hotelid = "",hotelname="";
          for (var i = 0; i < data['hotels'].length; i++) {

            hotelid = data['hotels'][i]['hotelId'];
            output += "<option value="+hotelid+">"+hotelid+"</option>";
          };
          console.log(output);*/
          $("#hotelid").text(data['hotels'][0]['hotelId']);

        })
        .fail(function() {
          console.log("error");
        });
    });

    $("#fname,#lname").bind('keyup',function(event) {
      /* Act on the event */
      // alert("hi");
     /* if($.isNumeric($("#fname").val()) || $.isNumeric($("#lname").val()))
      {
        $("#submit").hide();
      }
      else
      {
        $("#submit").show();
      }*/

      var emailReg = new RegExp(/^[a-zA-Z ]*$/);
      var fname = emailReg.test($("#fname").val());
      var lname = emailReg.test($("#lname").val());
      
      // alert("fname"+fname);
        if (!fname || !lname) 
        {
          $("#submit").hide();
        } 
        else 
        {
          $("#submit").show();
        }

    });

    $("#fname22,#lname22").bind('keyup',function(event) {
      /* Act on the event */
      // alert("hi");
     /* if($.isNumeric($("#fname").val()) || $.isNumeric($("#lname").val()))
      {
        $("#submit").hide();
      }
      else
      {
        $("#submit").show();
      }*/

      var emailReg = new RegExp(/^[a-zA-Z ]*$/);
      var fname = emailReg.test($("#fname22").val());
      var lname = emailReg.test($("#lname22").val());
      
        // alert("fname"+fname);
        if (!fname || !lname) 
        {
          $("#submit22").hide();
        } 
        else 
        {
          $("#submit22").show();
        }

    });

  $('form#myform2').on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    var fname,lname,email,username,password,hotelId;
    fname=$("#fname").val();
    lname=$("#lname").val();
    hotelId=$("#hotelid").text();
    email=$("#email").val();
    password=$("#password").val();
    username=$("#username").val();
    // alert(username);

    console.log("fname name is:"+fname+"promo description:"+lname+"hotel id is "+hotelId);
    // console.log(hotels.length);

// $("#hotels").attr('attribute', 'value');
    var data = new FormData($(this)[0]);

    data.append('fname',fname);
    data.append('lname',lname);
    data.append('hotelId',hotelId);
    data.append('email',email);
    data.append('password',password);
    data.append('username',username);
    
    $.ajax({
      url: 'scripts/adduser.php',
      data: data,
            type: "POST",
            dataType: "json",
             // cache: false,
            processData: false,
            contentType: false,
    })
    .done(function() {
      console.log("success");
      $('#myModal1').modal('hide');
      $("#example").DataTable().draw();
    })
    .fail(function() {
      console.log("error");
      $('#myModal1').modal('hide');
      $("#example").DataTable().draw();
    });
    
  });

//delete user button
//
$("#delete22").on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  // alert("hi");
  $.ajax({
    url: 'scripts/deleteuser.php',
    type: 'POST',
    dataType: 'json',
    data: {
      userId: $("#userid22").text()
    },
  })
  .done(function() {
    console.log("success delete user");
    $('#myModal22').modal('hide');
    $("#example").DataTable().draw();
  })
  .fail(function() {
    console.log("error delete user");
  });
  
});
//ajax to update settings

$("form#myform22").on('submit', function(event) {
  event.preventDefault();
  /* Act on the event */
      event.preventDefault();
      /* Act on the event */
      var fname,lname,email,username,password,hotelId,userId;
      fname=$("#fname22").val();
      lname=$("#lname22").val();
      hotelId=$("#hotelid22").text();
      userId=$("#userid22").text();
      email=$("#email22").val();
      password=$("#password22").val();
      username=$("#username22").val();
      // alert(username);

      console.log("fname name is:"+fname+"promo description:"+lname+"hotel id is "+hotelId);
      // console.log(hotels.length);

  // $("#hotels").attr('attribute', 'value');
      var data = new FormData($(this)[0]);

      data.append('fname',fname);
      data.append('lname',lname);
      data.append('hotelId',hotelId);
      data.append('email',email);
      data.append('password',password);
      data.append('username',username);
      data.append('userId',userId);

      $.ajax({
        url: 'scripts/updateuserdetails.php',
        data: data,
              type: "POST",
              dataType: "json",
               // cache: false,
              processData: false,
              contentType: false,
      })
      .done(function() {
        console.log("success update details");
        $('#myModal22').modal('hide');
        $("#example").DataTable().draw();
      })
      .fail(function() {
        console.log("error update details");
        $('#myModal22').modal('hide');
        $("#example").DataTable().draw();
      });
      

    });
  });
  </script>
</body>

</html>
