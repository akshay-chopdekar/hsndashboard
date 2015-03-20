<?php
session_start();
if(!isset($_SESSION['userLogged']))
{
   header("Location: ../index.php");
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
    <link rel="stylesheet" href="../packages/DataTables/css/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="../packages/DataTables/css/datatables.responsive.css"/>
    <link rel="stylesheet" href="../packages/DataTables/css/input.css"/>
    
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../packages/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" />

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

        .table th.centered-cell, .table td.centered-cell {
            text-align: center;
        }
        .form-group{
          padding-top:40px;
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
            <li><a href="dashboardBlockUser.php">Block User</a></li>
    				<li><a href="dashboardDeletePost.php">Delete Bets</a></li>
            <li><a href="dashboardReporting.php">Reporting</a></li>
            <li><a href="sendCoins.php">Send Coins</a></li>
            <li><a class="active" href="sendBet.php">Add bet</a></li>
    			</ul>
    		</div>
        <div class="col-xs-9">
          <strong>Dashboard</strong>
          <a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>
          <form name="addBet" id="addBet" method="POST" role="form" data-toggle="validator">
            <div class="form-group">
              <label class="col-md-3">Category</label>
              <div class="col-md-9">
                <select class="form-control" name="category" required>
                  <!-- <option value=""></option> -->
                  <option value="1">Football</option>
                  <option value="2">Social</option>
                  <option value="3">Sports</option>
                  <option value="4">Politics</option>
                  <option value="5">TV & Entertainment</option>
                  <option value="6">Celebrities</option>
                  <option value="7">Buisiness & finance</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3">Bet description</label>
              <div class="col-md-9">
                <textarea class="form-control" name="betDescription" required>
                </textarea>
              </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6">Option 1</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="option1" required>
                </div>
              </div>
              <div class="col-md-6">
                <label class="col-md-6">Option 1 odd</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="option1value"  step="0.1" required>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6">Option 2</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="option2" required>
                </div>
              </div>
              <div class="col-md-6">
                <label class="col-md-6">Option 2 odd</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="option2value" step="0.1" required>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6">Option 3</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="option3">
                </div>
              </div>
              <div class="col-md-6">
                <label class="col-md-6">Option 3 odd</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="option3value" step="0.1" >
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
              <div class="col-md-6">
                <label class="col-md-6">Option 4</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="option4">
                </div>
              </div>
              <div class="col-md-6">
                <label class="col-md-6">Option 4 odd</label>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="option4value" step="0.1">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group">
              <label class="col-md-3">Bet Ends</label>
              <div class="col-md-3">
                <input type='text' class="form-control" name="betEnds" id='datetimepicker1' required/>
              </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <button type="submit" class="btn btn-primary imageButton pull-right">Add bet</button>
          </form>
        </div>
    	</div>
      <div class="loading">Loading&#8230;</div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="../packages/bootstrap-datetimepicker/js/moment-with-locales.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../packages/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <script src="../js/validator.min.js"></script>
    <script type="text/javascript" src="../packages/jstimezonedetect/js/jstz.js"></script>
    <script>

    //To add entry into table
    $(document).ready(function() {
      $('.loading').css('display', 'none');
      var tz = jstz.determine(); // Determines the time zone of the browser client
         var timezone = tz.name(); 
      //alert(timezone);
      $('[name="betDescription"]').val("");

    
    $('#addBet').validator().on('submit', function (e) {
      if (e.isDefaultPrevented()) {
        // handle the invalid form...
      } else {
        // everything looks good!
        $('.loading').css('display', 'block');
        e.preventDefault();
        var formData = {
            'category'              : $('[name=category]').val(),
            'betDescription'             : $('textarea[name=betDescription]').val(),
            'option1'    : $('input[name=option1]').val(),
            'option1value'    : $('input[name=option1value]').val(),

            'option2'    : $('input[name=option2]').val(),
            'option2value'    : $('input[name=option2value]').val(),

            'option3'    : $('input[name=option3]').val(),
            'option3value'    : $('input[name=option3value]').val(),

            'option4'    : $('input[name=option4]').val(),
            'option4value'    : $('input[name=option4value]').val(),

            'betEnds'    : $('input[name=betEnds]').val(),
            'timeZone'    : timezone

        };
        console.log(formData);

        $.ajax({
          url: 'ajaxScripts/pushAddBet.php',
          type: 'get',
          data: formData,
        })
        .done(function() {
          $('.loading').css('display', 'none');
          alert("bet sent!!");

        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      }
    })
    $(function () {
        $('#datetimepicker1').datetimepicker({
          format: "YYYY-MM-DD HH:mm:ss"
        });
    });
  });
  </script>
  </body>
</html>