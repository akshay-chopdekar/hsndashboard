<?php session_start(); 
if(!isset($_SESSION[ 'userLogged'])) 
  { 
    header( "Location: ../index.php"); 
  }
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
            <li><a href="campaign.php">Campaign</a>
            </li>
            <li><a href="userReview.php">User Reviews</a>
            </li>
            <li><a href="promoCode.php">Promo Code</a>
            </li>
             <li><a class="active" href="payment.php">Payment</a>
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
                <th data-class="expand">HOTEL ID</th>
                <th>HOTEL NAME</th>
              </tr>
            </thead>
            <!--tbody section is required-->
            <tbody></tbody>
          </table>
        </div>
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
               <label class="control-label col-sm-2" >Hotel ID</label>
               <div class="col-sm-10">
                 <p id="hotelId"></p>
               </div>
             </div>

             <div class="form-group">
               <label class="control-label col-sm-2" >Hotel Name</label>
               <div class="col-sm-10">
                 <p id="hotelName"></p>
               </div>
             </div>
             <!-- <div class="form-group">
               <label class="control-label col-sm-2" >Price</label>
               <div class="col-sm-10">
                 <p id="price"></p>
               </div>
             </div>
             <div class="form-group">
               <label class="control-label col-sm-2" >Discount</label>
               <div class="col-sm-10">
                 <p id="discount"></p>
               </div>
             </div>
               <div class="form-group">
               <label class="control-label col-sm-2" >Same Day Price</label>
               <div class="col-sm-10">
                 <p id="samedayprice"></p>
               </div>
             </div> -->

             <div class="form-group">
               <label class="control-label col-sm-2" for="email">Admin Profit</label>
               <input type="text" name="profit" id="profit">
             </div>

               <!-- <div class="form-group">
               <label class="control-label col-sm-2" >Final Price</label>
               <div class="col-sm-10">
                 <p id="finalprice"></p>
               </div>
                            </div>
                -->

         </div>
         <div class="modal-footer">
           <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                 <input id="update" type="submit" class="btn btn-default" name="submit" value="Insert">
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
      ajax: 'scripts/server_processing_payment.php',
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
    var category,hotelId,output="",price;
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }

      hotelId = $(this).find('td').eq(0).text();
       /*Get userId for blocking user*/
      /*Get userId for blocking user*/
      $('#hotelId').html(($(this).find('td').eq(0).text()));
      $('#hotelName').html(($(this).find('td').eq(1).text()));
      $("#profit").val('');
      // alert(price);
      // alert($(this).find('td').eq(1).text());
       console.log('hotelName is:' + $(this).find('td').eq(0).text());

         $.ajax({
           url: 'scripts/setprofit.php',
           type: 'GET',
           dataType: 'json',
           data: {
             hotelId: hotelId
           },
         })
         .done(function(data) {
           console.log("success 1st");
           console.log(data);
           $("#profit").val(data['profit']['profit']);
         })
         .fail(function() {
           console.log("error 1st");
         });
       });
      
      
    

    $('#myModal').on('hidden.bs.modal', function(e) {
       
      table.$('tr.success').removeClass('success');
    })

/*    $('#deletePost').click(function() {
      category = $("#category option:selected").val();
       console.log('category is:' + category);
      $.ajax({
          url: "../php/deleteBet.php",
          // async: false,
          data: {
            category: category,
            hotelName:hotelName
          },
          type: "POST",
          // dataType: "json",
        })
        .done(function(data) {
          //alert(data.response);
          console.log('success');
      $("#example").DataTable().draw();
        })
        .fail(function() {
           console.log('fail');
          //alert(data.response);
        })
      $('#myModal').modal('hide');
    });*/

  $("form#myform1").on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    // alert("hi");
    price=$("#profit").val();
    alert(price);
    $.ajax({
      url: 'scripts/setprofit.php',
      type: 'POST',
      dataType: 'json',
      data: {
        hotelId: hotelId,
        profit:price
      },
    })
    .done(function(data) {
      console.log("success 2nd");
      console.log("data is:"+data);
    })
    .fail(function() {
      console.log("error 2nd");
    });
  });
  
  });
  </script>
</body>

</html>
