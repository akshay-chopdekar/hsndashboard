<?php /*session_start(); if(!isset($_SESSION[ 'userLogged'])) { header( "Location: ../index.php"); }*/ ?>
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
      <li><a class="active" href="hotelInfo.php">hotel info</a>
      </li>
      <li><a href="categoryList.php">category list</a>
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
                <th data-class="expand">Hotel ID</th>
                <th>Hotel Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Lat long</th>
              </tr>
            </thead>
            <!--tbody section is required-->
            <tbody></tbody>
          </table>
        </div>
        
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-dialog">
        <div class="modal-content" style="width: 600px;height:600px;overflow:-moz-scrollbars-vertical;overflow-y:auto;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                       User Details
                    </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="myform" enctype="multipart/form-data">
              <div class="form-group" >
                <label class="control-label col-sm-2" for="email">Hotel Id</label>
                <div class="col-sm-10">
                  <p id="hotelId"></p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" >Hotel Name</label>
                <div class="col-sm-10">
                  <input type="text" name="hotelName" id="hotelName">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" >Star</label>
                <div class="col-sm-10">
                  <input type="text" name="star" id="star">
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" >Room Amount</label>
                <div class="col-sm-10">
                  <input type="text" name="roomAmount" id="roomAmount">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">check In Time</label>
                <div class="col-sm-10">
                  <input type="text" name="checkInTime" id="checkInTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">check Out Time</label>
                <div class="col-sm-10">
                  <input type="text" name="checkOutTime" id="checkOutTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">breakfast</label>
                <div class="col-sm-10">
                  <input type="text" name="breakfast" id="breakfast">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">tradeName</label>
                <div class="col-sm-10">
                  <input type="text" name="tradeName" id="tradeName" >
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">address</label>
                <div class="col-sm-10">
                   <textarea id="address" cols="60" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">postCode</label>
                <div class="col-sm-10">
                  <input type="text" name="postCode" id="postCode">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >phoneNumber</label>
                <div class="col-sm-10">
                  <input type="text" name="phoneNumber" id="phoneNumber">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >fax</label>
                <div class="col-sm-10">
                  <input type="text" name="fax" id="fax">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >emailId</label>
                <div class="col-sm-10">
                  <input type="text" name="emailId" id="emailId">
                </div>
              </div>   <div class="form-group">
              <label class="control-label col-sm-2" >website</label>
                <div class="col-sm-10">
                  <input type="text" name="website" id="website">
                </div>
              </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" >salesPerson</label>
                <div class="col-sm-10">
                  <input type="text" name="salesPerson" id="salesPerson">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >salesPersonContact</label>
                <div class="col-sm-10">
                  <input type="text" name="salesPersonContact" id="salesPersonContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >accountName</label>
                <div class="col-sm-10">
                  <input type="text" name="accountName" id="accountName">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >accountContact</label>
                <div class="col-sm-10">
                  <input type="text" name="accountContact" id="accountContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >wifi</label>
                <div class="col-sm-10">
                  <input type="text" name="wifi" id="wifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >complementaryWifi</label>
                <div class="col-sm-10">
                  <input type="text" name="complementaryWifi" id="complementaryWifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >selfParking</label>
                <div class="col-sm-10">
                  <input type="text" name="selfParking" id="selfParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >selfParkingRate</label>
                <div class="col-sm-10">
                  <input type="text" name="selfParkingRate" id="selfParkingRate">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >valeParking</label>
                <div class="col-sm-10">
                  <input type="text" name="valeParking" id="valeParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >valeParkingRate</label>
                <div class="col-sm-10">
                  <input type="text" name="valeParkingRate" id="valeParkingRate">
                </div>
            </div>
              <div class="form-group">
              <label class="control-label col-sm-2" >complementaryParking</label>
                <div class="col-sm-10">
                  <input type="text" name="complementaryParking" id="complementaryParking">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" >conciergeService</label>
                <div class="col-sm-10">
                  <input type="text" name="conciergeService" id="conciergeService">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >petFriendly</label>
                <div class="col-sm-10">
                  <input type="text" name="petFriendly" id="petFriendly">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" >outdoorPool</label>
                <div class="col-sm-10">
                  <input type="text" name="outdoorPool" id="outdoorPool">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >indoorPool</label>
                <div class="col-sm-10">
                  <input type="text" name="indoorPool" id="indoorPool">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >fitnessCenter</label>
                <div class="col-sm-10">
                  <input type="text" name="fitnessCenter" id="fitnessCenter">
                </div>
            </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Time Zone</label>
                <div class="col-sm-10">
                  <select name="timezone" id="timezone" class="form-control">
                    <option value="Delhi">Delhi</option>
                    <option value="turkey">turkey</option>
                    <option value="donkey">donkey</option>
                    <option value="chinmay">chinmay</option>
                    <option value="EET">EET</option>
                    <option value="EST">EST</option>
                    <option value="DST">DST</option>
                  </select>
                </div>
              </div>
              <div class="control-label">
                <label class="control-label col-sm-2">description</label>
                <textarea id="description" cols="60" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">category</label>
                <div class="col-sm-10">
                  <p id="category"></p>
                </div>
              </div>

              <div class="control-label">
                <input type="file" name="fileToUpload" id="fileToUpload" value="">
                <label class="control-label col-sm-2">images</label>
                <!-- <p id="image"></p> -->
                <ul id="image" style="width: 400px;height: 200px;overflow:-moz-scrollbars-vertical;overflow-y:auto;"></ul>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input id="submit" type="submit" class="btn btn-default" name="submit" value="submit">
                </div>
              </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input id="delete" type="button" class="btn btn-default" name="delete" value="delete">
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

      processing: true,
      serverSide: true,
      pagingType: "input",
      autoWidth: false,
      ajax: 'scripts/server_processing.php',

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

  $(document).ready(function() {
    var hotelId,timezone,description,url="";
    var files = new FormData();
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }
      hotelId = $(this).find('td').eq(0).text(); /*Get userId for blocking user*/
     
      $('#fileToUpload').val("");
     
     //ajax call to retrive hotel info
     
      $.ajax({
        url: 'scripts/hotelinfo.php',
        type: 'GET',
        dataType: 'json',
        data: {
          hotelId: hotelId
        },
      })
      .done(function(data) {
        console.log("hotel info success");
        // console.log(data);
        console.log(data['info'][0]['timezone']);

        $("#hotelId").html(data['info'][0]['hotelId']);
        $("#timezone").val(data['info'][0]['timezone']);
        $("#hotelName").val(data['info'][0]['hotelName']);
        $("#star").val(data['info'][0]['star']);
        $("#roomAmount").val(data['info'][0]['roomAmount']);
        $("#checkInTime").val(data['info'][0]['checkInTime']);
        $("#checkOutTime").val(data['info'][0]['checkOutTime']);
        $("#breakfast").val(data['info'][0]['breakfast']);
        $("#tradeName").val(data['info'][0]['tradeName']);
        $("#address").text(data['info'][0]['address']);
        $("#postCode").val(data['info'][0]['postCode']);
        $("#phoneNumber").val(data['info'][0]['phoneNumber']);
        $("#fax").val(data['info'][0]['fax']);
        $("#emailId").val(data['info'][0]['emailId']);
        $("#website").val(data['info'][0]['website']);
        $("#salesPerson").val(data['info'][0]['salesPerson']);
        $("#salesPersonContact").val(data['info'][0]['salesPersonContact']);
        $("#accountName").val(data['info'][0]['accountName']);
        $("#accountContact").val(data['info'][0]['accountContact']);
        $("#wifi").val(data['info'][0]['wifi']);
        $("#complementaryWifi").val(data['info'][0]['complementaryWifi']);
        $("#selfParking").val(data['info'][0]['selfParking']);
        $("#selfParkingRate").val(data['info'][0]['selfParkingRate']);
        $("#valeParking").val(data['info'][0]['valeParking']);
        $("#valeParkingRate").val(data['info'][0]['valeParkingRate']);
        $("#complementaryParking").val(data['info'][0]['complementaryParking']);
        $("#conciergeService").val(data['info'][0]['conciergeService']);
        $("#petFriendly").val(data['info'][0]['petFriendly']);
        $("#outdoorPool").val(data['info'][0]['outdoorPool']);
        $("#indoorPool").val(data['info'][0]['indoorPool']);
        $("#fitnessCenter").val(data['info'][0]['fitnessCenter']);






      })
      .fail(function() {
        console.log("hotel info error");
      });
      
     

      //ajax call to retrive hotel images link
     
      $.ajax({
          url: 'scripts/hotelimagesquery.php',
          type: 'GET',
          dataType: 'json',
          data: {
            hotelId: hotelId
          },
        })
        .done(function(data) {
          $("ul#image").empty();
          if(data['imageUrl']){
            console.log("success");
            console.log("hotel id is"+data['imageUrl'][0]['hotelId']);
                      // console.log(data.priority);
                      var output = "";
                      $("ul#image").empty();
                      var img = "";
                      for (var i = 0; i < data['imageUrl'].length; i++) {
                        // console.log(data['imageUrl'][i]['imageUrl']);
                        
                        // $("#image").append('<img src="data["imageUrl"][i]["imageUrl"]" alt="data["imageUrl"][i]["imageUrl"]" />');
                        img = data['imageUrl'][i]['imageUrl'];
                        console.log("image is" + img);
                        output += "<li><img src=" + img + " alt='image' height='100' border='2' width='100' class='' id=" + i + " url=" + img + "></li>";
                        
                      }
                      console.log(output);
                      $("ul#image").append(output);
          }
          else
          {
              console.log("no data");
          }
        })
        .fail(function() {
          console.log("url error");
        });
      //select code
      

/*      $('#hotelId').html(($(this).find('td').eq(0).text()));
      $('#hotelName').html(($(this).find('td').eq(1).text()));
      $('#blockedStatus').html(($(this).find('td').eq(3).text()));
      $("#timezone").val($(this).find('td').eq(3).text());
      $("#category").text($(this).find('td').eq(4).text());
      $("#description").val($(this).find('td').eq(5).text());*/

      // $("#hotelName").val($(this).find('td').eq(1).text());
      // $('#timezone').val("EET");
      // alert($(this).find('td').eq(3).text());
       
      console.log("hotel id is:" + hotelId);
      
    });

$(".modal-body").on('click', 'ul#image li img', function (event) {
  // alert('hii');
  
  $("ul#image li img").attr('class', '');
  // alert($(this).attr('class'));
  $(this).attr('class', 'imageclass');
  url = $(this).attr('url');
  console.log(url);
  alert("url of image is is"+url);
});


$("#delete").on('click', function(event) {
  event.preventDefault();

  alert('hi'+'url is:'+url+'hotelId is:'+hotelId);

  $.ajax({
    url: 'scripts/deleteimages.php',
    type: 'POST',
    dataType: 'json',
    data: {
      hotelId: hotelId,
      url:url
    },
  })
  .done(function() {
    console.log("success");
    alert("success");
    $('#myModal').modal('hide');
  })
  .fail(function() {
    console.log("error");
    alert("error");
  });
  

});


//select code end

///*******//

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


      // alert("id is"+url);
      timezone=$("#timezone").val();
      description=$("#description").val();
      console.log("timezone is "+timezone);
      console.log("description is "+description);
      console.log("url is"+url);
      console.log("file is" + files);

      data.append('url',url);
      data.append('description',description);
      data.append('hotelId',hotelId);


      $.ajax({
          url: "../php/blockuser.php",
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
          $("#example").DataTable().draw();
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
