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
  p#cname1{
    margin-top:7px;
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
         <li><a  href="hotelInfo.php">Hotel Info</a>
         </li>
         <li><a  href="categoryList.php">Category List</a>
         </li>
         <li><a  href="campaign.php">Campaign</a>
         </li>
         <li><a href="userReview.php">User Reviews</a>
         </li>
         <li><a href="promoCode.php">Promo Code</a>
         </li>
          <li><a href="payment.php">Payment</a>
        </li>
          <li><a class="active" href="useradd.php">Add User</a>
        </li>
       </ul>
      </div>
      <div class="col-xs-9">
        <strong>Dashboard</strong>
        <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>

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


    <!--         2nd modal for add campaign-->

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
                  <select name="hotels" id="hotelid" class="form-control" >
                  </select>
                </div>
              </div>

               <div class="form-group">
                 <label class="control-label col-sm-2" >First Name</label>
                 <div class="col-sm-5">
                    <input type="text" id="fname" class="form-control">
                 </div>
               </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Last Name</label>
                <div class="col-sm-5">
                 <input type="text" id="lname" class="form-control">
                  </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >User Name</label>
                <div class="col-sm-5">
                  <input type="text" id="username" class="form-control">
                </div>
              </div>
                
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password</label>
                <div class="col-sm-5">
                   <input type="password" id="password" class="form-control">
                </div>
              </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email</label>
                  <div class="col-sm-5">
                   <input type="text" id="email" class="form-control">
                 </div>
                </div>


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
      pagingType: "input",
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
    
   
    /*$('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }
      camId = $(this).find('td').eq(0).text(); 
      $('#cname1').html(($(this).find('td').eq(0).text()));
      $("#cdes1").html(($(this).find('td').eq(2).text()))

        $( '#myform1' ).each(function(){
            this.reset();
        });

      $("#check").empty();
     $("#check").append("accept:<input id='rad' type='radio' name='status' value='1'>reject:<input type='radio' name='status' value='0'>");
    });

    $('form#myform1').on('submit', function(event) {
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
          console.log(data['hotels'][0]);
          var output = "";
          $("#hotelid").empty();
          var hotelid = "",hotelname="";
          for (var i = 0; i < data['hotels'].length; i++) {

            hotelid = data['hotels'][i]['hotelId'];
            output += "<option value="+hotelid+">"+hotelid+"</option>";
          };
          console.log(output);
          $("#hotelid").append(output);

        })
        .fail(function() {
          console.log("error");
        });
    });

  $('form#myform2').on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    var fname,lname,email,username,password,hotelId;
    fname=$("#fname").val();
    lname=$("#lname").val();
    hotelId=$("#hotelid").val();
    email=$("#email").val();
    password=$("#password").val();
    username=$("#username").val();
    alert(username);

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
  });
  </script>
</body>

</html>
