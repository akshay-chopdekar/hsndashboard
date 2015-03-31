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
  @media screen and (min-width:768px){
    .form-horizontal .control-label{
      font-size:13px;
    }
  }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div id="nav" class="col-xs-3 navColor" style="width:260px;padding-left: 0px;">
        <div class="block">
          <img class="center-block logo" src="../images/HSN_logo.png">
        </div>
    <ul class="nav">
           <li><a class="active" href="hotelInfo.php">Hotel Info</a>
           </li>
           <li><a  href="categoryList.php">Category List</a>
           </li>
           <li><a href="campaign.php">Campaign</a>
           </li>
           <li><a href="userReview.php">User Reviews</a>
           </li>
           <li><a href="promoCode.php">Promo Code</a>
           </li>
            <li><a href="payment.php">Payment</a>
          </li>
            <li><a href="useradd.php">Add User</a>
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
                <th>Lat</th>
                <th>Long</th>
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
        <div class="wrapper">
          
        </div>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                       User Details
                    </h4>
          </div>
          <div class="modal-body" style="width: 600px;height:461px;overflow:-moz-scrollbars-vertical;overflow-y:auto;">
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
                  <input class="form-control" type="text" name="hotelName" id="hotelName">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" >Star</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="star" id="star">
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" >Room Amount</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="roomAmount" id="roomAmount">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">check In Time</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="checkInTime" id="checkInTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">check Out Time</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="checkOutTime" id="checkOutTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">breakfast</label>
                <div class="col-sm-10">
                <textarea id="breakfast" cols="60" rows="3" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">tradeName</label>
                <div class="col-sm-10">
                  <textarea id="tradeName" cols="60" rows="3" class="form-control"></textarea>

                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">address</label>
                <div class="col-sm-10">
                   <textarea id="address" cols="60" rows="3" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">postCode</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="postCode" id="postCode">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >phoneNumber</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="phoneNumber" id="phoneNumber">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >fax</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="fax" id="fax">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >emailId</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="emailId" id="emailId">
                </div>
              </div>   <div class="form-group">
              <label class="control-label col-sm-2" >website</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="website" id="website">
                </div>
              </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" >salesPerson</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="salesPerson" id="salesPerson">

                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >salesPersonContact</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="salesPersonContact" id="salesPersonContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >accountName</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="accountName" id="accountName">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >accountContact</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="accountContact" id="accountContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >wifi</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="wifi" id="wifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >complementaryWifi</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="complementaryWifi" id="complementaryWifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >selfParking</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="selfParking" id="selfParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >selfParkingRate</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="selfParkingRate" id="selfParkingRate">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >valeParking</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="valeParking" id="valeParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >valeParkingRate</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="valeParkingRate" id="valeParkingRate">
                </div>
            </div>
              <div class="form-group">
              <label class="control-label col-sm-2" >complementaryParking</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="complementaryParking" id="complementaryParking">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" >conciergeService</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="conciergeService" id="conciergeService">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >petFriendly</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="petFriendly" id="petFriendly">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" >outdoorPool</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="outdoorPool" id="outdoorPool">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >indoorPool</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="indoorPool" id="indoorPool">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >fitnessCenter</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="fitnessCenter" id="fitnessCenter">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >sauna</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="sauna" id="sauna">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >spaServices</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="spaServices" id="spaServices">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >airportShuttle</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="airportShuttle" id="airportShuttle">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >rooftop</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="rooftop" id="rooftop">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >dryCleaning</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="dryCleaning" id="dryCleaning">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >ironing</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="ironing" id="ironing">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >nonSmoking</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="nonSmoking" id="nonSmoking">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >notes</label>
                <div class="col-sm-10">
                  <textarea id="notes" cols="60" rows="3" class="form-control"></textarea>
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >foodBeverage</label>
                <div class="col-sm-10">
                  <textarea id="foodBeverage" cols="60" rows="3" class="form-control"></textarea>
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >around</label>
                <div class="col-sm-10">
                  <textarea id="around" cols="60" rows="3" class="form-control"></textarea>
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >24hrRoomService</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="24hrRoomService" id="24hrRoomService">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >roomService</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="roomService" id="roomService">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >restaurantOnsite</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="restaurantOnsite" id="restaurantOnsite">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >barOnsite</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="barOnsite" id="barOnsite">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >extraGuestPolicy</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="extraGuestPolicy" id="extraGuestPolicy">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >flatScreenTV</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="flatScreenTV" id="flatScreenTV">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >satelliteTV</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="satelliteTV" id="satelliteTV">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >miniBar</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="miniBar" id="miniBar">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >hotBeverages</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="hotBeverages" id="hotBeverages">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >kettle</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="kettle" id="kettle">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >electronicSafe</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="electronicSafe" id="electronicSafe">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >airConditioning</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="airConditioning" id="airConditioning">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >hairDrier</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="hairDrier" id="hairDrier">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >workingDesk</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="workingDesk" id="workingDesk">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >childrenPolicy</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="childrenPolicy" id="childrenPolicy">
                </div>
            </div>
               
               <div class="form-group">
              <label class="control-label col-sm-2" >category</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="category" id="category">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >lat long</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="latlong" id="latlong">
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
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" value="">
                <label class="control-label col-sm-2">images</label>
                <!-- <p id="image"></p> -->
                <ul id="image" style="width: 400px;height: 200px;overflow:-moz-scrollbars-vertical;overflow-y:auto;"></ul>
              </div>
            </div>
                <div class="modal-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input class="form-control" id="submit" type="submit" class="btn btn-default" name="submit" value="submit">
                </div>
              </div>
                <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input class="form-control" id="delete" type="button" class="btn btn-default" name="delete" value="delete">
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
  function translateText(response) {
    document.body.innerHTML = response.data.translations[0].translatedText;
  }

  'use strict';
  $(document).ready(function() {

      var sourceLan, targetLang;
      $("body").on("click",".langChange",function(event) {
        if ($(this).val() == 'Turkish') {
          
          sourceLan = "en";
          targetLang = "tr";
        } else {
          
          sourceLan = "tr";
          targetLang = "en";
        }
        var sourceText = escape(document.body.innerHTML);
        $.ajax({
          url: 'https://www.googleapis.com/language/translate/v2?key=AIzaSyDnlr2pbGEfUbpEH669KAuD9P0Sjq5ptS4&source=' + sourceLan + '&target=' + targetLang + '&callback=translateText&q=' + sourceText,
          type: "get",
          dataType:"jsonp",
          processing: false,
          cache: false
        }).done(function(response) {
          console.log("translation completed!");
        });
      });


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
    var hotelId,timezone,description,address,url="",breakfast,tradeName,notes,foodBeverage,around;
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
        $("#breakfast").text(data['info'][0]['breakfast']);
        $("#tradeName").text(data['info'][0]['tradeName']);
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
        $("#sauna").val(data['info'][0]['sauna']);
        $("#spaServices").val(data['info'][0]['spaServices']);
        $("#airportShuttle").val(data['info'][0]['airportShuttle']);
        $("#rooftop").val(data['info'][0]['rooftop']);
        $("#dryCleaning").val(data['info'][0]['dryCleaning']);
        $("#ironing").val(data['info'][0]['ironing']);
        $("#nonSmoking").val(data['info'][0]['nonSmoking']);
        $("#notes").text(data['info'][0]['notes']);
        $("#foodBeverage").text(data['info'][0]['foodBeverage']);
        $("#around").text(data['info'][0]['around']);
        $("#24hrRoomService").val(data['info'][0]['24hrRoomService']);
        $("#roomService").val(data['info'][0]['roomService']);
        $("#restaurantOnsite").val(data['info'][0]['restaurantOnsite']);
        $("#barOnsite").val(data['info'][0]['barOnsite']);
        $("#extraGuestPolicy").val(data['info'][0]['extraGuestPolicy']);
        $("#flatScreenTV").val(data['info'][0]['flatScreenTV']);
        $("#satelliteTV").val(data['info'][0]['satelliteTV']);
        $("#miniBar").val(data['info'][0]['miniBar']);
        $("#hotBeverages").val(data['info'][0]['hotBeverages']);
        $("#kettle").val(data['info'][0]['kettle']);
        $("#electronicSafe").val(data['info'][0]['electronicSafe']);
        $("#airConditioning").val(data['info'][0]['airConditioning']);
        $("#workingDesk").val(data['info'][0]['workingDesk']);
        $("#hairDrier").val(data['info'][0]['hairDrier']);
        $("#childrenPolicy").val(data['info'][0]['childrenPolicy']);
        $("#timezone").val(data['info'][0]['timezone']);
        $("#category").val(data['info'][0]['category']);
        $("#description").val(data['info'][0]['description']);
        $("#latlong").val(data['info'][0]['latlong']);





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
      address=$("#address").val();
      breakfast=$("#breakfast").val();
      tradeName=$("#tradeName").val();
      notes=$("#notes").val();
      foodBeverage=$("#foodBeverage").val();
      around=$("#around").val();
      
      console.log("timezone is "+timezone);
      console.log("description is "+description);
      console.log("url is"+url);
      console.log("file is" + files);

      data.append('url',url);
      data.append('description',description);
      data.append('hotelId',hotelId);
      data.append('address',address);
      data.append('breakfast',breakfast);
      data.append('tradeName',tradeName);
      data.append('notes',notes);
      data.append('foodBeverage',foodBeverage);
      data.append('around',around);


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
