<?php session_start();/* if(!isset($_SESSION[ 'userLogged'])) { header( "Location: ../index.php"); }*/ ?>
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
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-3 navColor" style="width:260px;padding-left: 0px;">
        <div class="block">
          <img class="center-block logoDashboardWidth" src="../images/logoDashboard.png">
        </div>
     <ul class="nav">
       <li><a  href="hotelInfo.php">hotel info</a>
       </li>
       <li><a class="active" href="categoryList.php">category list</a>
       </li>
       <li><a href="campaign.php">Campaign</a>
       </li>
       <li><a href="userReview.php">User Reviews</a>
       </li>
       <li><a href="promoCode.php">Promo Code</a>
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
                <th data-class="expand">HOTEL NAME</th>
                <th>CATEGORY</th>
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
            <table id="modaltable">
              <tr>
                <td><span class="modalBodyTerms">hotel name:</span>
                </td>
                <td><span id="hotel"></span>
                </td>
              </tr>
              <tr>
                <td><span class="modalBodyTerms">category:</span>
                </td>
                <td>
                  <select id="category" class="form-control">
                  </select>
                </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button id="deletePost" type="button" class="btn btn-primary">
              update category
            </button>
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
      processing: true,
      serverSide: true,
      pagingType: "input",
      autoWidth: false,
      ajax: 'scripts/server_processingforPost.php',
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
    var category,hotelName,output="";
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }

      hotelName = $(this).find('td').eq(0).text();
       /*Get userId for blocking user*/
      /*Get userId for blocking user*/
      $('#hotel').html(($(this).find('td').eq(0).text()));
      $('#category').val(($(this).find('td').eq(1).text()));
      
       console.log('hotelName is:' + $(this).find('td').eq(0).text());

       $.ajax({
         url: 'scripts/getcategory.php',
         type: 'GET',
         dataType: 'json',
         // data: {param1: 'value1'},
       })
       .done(function(data) {
         console.log("success");
         console.log(data);
         console.log(data['category'][0]['categoryName']);
         output="";
         $("#category").empty();
         for(var i=0;i<data['category'].length;i++)
         {
            var dat=data['category'][i]['categoryName'];
            output+="<option value="+dat+">"+dat+"</option>";          
         }
         console.log(output);
         $("#category").append(output);
       })
       .fail(function() {
         console.log("error");
       });
       
    });

    $('#myModal').on('hidden.bs.modal', function(e) {
       
      table.$('tr.success').removeClass('success');
    })

    $('#deletePost').click(function() {
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
    });
  });
  </script>
</body>

</html>
