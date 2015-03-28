<?php 
session_start(); 
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
 /*  .form-group {
   padding-top: 40px;
 } */
 input#promocode1{
  margin-top: 8px;
  height: 40px;
 }
 input#associatedcredits1{
  margin-top: 7px;
  height: 40px;
 }
 p#promoid1{
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
               <li><a href="campaign.php">Campaign</a>
               </li>
               <li><a  href="userReview.php">User Reviews</a>
               </li>
               <li><a class="active" href="promoCode.php">Promo Code</a>
               </li>
                <li><a href="payment.php">Payment</a>
              </li>
             </ul>
      </div>
      <div class="col-xs-9">
        <strong>Dashboard</strong>
        <br/>
        <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <td>Promo ID</td>
              <td>Promo code</td>
              <td>associated credits</td>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <!-- <form name="sendCoins" id="sendCoins" method="POST" role="form">
            <div class="form-group">
              <label class="col-md-3 control-label">Coin Amount</label>
              <div class="col-md-2">
                <input class="form-control" name="coins">
              </div>
              <label class="col-md-4">coins</label>
            </div>
            <div class="clearfix"></div>
            
            <div class="form-group">
                <label class="col-md-3 control-label">Send Coins to players with less than</label>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="conditionCoins">
                </div>
                <label class="col-md-4">coins</label>
            </div>
            <div class="clearfix"></div>
            
            <div class="form-group">
                <label class="col-md-3 control-label">Notification Message</label>
                <div class="col-md-9">
                  <textarea class="form-control" name="notificationMessage">
                  </textarea>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <button type="submit" class="btn btn-primary imageButton pull-right">Send Coins</button>
          </form> -->
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-3">
                  <input type="button" value="Add Promotion code" id="addpromotioncode" class="btn btn-primary" style="margin-left:-28px;">
                </div>
                <div class="col-md-3">
                  <input type="button" value="Delete" id="newfunction" class="btn btn-primary" style="display:block;">
                </div>
              </div>
              
            </div>
          </div>
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
                  <label class="control-label col-sm-2" for="email">promo code</label>
                  <div class="col-sm-10">
                    <input type="textbox" name="promo code" id="promocode">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">associated credits</label>
                  <div class="col-sm-10">
                    <input type="textbox" name="associated credits" id="associatedcredits">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input id="insert" type="submit" class="btn btn-default" name="insert" value="insert">
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
                             Edit Promotion Codes
                          </h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="myform1" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-sm-2">Promo Id</label>
              <div class="col-sm-10">
                <p id="promoid1"></p>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Promo Code</label>
              <div class="col-sm-10">
                <input type="textbox" name="promo code" id="promocode1">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Associated Credits</label>
              <div class="col-sm-10">
                <input type="textbox" name="associated credits" id="associatedcredits1">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input id="submit1" type="submit" class="btn btn-default" name="submit" value="update">
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

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="container">
        
      </div>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
          </button>
          <h4 class="modal-title" id="myModalLabel">
                             Edit Promotion Codes
                          </h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" id="myform2" enctype="multipart/form-data">

            <div class="form-group">
              <label class="control-label col-sm-2">Promo Id</label>
              <div class="col-sm-10">
                <select id="sel"></select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input id="submit2" type="submit" class="btn btn-default" name="submit" value="delete">
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
    var tableElement = $('#example');

    tableElement.dataTable({

      processing: false,
      serverSide: true,
      pagingType: "input",
      autoWidth: false,
      ajax: 'scripts/server_processing_promo.php',

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

        // $("table#example thead tr th").eq(0).css('color', 'red');;
        /*$("table#example tbody tr").append('<td class="timeZone"></td>');
        $(".timeZone").append('<select name="timeZone" id="" class="form-control"><option value="">Delhi</option><option value="">turkey</option><option value="">donkey</option><option value="">chinmay</option></select>');*/
      }
    });
    //new code
  });


  //To add entry into table
  $(document).ready(function() {

    var promoid, promocode, associatedcredits;
    var promoid1, promocode1, associatedcredits1;

    $("#addpromotioncode").on('click', function(event) {
      event.preventDefault();
      // $("form#myform").find("#promoid").val("");
      $("form#myform").find("#promocode").val("");
      $("form#myform").find("#associatedcredits").val("");
      $('#myModal').modal();

      /* Act on the event */
    });

    $('#example tbody').on('click', 'tr', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert('hi');
      $('#myModal1').modal();
      promoid1 = $(this).find('td').eq(0).text();
      promocode1 = $(this).find('td').eq(1).text();
      associatedcredits1 = $(this).find('td').eq(2).text();

      // alert("promo id "+promoid1);
      $("form#myform1").find("#promoid1").text(promoid1);
      $("form#myform1").find("#promocode1").val(promocode1);
      $("form#myform1").find("#associatedcredits1").val(associatedcredits1);

    });

    $('form#myform').on('submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert('hi from form');
      // promoid=$("form#myform").find("#promoid").val();
      promocode = $("form#myform").find("#promocode").val();
      associatedcredits = $("form#myform").find("#associatedcredits").val();
      console.log(" promocode:" + promocode + " associatedcredits:" + associatedcredits);

      $.ajax({
          url: 'scripts/insertpromocode.php',
          type: 'POST',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {
            promocode: promocode,
            associatedcredits: associatedcredits
          },
        })
        .done(function() {
          console.log("success");
          $("#example").DataTable().draw();
        })
        .fail(function() {
          console.log("error");
        });
        console.log("hide of mymodal");
      $('#myModal').modal('hide');
    });

    //update promotion codes
    $('form#myform1').on('submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert("hi from update");
      promoid = $("form#myform1").find("#promoid1").text();
      promocode = $("form#myform1").find("#promocode1").val();
      associatedcredits = $("form#myform1").find("#associatedcredits1").val();

      console.log(" promo id:" + promoid + " promocode:" + promocode + " associatedcredits:" + associatedcredits);

      $.ajax({
          url: 'scripts/insertpromocode.php',
          type: 'POST',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {
            promoid:promoid,
            promocode:promocode,
            associatedcredits:associatedcredits
          },
        })
        .done(function() {
          console.log("success");
          $("#example").DataTable().draw();
        })
        .fail(function() {
          console.log("error");
        });
        console.log("hide of mymodal1");
        $('#myModal1').modal('hide');
        

    });

    //delete code
    
    $("#newfunction").on('click', function(event) {
      event.preventDefault();
      /* Act on the event */

      $('#myModal2').modal();
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

    $("form#myform2").on('submit', function(event) {
      event.preventDefault();
      /* Act on the event */
      // alert("hi");
      var iid=$("#sel option:selected").val();

      $.ajax({
        url: 'scripts/deletepromoid.php',
        type: 'POST',
        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {id: iid},
      })
      .done(function() {
        console.log("success");
        $("#example").DataTable().draw();
      })
      .fail(function() {
        console.log("error");
      });
      $('#myModal2').modal('hide');
    });


    /*
    $('[name="notificationMessage"]').val("");
    $('[name="sendCoins"]').submit(function(event) {
      event.preventDefault();
      var formData = {
          'coins'              : $('input[name=coins]').val(),
          'conditionCoins'             : $('input[name=conditionCoins]').val(),
          'notificationMessage'    : $('textarea[name=notificationMessage]').val()
      };
      console.log(formData);
      $.ajax({
        url: '',
        type: 'get',
        data: formData,
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });*/
  });
  </script>
</body>

</html>
