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
  
  <meta name="google-translate-customization" content="a4ab8ee26d0a3df4-93d4d732f591be4b-g4ca1c1bb516de0ac-e"></meta>

  <script type="text/javascript">
   function googleTranslateElementInit() {
     new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,tr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
   }
   </script>
  
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
  </script>
       
  <style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
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
  p#hotelId{
    margin-top:7px;
  }
  @media screen and (min-width:768px){
    .form-horizontal .control-label{
      text-align:left;
    }
    .hotelid{
      padding-left: 30px;
    }
    .reviewz{
      padding-right: 23px;
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
             <li><a href="campaign.php">Promotion Type</a>
             </li>
             <li><a href="promotion.php">Promotion</a>
             </li>
             <li><a class="active" href="userReview.php">User Reviews</a>
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
        <div id="google_translate_element"></div>
        <div class="form-inline">
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th data-class="expand">Hotel ID</th>
                <th>Hotel Name</th>
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
                       Review Details
                    </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="myform" enctype="multipart/form-data">
              <div class="form-group">
                <label id="hotelid"  class="control-label col-sm-2" for="email" style="padding-left:30px">Hotel Id</label>
                <div class="col-sm-10">
                  <p id="hotelId"></p>
                </div>
              </div>

              <div class="control-label">
                <label id="reviewz" class="control-label col-sm-2">reviews</label><br/>
                <div style="width: 400px;height: 150px;overflow:-moz-scrollbars-vertical;overflow-y:auto;">
                <table class="table" id="modaltable">
                        <thead id="thead">
                          <tr>
                            <th style='width: 100px'>review</th>
                            <th style='width: 50px'>status</th>
                            <th >action</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">
                          <tr>
                            <td style="width: 400px">hello asd sadsd asfg</td>
                            <td>accept</td>
                            <td>action</td> 
                          </tr>
                        </tbody>
                      </table>
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
      ajax: 'scripts/server_processing1.php',

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
    var hotelId,reviews;
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
     
      

      $('#hotelId').html(($(this).find('td').eq(0).text()));
      /*$('#userName').html(($(this).find('td').eq(1).text()));
      $('#blockedStatus').html(($(this).find('td').eq(3).text()));*/
      $("#timezone").val($(this).find('td').eq(3).text());
      $("#description").val($(this).find('td').eq(4).text());
      // $('#timezone').val("EET");
      // alert($(this).find('td').eq(3).text());
       
      console.log("hotel id is:" + hotelId);

      $("#tbody").empty();

      $.ajax({
        url: 'scripts/hotelreviews.php',
        type: 'GET',
        dataType: 'json',
        data: {hotelId:hotelId},
      })
      .done(function(data) {
        console.log("success");
        console.log(data['rev']);

        var output="";
        var yes=1,no=0;
        if(data['rev'])
        {
        for(var i=0;i<data['rev'].length;i++)
        {
          reviews=data['rev'][i]['review'];
          
          var status,stat=data['rev'][i]['status'];
          var reviewid =data['rev'][i]['reviewId'];

          if(stat==1)
          {
            status='accepted';
          }
          else
          {
            status='rejected';
          }
          console.log("status is "+status);
          console.log("review is "+reviews);
          console.log("review id is "+reviewid);


          // output+="<li>"+reviews+"&nbsp;&nbsp;&nbsp;&nbsp; &lt;status &gt; &nbsp;&nbsp;&nbsp;"+status+"<li><input type='checkbox'>";

          // output+="<tr><td style='width: 100px'>"+reviews+"</td><td style='width: 50px'>"+status+"</td><td style='width: 50px'>accept <input type='checkbox' id='"+reviewid+"."+yes+"' name='accept' value='accept'> reject <input type='checkbox' id='"+reviewid+"."+no+"' name='reject' value='reject'></td></tr>";

          output+="<tr id='"+hotelId+"'><td style='width: 100px'>"+reviews+"</td><td style='width: 50px'>"+status+"</td><td style='width: 50px'>accept <input type='radio' id='a"+reviewid+"w"+hotelId+"W"+yes+"' name='status"+reviewid+"' value='accept'> reject &nbsp;&nbsp;<input type='radio' id='r"+reviewid+"w"+hotelId+"W"+no+"' name='status"+reviewid+"' value='reject'></td></tr>";

        }
        }
        else
        {
          output+="<tr id='"+hotelId+"'><td style='width: 100px'>no review</td>";
        }
        $("#tbody").append(output);
        console.log("output is"+output);
      })
      .fail(function() {
        console.log("error");
      });
      

      //ajax call to retrive hotel images link
      
      //select code
      
      $(".modal-body").on('click', 'ul#image li img', function (event) {
        // alert('hii');
        
        $("ul#image li img").attr('class', '');
        // alert($(this).attr('class'));
        $(this).attr('class', 'imageclass');
        url = $(this).attr('url');
        console.log(url);
        // alert("id is"+url);
      });

      //select code end

      ///*******//
      
      
    });

    $('#myModal').on('hidden.bs.modal', function(e) {
      table.$('tr.success').removeClass('success');
      
    })

    // $("#htmltext").html('<img src="../uploads/IMG_4842.jpg" alt="image" height="80" class="imageclass" width="80">');

    $('form#myform').on('submit', function (event) {
      event.preventDefault();
      // alert("hi");
      // files.append("image", $('#filetoupload')[0].files[0]);
      // var files = $('#filetoupload').prop('files');
      // alert("hi");
      var row=$("#modaltable tbody tr");
      console.log("row is "+row.length);
      
      // $("#modaltable tbody tr").find('input[type="checkbox"]')
            var value="",i=0,callrev,callhotel,callstat;
            var callrevId=[],callhotelId=[],callstatId=[];
            $("#modaltable tbody tr").find('input[type="radio"]:checked').each(function(index, el) {
                // alert(index);
                
                // console.log("status is "+$(this).attr('value')+" id is:"+$(this).attr('id'));
                value=$(this).attr('id');//id will b like a11w3W1

                // console.log("index is"+index+"value is="+value[i]+value[i+1]+value[i+2]);
                
                // alert(value);
                var w=value.indexOf('w');
                var W=value.indexOf('W');
                var sub1=value.substring(1,w);
                var sub2=value.substring(w+1,W);
                
                console.log(value);
                console.log("sub1 is "+sub1);
                console.log("sub2 is "+sub2);

                console.log(w+" and "+W);
                // console.log(sub);


                callrev=value.substring(1,w);
                callhotel=value.substring(w+1,W);
                callstat=value.substring(value.length-1);
               console.log("value is="+callrev+callhotel+callstat);

               callrevId.push(callrev);
               callhotelId.push(callhotel);
               callstatId.push(callstat);
            });

                  $.ajax({
                 url: 'scripts/reviewupdate.php',
                 type: 'POST',
                 // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                 data: {
                  callrevId: callrevId,
                  callhotelId:callhotelId,
                  callstatId:callstatId
                      },
               })
               .done(function() {
                 console.log("success");
               })
               .fail(function() {
                 console.log("error");
               });
          
            //string value
            /*console.log("value is :"+value);
            alert("value of i:"+i);
            alert("length of string is:"+value.length)
            var callrevId,callhotelId,callstatId;
            for(var j=0;j<value.length;j=(j+6))
            {
              // alert("value of j is:"+j);
            // console.log("final:"+value[j]+value[j+3]+value[j+4]+value[j+5]);
            callrevId=value[j+3];
            callhotelId=value[j+4];
            callstatId=value[j+5];

           console.log("final:"+callrevId+callhotelId+callstatId);
            }*/

            //string value end

     /* var data = new FormData($(this)[0]);


      alert("id is"+url);
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
        });*/
      $('#myModal').modal('hide');
    });
  });
  </script>
</body>

</html>
