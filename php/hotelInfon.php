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
           <li><a class="active" href="hotelInfon.php">Hotel Info</a>
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
          <div id="google_translate_element" ></div>
        <div class="form-inline">
       <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
           <tr>
             <th>Hotel Id</th>
             <th>Hotel Name</th>
             <th>Category</th>
             <th>Latitude</th>
             <th>Longitude</th>
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
               <td><?php echo $report['categoryName'];?></td>
               <td><?php echo $report['latitude'];?></td>
               <td><?php echo $report['longitude'];?></td>
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
                  <input class="form-control" type="text" name="hotelName" id="hotelName" disabled>
                </div>
              </div>
              


              <div class="form-group">
                  <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                      <textarea id="description" cols="60" rows="3" class="form-control" maxlength="180"></textarea>
                    </div>
              </div>

              <!-- <div class="form-group">
                <label class="control-label col-sm-2" for="email">category</label>
                <div class="col-sm-10">
                 <input type="checkbox" name="category" id="category" value="category"></input>
                </div>
              </div>
 -->
              <div class="control-label">
                <label class="control-label col-sm-2">Upload Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload" value="" style="margin-top:7px">
                <input type="button" id="remove" name="remove" value="remove" style="margin-left: 4px;">
                <br/>
                <br/>
                <label for="exampleText" class="control-label" style="margin-top:14px">Select image to set priority</label>
                <br/>
                <label for="exampleText" class="control-label" style="margin-top:14px">Current Image Set On Priority: </label>
                <label id="priority"></label>
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
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>


  <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function (event) {
      // alert("hi");
      var userTable = $('#example').dataTable( /*{
        // "processing": true,
        "serverSide": true,
        "ajax":"scripts/hotalinfo11.php",
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
    }*/);
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
    var hotelId,timezone,description,address,url="",breakfast,tradeName,notes,foodBeverage,around,city="",zone="", output2="",langId;
    var files = new FormData();
    var table = $('#example').DataTable();

    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      // alert("hiii");
      
      langId=$("#hotalId").text();
      if(langId!='Hotel Id')
      {
        alert("turkish");
      }

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
        // alert("hi");
       $("#scroll1").scrollTop(0);
        console.log("hotel info success");
        
        $( '#myform' ).each(function(){
                    this.reset();
                });
        $("#tradeName").empty();

            for(var key in data['info'][0])
            {
              
             if($("#"+key).prop('type')=='text')
              {
                // alert("hi");
                // console.log(key);
                 $("#"+key).val(data['info'][0][key]);
              }
              else 
                $("#"+key).text(data['info'][0][key]);
            }
      })
      .fail(function() {
        console.log("hotel info error");
      });
      
      $("#description").on('keyup', function(event) {
        event.preventDefault();
        /* Act on the event */
        if($.isNumeric($("#description").val()))
        {
          $("#submit").hide();
        }
        else
        {
          $("#submit").show();
        }
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
          $("#priority").text("");
          if(data['imageUrl']){
            console.log("image url  success");
            console.log(data);
            console.log("hotel id is"+data['imageUrl'][0]['hotelId']);
                      // console.log(data.priority);
                      var output = "",id="";
                      $("ul#image").empty();
                      var img = "",imageId="",priority="";
                      for (var i = 0; i < data['imageUrl'].length; i++) {
                        // console.log(data['imageUrl'][i]['imageUrl']);
                        
                        // $("#image").append('<img src="data["imageUrl"][i]["imageUrl"]" alt="data["imageUrl"][i]["imageUrl"]" />');
                        img = data['imageUrl'][i]['imageUrl'];
                        imageId = data['imageUrl'][i]['imageId'];
                        priority=data['priority']['imageId'];

                        console.log("image is" + img);
                        output += "<li><img src=" + img + " alt='image' height='100' border='2' width='100' class='' id=" + i + " url=" + img + " imageId="+imageId+"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+ imageId+"</li>";
                        
                      }
                      console.log(output);
                      $("ul#image").append(output);
      
                      $("#priority").text("");
                      $("#priority").empty();

                      $("#priority").text(priority);
                      
                    
                      // alert(priority);
                      $("#delete").show();


          }
          else
          {
              console.log("no data");
          }
        })
        .fail(function() {
          $("#priority").text("");
          console.log("url error");
        });
      //select code
      
      console.log("hotel id is:" + hotelId);
      
    });



$(".modal-body").on('click', 'ul#image li img', function (event) {
  // alert('hii');
  
  $("ul#image li img").attr('class', '');
  // alert($(this).attr('class'));
  $(this).attr('class', 'imageclass');
  url = $(this).attr('url');
  console.log(url);
  // alert($(this).attr('imageId'));
  // alert("url of image is is"+url);
  $("#delete").show();
  if($("#priority").text()==$(this).attr('imageId'))
  {
    // alert("hi");
    $("#delete").hide();
  }
});


$("#delete").on('click', function(event) {
  event.preventDefault();

  // alert('hi'+'url is:'+url+'hotelId is:'+hotelId);

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
    alert("Image Deleted");
    $('#myModal').modal('hide');
  })
  .fail(function() {
    console.log("error");
    alert("error");
  });
  

});

$("#fileToUpload").on('change', function(event) {
  event.preventDefault();
  /* Act on the event */
  // alert("hi");

    var file = $('#fileToUpload').val();

    var F = this.files,w,h,t,n,s,ss;
      if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );

      function readImage(file) {
        
          var reader = new FileReader();
          var image  = new Image();
        
          reader.readAsDataURL(file);  
          reader.onload = function(_file) {
              image.src    = _file.target.result;              // url.createObjectURL(file);
              image.onload = function() {
                   w = this.width;
                      h = this.height;
                      t = file.type;                          // ext only: // file.type.split('/')[1],
                      n = file.name;
                      s = ~~(file.size/1024);
                  // $('#uploadPreview').append('<img src="'+ this.src +'"> '+w+'x'+h+' '+s+' '+t+' '+n+'<br>');
                  // alert("resolution is"+w+"*"+h);
                   $("#validate").show();
                   check();
              };
              image.onerror= function() {
                  // $("#uploadPreview").text("Invalid file");
                  alert("invalid file type");
                  $("#fileToUpload").val("");
                   $("#submit").hide();
              };      
          };
          
      }

      // var pic_real_height = pic.height();
      function check()
      {
       if(w==640 & h==498)
       {
        // alert(w);
         // alert("resolution proper");
          $("#submit").show();

        if(s>1024)
        {
         // alert("hi"+this.files[0].size);
         // extension();
         alert('Size More Than 1MB');
         $("#submit").hide();
        }
        else
        {
         // extension();
         // alert('size proper');
         $("#submit").show();
        }

       }
       else
       {
        alert("Resolution Incorrect");
        $("#submit").hide();
       }

  }
});

$("#remove").on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  $('#fileToUpload').val("");
  $("#submit").show();
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
      // timezone=$("#timezone").val();
      description=$("#description").val();
      
      console.log("description is "+description);
      console.log("url is"+url);


      data.append('url',url);
      data.append('description',description);
      data.append('hotelId',hotelId);
    

      $.ajax({
          url: "../php/savehotelinfo11.php",
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
