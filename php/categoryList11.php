<?php 
session_start(); 
if(!isset($_SESSION[ 'userLogged'])) 
  { 
    header( "Location: ../index.php"); 
  }
include("scripts/hotal.php");
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
       <li><a  href="hotelInfon.php">Hotel Info</a>
       </li>
       <li><a class="active" href="categoryList11.php">Category List</a>
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
                <th data-class="expand">HOTEL ID</th>
                 <th >HOTEL NAME</th>
                <th>CATEGORY</th>
              </tr>
            </thead>
            <!--tbody section is required-->
            <tbody>
              <?php foreach($reported as $report)
              {
              ?>
              <tr>
                  <td><?php echo $report['hotelId'];?></td>
                  <td><?php echo $report['hotelName'];?></td>
                  <td><?php echo $report['categoryName'];?></td>
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
                <td><span class="modalBodyTerms">Hotel Id:</span>
                </td>
                <td><span id="hotel"></span>
                </td>
              </tr>
              <tr>
                <td><span class="modalBodyTerms">Category:</span>
                </td>
                <td>
                  <select id="category" class="form-control">
                  </select>
                </td>
              </tr>
              <tr>
                <td><span class="modalBodyTerms">Description:</span>
                </td>
                <td>
                  <textarea id="description" class="form-control" cols="60" rows="3" style="margin-top: 10px;display:block;">
                  </textarea>
                </td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button id="deletePost" type="button" class="btn btn-primary">
              Update Category
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
  <script src="http://cdn.datatables.net/plug-ins/725b2a2115b/api/fnReloadAjax.js"></script>

  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function (event) {
      // alert("hi");
      var userTable = $('#example').dataTable( /*{
        // "processing": true,
        "serverSide": true,
        "ajax":"scripts/hotal.php",
        "lengthMenu": [10, 25],
        "paginationType" : "input",
        columns: [
                { data:'hotelId'},
                { data: 'hotelName' },
                { data: 'category' },
            ],
        fnRowCallback:function(nRow,aData, iDisplayIndex, iDisplayIndexFull){
          var seenReportedVal =Number($('td:eq(3)', nRow).text());
      console.log($('td:eq(3)', nRow).text());
          if(seenReportedVal==0)
          {
           $(nRow).addClass('bold');
          }
          $('td:eq(3)', nRow).addClass('hideCol');
        },
      });  
    }*/
    );
  </script>

  <script>
  /*'use strict';

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

*/
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

      category=$(this).find('td').eq(2).text();
      $("#description").empty();
      $("#description").attr('disabled',true);
      // alert(category);

      // $('#category').val(($(this).find('td').eq(2).text()));
      // alert("category is"+ $(this).find('td').eq(1).text());

       console.log('hotelName is:' + $(this).find('td').eq(0).text());

       $.ajax({
         url: 'scripts/getcategory.php',
         type: 'GET',
         dataType: 'json',
         data: {
          hotelId: $(this).find('td').eq(0).text()
        },
       })
       .done(function(data) {
         console.log("success");
         console.log(data);
         console.log(data['category'][0]['categoryName']);
         output="";
         $("#category").empty();
         for(var i=0;i<data['category'].length;i++)
         {
            var cat=data['category'][i]['categoryId'];
            var dat=data['category'][i]['categoryName'];
            var tat=data['category'][i]['description'];
            output+="<option value="+dat+" name="+tat+" cat="+cat+">"+dat+"</option>";          
         }
         // console.log(output);
         $("#category").append(output);
         $("#category").val(category);
         // $("#description").text(data['category'][i]['des']);
       })
       .fail(function() {
         console.log("error");
       });

       //call to get description of default category 
       $.ajax({
         url: 'scripts/getcategory1.php',
         type: 'GET',
         dataType: 'json',
         data: {
          category: category
        },
       })
       .done(function(data) {
         console.log("success");
         $("#description").empty();
         $("#description").text(data['description'][0]['description']);
       })
       .fail(function() {
         console.log("error");
       });
       

    });

  $("#category").change(function(event) {
    /* Act on the event */
    // alert("hi");

    $.ajax({
      url: 'scripts/getcategory1.php',
      type: 'GET',
      dataType: 'json',
      data: {
        category: $("#category").val()
      },
    })
    .done(function(data) {
      console.log("success");
      console.log(data);
      $("#description").empty();
      $("#description").text(data['description'][0]['description']);

    })
    .fail(function() {
      console.log("error");
    });

    
  });

    $('#myModal').on('hidden.bs.modal', function(e) {
       
      table.$('tr.success').removeClass('success');
    })

    $('#deletePost').click(function() {
      category = $("#category option:selected").attr('cat');
       console.log('category is:' + category);
      $.ajax({
          url: "../php/deleteBet.php",
          // async: false,
          data: {
            categoryId: category,
            hotelName:hotelName
          },
          type: "POST",
          // dataType: "json",
        })
        .done(function(data) {
          //alert(data.response);
          console.log('success');
      $("#example").DataTable().draw();
      location.reload();
        })
        .fail(function() {
           console.log('fail');
          //alert(data.response);
        });
      $('#myModal').modal('hide');
    });
  });
  </script>
</body>

</html>
