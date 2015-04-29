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
           <li><a class="active" href="hotelInfo1.php">Hotel Info</a>
           </li>
           <li><a  href="categoryList1.php">Category List</a>
           </li>
           <li><a href="campaign.php">Promotion Type</a>
           </li>
           <li><a  href="promotion.php">Promotion</a>
           </li>
           <li><a href="userReview1.php">User Reviews</a>
           </li>
           <li><a href="promoCode.php">Promo Code</a>
           </li>
            <li><a href="payment.php">Confirm Hotel & Payment</a>
          </li>
          <li><a href="useradd.php">Add User</a>
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
             <th data-class="expand">Hotel Id</th>
             <th>Hotel Name</th>
             <th>Category</th>
             <th>Latitude</th>
             <th>Longitude</th>
           </tr>
         </thead>
         <!-- tbody section is required -->
         <!-- <tbody></tbody> -->
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
          <div class="modal-body scrollspy-example" data-spy="scroll" style="height:461px;overflow:-moz-scrollbars-vertical;overflow-y:auto;" id="scroll1">
            <!-- <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example"> -->
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
                <label class="control-label col-sm-2 labelAlign" >Star</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="star" id="star">
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-2" >Room Amount</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="roomAmount" id="roomAmount">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">CheckIn Time</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="checkInTime" id="checkInTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">CheckOut Time</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="checkOutTime" id="checkOutTime">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">Breakfast</label>
                <div class="col-sm-10">
                <textarea id="breakfast" cols="60" rows="3" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">Trade Name</label>
                <div class="col-sm-10">
                  <textarea id="tradeName" cols="60" rows="3" class="form-control"></textarea>

                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2">Address</label>
                <div class="col-sm-10">
                   <textarea id="address" cols="60" rows="3" class="form-control"></textarea>
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign oneLi">Post Code</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="postCode" id="postCode">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Phone Number</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="phoneNumber" id="phoneNumber">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Fax</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="fax" id="fax">
                </div>
              </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >emailId</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="emailId" id="emailId">
                </div>
              </div>   <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Website</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="website" id="website">
                </div>
              </div> 
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Sales Person</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="salesPerson" id="salesPerson">

                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >SalesPerson
                Contact</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="salesPersonContact" id="salesPersonContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Account Name</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="accountName" id="accountName">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign newLine" >Account
                Contact</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="accountContact" id="accountContact">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign">wifi</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="wifi" id="wifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign " style="font-size:12px">Complementry
                Wifi</label>
                <div class="col-sm-10">
                  <input class="form-control newLine zeroOneWidth" type="text" name="complementaryWifi" id="complementaryWifi">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Self Parking</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="selfParking" id="selfParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign " >SelfParking
                Rate</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="selfParkingRate" id="selfParkingRate">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Vale Parking</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="valeParking" id="valeParking">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign " >ValeParking
                Rate</label>
                <div class="col-sm-10">
                  <input class="form-control newLine zeroOneWidth" type="text" name="valeParkingRate" id="valeParkingRate">
                </div>
            </div>
              <div class="form-group">
              <label class="control-label col-sm-2 labelAlign " style="font-size:12px">Complementry
                Parking</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="complementaryParking" id="complementaryParking">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" >Concierge
                Service</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="conciergeService" id="conciergeService">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Pet Friendly</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="petFriendly" id="petFriendly">
                </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Outdoor Pool</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="outdoorPool" id="outdoorPool">
                </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Indoor Pool</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="indoorPool" id="indoorPool">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >Fitness Center</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="fitnessCenter" id="fitnessCenter">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Sauna</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="sauna" id="sauna">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Spa Services</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="spaServices" id="spaServices">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Airport Shuttle</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="airportShuttle" id="airportShuttle">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Roof Top</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="rooftop" id="rooftop">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Dry Cleaning</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="dryCleaning" id="dryCleaning">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Ironing</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="ironing" id="ironing">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Non Smoking</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="nonSmoking" id="nonSmoking">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >Notes</label>
                <div class="col-sm-10">
                  <textarea id="notes" cols="60" rows="3" class="form-control oneLine"></textarea>
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >Food Beverage</label>
                <div class="col-sm-10">
                  <textarea id="foodBeverage" cols="60" rows="3" class="form-control"></textarea>
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2" >Around</label>
                <div class="col-sm-10">
                  <textarea id="around" cols="60" rows="3" class="form-control oneLine"></textarea>
                </div>
            </div>
               <div class="form-group">
 <!-- here-->             <label class="control-label col-sm-2 labelAlign" >24hrRoom
 Service</label>
                <div class="col-sm-10">
                  <input class="form-control newLine" type="text" name="roomServiceHr24" id="roomServiceHr24">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Room Service</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="roomService" id="roomService">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Restaurant
                Onsite</label>
                <div class="col-sm-10">
                  <input class="form-control newLine zeroOneWidth" type="text" name="restaurantOnsite" id="restaurantOnsite">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >BAR Onsite</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="barOnsite" id="barOnsite">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >ExtraGuest
                Policy</label>
                <div class="col-sm-10">
                  <input class="form-control newLine " type="text" name="extraGuestPolicy" id="extraGuestPolicy">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >FlatScreen TV</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="flatScreenTV" id="flatScreenTV">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Satellite TV</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="satelliteTV" id="satelliteTV">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Mini Bar</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="miniBar" id="miniBar">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Hot Beverages</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="hotBeverages" id="hotBeverages">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Kettle</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="kettle" id="kettle">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Electronic Safe</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="electronicSafe" id="electronicSafe">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Air Conditioning</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="airConditioning" id="airConditioning">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Hair Drier</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine zeroOneWidth" type="text" name="hairDrier" id="hairDrier">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Working Desk</label>
                <div class="col-sm-10">
                  <input class="form-control zeroOneWidth" type="text" name="workingDesk" id="workingDesk">
                </div>
            </div>
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Children Policy</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="childrenPolicy" id="childrenPolicy">
                </div>
            </div>
               
               <div class="form-group">
              <label class="control-label col-sm-2 labelAlign" >Category</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="category" id="category">
                </div>
            </div>
               <!-- div class="form-group">
                and here             <label class="control-label col-sm-2 labelAlign" >Lat Long</label>
                <div class="col-sm-10">
                  <input class="form-control oneLine" type="text" name="latlong" id="latlong">
                </div>
                           </div> -->

              <div class="form-group">
                <label class="control-label col-sm-2">City</label>
                <div class="col-sm-10">
                  <select name="city" id="city" class="form-control">
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Zones</label>
                <div class="col-sm-10">
                  <select name="zones" id="zones" class="form-control">
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2">Disctict</label>
                <div class="col-sm-10">
                  <input type="text" name="district" id="district">
                </div>
              </div>


              <div class="form-group">
                  <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                      <textarea id="description" cols="60" rows="3" class="form-control"></textarea>
                    </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">category</label>
                <div class="col-sm-10">
                 <input type="checkbox" name="category" id="category" value="category"></input>
                </div>
              </div>

              <div class="control-label">
                <label class="control-label col-sm-2">Upload Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload" value="" style="margin-top:7px">
                <label for="exampleText" class="control-label" style="margin-top:14px">Select image to set priority</label>
                <div class="clear-fix"></div>
                <br><br>
                <!-- <p id="image"></p> -->
                <ul id="image" class="list-inline" style="width: 400px;height: 200px;overflow:-moz-scrollbars-vertical;overflow-y:auto;"></ul>

                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input class="form-control" id="delete" type="button" class="btn btn-default" name="delete" value="delete Image">
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


  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function (event) {
      // alert("hi");
      var userTable = $('#example').dataTable( {
        // "processing": true,
        "serverSide": true,
        "ajax":"scripts/hotal.php",
        "lengthMenu": [10, 25],
        "paginationType" : "input",
        columns: [
                { data:'hotelId'},
                { data: 'hotelName' },
                { data: 'category' },
                { data: 'latitude' },
                { data: 'longitude' },
            ],
        fnRowCallback:function(nRow,aData, iDisplayIndex, iDisplayIndexFull){
          var seenReportedVal =Number($('td:eq(6)', nRow).text());
      console.log($('td:eq(6)', nRow).text());
          if(seenReportedVal==0)
          {
           $(nRow).addClass('bold');
          }
          $('td:eq(6)', nRow).addClass('hideCol');
        },
      });  
    });
  </script>


  <script>
  'use strict';
  /*$(document).ready(function() 
  {
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
*/
        // $("table#example thead tr th").eq(0).css('color', 'red');;
        /*$("table#example tbody tr").append('<td class="timeZone"></td>');
        $(".timeZone").append('<select name="timeZone" id="" class="form-control"><option value="">Delhi</option><option value="">turkey</option><option value="">donkey</option><option value="">chinmay</option></select>');
      }
    });
    //new code
  });
*/

  $(document).ready(function() {
    var hotelId,timezone,description,address,url="",breakfast,tradeName,notes,foodBeverage,around,city="",zone="", output2="";
    var files = new FormData();
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      // alert("hiii");

      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }

      hotelId = $(this).find('td').eq(0).text(); /*Get userId for blocking user*/
      // alert($("#scroll1").scrollTop());
      
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
        $("#scroll1").scrollTop(0);
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
        $("#roomServiceHr24").val(data['info'][0]['roomServiceHr24']);
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
        // $("#timezone").val(data['info'][0]['timezone']);
        $("#category").val(data['info'][0]['category']);
        $("#description").val(data['info'][0]['description']);
        // $("#latlong").val(data['info'][0]['latlong']);
        $("#district").val(data['info'][0]['district']);
        city=data['info'][0]['cityId'];
        // alert(city);
        // alert(data['info'][0]['zone']);
        zone=data['info'][0]['zone'];
        // $("#zones").val("<option value="+data['info'][0]['zone']+">"+data['info'][0]['zone']+"</option>");
        // 
        // 
        //check box code
            for(var key in data['info'][0])
            {
              
              if($("#"+key).is(':checkbox')){
                alert("hi");
              }
            }
        // 
        // 
        ///////////////////////////////
        /////ajax call to retrive city and zones
     
     $.ajax({
       url: 'scripts/getcity.php',
       type: 'GET',
       dataType: 'json',
       // data: {param1: 'value1'},
     })
     .done(function(data) {
       console.log("success");
       console.log(data);
       var output1="";

       $("#city").empty();
        $("#zones").empty();

       for(var i=0;i<data['city'].length;i++)
       {
          output1+="<option value="+data['city'][i]['city']+" name="+data['city'][i]['cityId']+">"+data['city'][i]['city']+"</option>";  
       }
       // console.log(output1);


// console.log(output2);
       $("#city").append(output1);
       $("#zones").append(output2);
       // alert("ciry is o"+city);

       //ajax call to retrive city name
       $.ajax({
         url: 'scripts/getcitybyid.php',
         type: 'GET',
         dataType: 'json',
         data: {
           city: city
         },
       })
       .done(function(data) {
         console.log("success getcitybyid");

         // alert(data);
         // $("#city").val("<option value="+data['info'][0]['city']+">"+data['info'][0]['city']+"</option>");
         
         // $("#city option:selected").text(data['info'][0]['city']);
         $("#city").val(data['info'][0]['city']);
         // alert(data['info'][0]);
         // console.log(data);
         console.log(data['info'][0]['city']);
       })
       .fail(function() {
         console.log("error getcitybyid");
       });


       //ajax call to retrive zones
       $.ajax({
         url: 'scripts/getcity.php',
         type: 'GET',
         dataType: 'json',
         data: {
          cityId: city
        },
       })
       .done(function(data) {
         console.log("success get zones");
         // console.log(data);
         output2="";
         for(var i=0;i<data['zones'].length;i++)
         {
          output2+="<option value="+data['zones'][i]['zone']+">"+data['zones'][i]['zone']+"</option>";
         }

         console.log(output2);
         $("#zones").empty();
         $("#zones").append(output2);

          $("#zones option[value="+zone+"]").attr('selected', 'selected');

       })
       .fail(function() {
         console.log("error get zones");
       });
       


     })
     .fail(function() {
       console.log("error");
     });
      
    //ajax call to retrive zones
    
   /* $.ajax({
      url: 'scripts/getcity.php',
      type: 'GET',
      dataType: 'json',
      data: {
       cityId: city
     },
    })
    .done(function(data) {
      console.log("success get zones");
      // console.log(data);
      var output3="";
      for(var i=0;i<data['zones'].length;i++)
      {
       output3+="<option value="+data['zones'][i]['zone']+">"+data['zones'][i]['zone']+"</option>";
      }

      console.log(output3);
      $("#zones").empty();
      $("#zones").append(output3);
      $("#zones option[value="+zone+"]").attr('selected', 'selected');


    })
    .fail(function() {
      console.log("error get zones");
    });
    
*/

      })
      .fail(function() {
        console.log("hotel info error");
      });
      

      //on change of city
      $("#city").on('change', function(event) {
        event.preventDefault();
        /* Act on the event */
        // alert("hi");
        
        // alert($("#city option:selected").attr('name'));

        $.ajax({
          url: 'scripts/getcity.php',
          type: 'GET',
          dataType: 'json',
          data: {
            cityId: $("#city option:selected").attr('name')
          },
        })
        .done(function(data) {
          console.log("success zones 2nd");
          console.log(data);

          var output3="";
          for(var i=0;i<data['zones'].length;i++)
          {
           output3+="<option value="+data['zones'][i]['zone']+">"+data['zones'][i]['zone']+"</option>";
          }

          console.log(output3);
          $("#zones").empty();
          $("#zones").append(output3);
          // $("#zones option[value="+zone+"]").attr('selected', 'selected');

        })
        .fail(function() {
          console.log("error zones 2nd");
        });
        
        
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
            // console.log(data);
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
  // alert("url of image is is"+url);
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
      data.append('timezone',timezone);



      $.ajax({
          url: "../php/savehotelinfo.php",
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
