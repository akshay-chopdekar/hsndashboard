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

  p#check{
    margin-left: 111px;
  }
  p#currentstatus{
    margin-top: 10px;
  }
  li{
    margin-top: 10px;
  }
  .title {
    font-size: larger;
    font-weight: bold;
  }
  .table th.centered-cell,
  .table td.centered-cell {
    text-align: center;
  }
  input[type="file"]{
    margin: 15px 211px 10px 133px;
  }
  textarea{
    border-radius:4px;
  }
  p#cname1{
    margin-top:7px;
  }
  input#cname2{
    margin-top: 10px;
      height: 35px;
      border-radius: 4px
  }
  @media screen and (min-width:768px){
    .form-horizontal .control-label{
      text-align:left;
    }
  }
  .modal-content{
  width: 100%;
  min-width: 700px;
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
         <li><a  href="categoryList11.php">Category List</a>
         </li>
         <li><a class="active" href="campaign.php">Promotion Type</a>
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
        <li><a href="paymentinfo.php">Payment Information</a>
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
                <th data-class="expand">Promotion Id</th>
                <th>Promotion Type Id</th>
                <th data-hide="phone">Description</th>
              </tr>
            </thead>
            <!--tbody section is required-->
            <tbody></tbody>
          </table>
        </div>
        <input type="button" value="Add Promotion" id="addcampaign" class="btn btn-primary pull-left">
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
                       Edit Promotion Type
                    </h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" id="myform1" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-sm-2" >Promotion name</label>
                <div class="col-sm-10">
                  <p id="cname1"></p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Promotion Tagline</label>
                <div class="col-sm-10">
                  <textarea type="text" name="tagline" id="tagline" cols="60" maxlength="20" required></textarea>
                </div>
              </div>

             <!--  <div class="form-group">
               <label class="control-label col-sm-2" for="email">Background Image</label>
               <input type="file" name="fileToUpload" id="fileToUpload">
             </div>
              -->
              <div class="form-group">
                <label class="control-label col-sm-2" >Hotel List</label>
                <div class="col-sm-10">
                  <ul id="hotellist" data-spy="scroll" style="height:70px;overflow:-moz-scrollbars-vertical;overflow-y:auto;">
                    
                  </ul>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Hotel list</label>
                <div class="col-sm-5">
                  <select name="hotelss" id="hotelss" class="form-control" multiple="multiple" required>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Current Status</label>
                <div class="col-sm-10">
                  <p id="currentstatus"></p>
                </div>
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
                         Add Promotion Type
                      </h4>
          </div>
          <div class="modal-body">

            <form class="form-horizontal" role="form" id="myform2" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Promotion name</label>
                <div class="col-sm-10">
                  <input type="text" name="cname2" id="cname2" maxlength="30" required></input>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Promotion description</label>
                <div class="col-sm-10">
                  <textarea type="text" name="cdes2" id="cdes2" cols="60" maxlength="30" required></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" >Promotion Tagline</label>
                <div class="col-sm-10">
                  <textarea type="text" name="tagl" id="tagl" cols="60" maxlength="20" required></textarea>
                </div>
              </div>
               
               
              <div class="form-group">
                
                <div class="row">
                  <div class="col-md-3" style="margin-left: 20px;">
                    <label class="control-label" for="pwd">Hotel list</label><br>
                    <label>(mandatory)</label>  
                  </div>
                  <div class="col-md-9" style="float: right; bottom: 44px;right: 50px;">
                    <select name="hotels" id="hotels" class="form-control" multiple="multiple" required>
                    </select>
                  </div>
                </div>


                
                <!-- <div class="col-sm-5">
                  
                </div> -->
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Background Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload" required>
              </div>


              <!-- <div class="control-label">
                <label class="control-label col-sm-2" for="email">Background Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <label class="control-label col-sm-2">images</label>
              </div>
               -->
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
  <script src="../js/bootstrap-multiselect.js"></script>

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
      // pagingType: "input",
      autoWidth: false,
      ajax: 'scripts/server_processingforReporting.php',
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
    var camId,op="",stat,tagline="",list="";
    var table = $('#example').DataTable();

    // $('#hotels').multiselect();
    $('#example tbody').on('click', 'tr', function() {
      $('#myModal').modal();
      if ($(this).hasClass('success')) {
        $(this).removeClass('success');
      } else {
        table.$('tr.success').removeClass('success');
        $(this).addClass('success');
      }
      camId = $(this).find('td').eq(0).text(); /*Get userId for blocking user*/
      // alert(camId);
      $('#cname1').html(($(this).find('td').eq(1).text()));
      // $("#cdes1").html(($(this).find('td').eq(2).text()));
    
      $("#hotellist").empty();
      $("#check").empty();
      $("#check").append("Accept:<input id='rad' type='radio' name='status' value='1'>Reject:<input id='rad' type='radio' name='status' value='0'>");

        $( '#myform1' ).each(function(){
            this.reset();
        });

      $.ajax({
        url: 'scripts/getpromotiontypedetails.php',
        type: 'GET',
        dataType: 'json',
        data: {
          promotionTypeId: camId
        },
      })
      .done(function(data) {
        console.log("success");
        console.log(data);

        $("#tagline").text(data['hotels'][0]['tagline']);
        // $("#currentstatus").text("Accepted");
        if(data['hotels'][0]['status']==1)
        {
          $("#currentstatus").text("Accepted");
          $('input[id="rad"][value=1]').prop('checked', true);
        }
        else
        {
          $("#currentstatus").text("Rejected");
          $('input[id="rad"][value=0]').prop('checked', true);
        }
        var output="";

        for(var i=0;i<data['hotels'].length;i++)
        {
          output+="<li>"+i+"]"+data['hotels'][i]['hotelName']+"</li>";
        }

        console.log(output);
        
        $("#hotellist").append(output);

      })
      .fail(function() {
        console.log("error");
      });
      
      //ajax call to get hotel list


      $("#submit").hide();

      $.ajax({
          url: 'scripts/gethotellists.php',
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          console.log(data);
          console.log("success");
          console.log(data['hotels'][0]);

          // console.log(data.priority);
          
          var output = "";
          $("#hotelss").empty();
          var hotelid = "",hotelname="";
          for (var i = 0; i < data['hotels'].length; i++) {
            // console.log(data['imageUrl'][i]['imageUrl']);
            
            // $("#image").append('<img src="data["imageUrl"][i]["imageUrl"]" alt="data["imageUrl"][i]["imageUrl"]" />');
            hotelid = data['hotels'][i]['hotelId'];
            hotelname = data['hotels'][i]['hotelName'];

            console.log("image is:" + hotelid+"hotelname:"+hotelname);
            output += "<option value="+hotelid+">"+hotelname+"</option>";
            
          };
          console.log(output);
          $("#hotelss").append(output);
          
          $('#hotelss').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
          });
          $('#hotelss').multiselect('refresh');
          

        })
        .fail(function() {
          console.log("error multiselect");
        });


      
    });


    $('form#myform1').on('submit', function(event) {
      event.preventDefault();
      var data = new FormData($(this)[0]);
      /* Act on the event */
      // alert('hi'+camId);
      stat=$('input[type="radio"]:checked').val();
      tagline=$("#tagline").val();
      var hotelss=$("#hotelss").val();

      data.append('stat',$("input[type='radio']:checked").val());
      data.append('promotionTypeId',camId);
      data.append('tagline',tagline);
      data.append('hotels',hotelss);


    $.ajax({
        url: "scripts/updatepromocode.php", //previous was update campaign
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
    //ajax call end


    $('#myModal').on('hidden.bs.modal', function(e) {
      table.$('tr.success').removeClass('success');
    });

    $('#addcampaign').on('click', function(event) {
      event.preventDefault();

      var imagestat=false;
      var cnn=false,cdn=false,tagn=false,cnr=false,cdr=false,tagr=false;
          // alert("values are"+cnr+" "+cdr+" "+tagr+" "+imagestat);
      /* Act on the event */
      // alert('hi');
       
        $( '#myform2' ).each(function(){
            this.reset();
        });

      $('#myModal1').modal();
      // $("#submit").hide();
      $("#submit").show();
      $.ajax({
          url: 'scripts/gethotellists.php',
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          console.log(data);
          console.log("success");
          console.log(data['hotels'][0]);

          // console.log(data.priority);
          
          var output = "";
          $("#hotels").empty();
          var hotelid = "",hotelname="";
          for (var i = 0; i < data['hotels'].length; i++) {
            // console.log(data['imageUrl'][i]['imageUrl']);
            
            // $("#image").append('<img src="data["imageUrl"][i]["imageUrl"]" alt="data["imageUrl"][i]["imageUrl"]" />');
            hotelid = data['hotels'][i]['hotelId'];
            hotelname = data['hotels'][i]['hotelName'];

            console.log("image is:" + hotelid+"hotelname:"+hotelname);
            output += "<option value="+hotelid+">"+hotelname+"</option>";
            
          };
          console.log(output);
          $("#hotels").append(output);
          
          $('#hotels').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            /*onChange: function(option, checked, select) {
                            // alert('Changed option ' + $(option).val() + '.');
                            if(option.length>0)
                            {
                              // alert("hi");
                              $("#submit").show();
                            }
                            else
                            {
                               // alert("bye");
                              $("#submit").hide();
                            }
                            
                        }*/

          });
          $('#hotels').multiselect('refresh');
          

        })
        .fail(function() {
          console.log("error multiselect");
        });


    
   
  // $("#submit").hide();
  

  $("#fileToUpload").on('change', function(event) {
    event.preventDefault();
    /* Act on the event */

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
                     // $("#validate").show();
                     check();
                };
                image.onerror= function() {
                    // $("#uploadPreview").text("Invalid file");
                    alert("invalid file type");
                     // $("#validate").hide();
                     $("#fileToUpload").val('');
                     // $("#submit").hide();
                     imagestat=false;
                     // alert(imagestat);
                };      
            };
            
        }

        // var pic_real_height = pic.height();
        function check()
        {
         if(w==640 & h==498 & s<1024)
         {
          // alert(w);
           // alert("resolution proper");
            // $("#submit").show();
            imagestat=true;
            // alert(imagestat);
           
         }
         else
         {
          imagestat=false;
          // alert(imagestat);
          $("#fileToUpload").val('');
          alert("invalid image");
         }

         // alert("values are"+cnr+" "+cdr+" "+tagr+" "+imagestat);
         if(cnr && cdr && tagr && imagestat)
         {
           if(cnn||cdn||tagn)
           {
             $("#submit").hide();
           }
           else
           {
             $("#submit").show();
           }
         }
         else
         {
           $("#submit").hide();
         }
    }

  });
  //validation code for input boxes

  $("#cname2, #cdes2,#tagl").bind('keyup', function(event) {
    /* Act on the event */

    
    var emailReg = new RegExp(/^[a-zA-Z0-9 ]*$/);
    // var emailReg = new RegExp(/^(?![0-9]*$)[a-zA-Z0-9]+$/);


    cnn=$.isNumeric($("#cname2").val());
    cdn=$.isNumeric($("#cdes2").val());
    tagn=$.isNumeric($("#tagl").val());

    cnr=emailReg.test($("#cname2").val());
    cdr=emailReg.test($("#cdes2").val());
    tagr=emailReg.test($("#tagl").val());


    // alert("values are"+cnr+" "+cdr+" "+tagr+" "+imagestat);
    if(cnr && cdr && tagr && imagestat)
    {
      if(cnn||cdn||tagn)
      {
        $("#submit").hide();
      }
      else
      {
        $("#submit").show();
      }
    }
    else
    {
      $("#submit").hide();
    }
    
  
  });

    });

 $("#tagline").bind('keyup', function(event) {
   /* Act on the event */

   // alert("hi");
   var emailReg = new RegExp(/^[a-zA-Z0-9 ]*$/);
   // var emailReg = new RegExp(/^(?![0-9]*$)[a-zA-Z0-9]+$/);
   var tagline=$.isNumeric($("#tagline").val());
   var tagline1=emailReg.test($("#tagline").val());


   // alert("values are"+cnr+" "+cdr+" "+tagr+" "+imagestat);
   if(tagline1)
   {
     if(tagline)
     {
       $("#update").hide();
     }
     else
     {
       $("#update").show();
     }
   }
   else
   {
     $("#update").hide();
   }
   
 
 });
  
  $('form#myform2').on('submit', function(event) {
    event.preventDefault();
    /* Act on the event */
    var promname,promdes,hotels,tag;
    promname=$("#cname2").val();
    promdes=$("#cdes2").val();
    hotels=$("#hotels").val();
    tag=$("#tagl").val();
    console.log("promo name is:"+promname+"promo description:"+promdes);
    // console.log(hotels.length);

// $("#hotels").attr('attribute', 'value');
    var data = new FormData($(this)[0]);

    data.append('promoName',promname);
    data.append('description',promdes);
    data.append('hotels',hotels);
    data.append('tagline',tag);

    $.ajax({
      url: 'scripts/addpromocode.php',
      data: data,
            type: "POST",
            // dataType: "json",
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
    });
    
  });
  });
  </script>
</body>

</html>
