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
    </style>
  </head>
  <body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-2 navColor">
    			<div class="block"></div>
    			<ul class="nav">
            <li><a href="dashboardBlockUser.php">Block User</a></li>
    				<li><a href="dashboardDeletePost.php">Delete Bets</a></li>
    			</ul>
    		</div>
    		<div class="col-md-10">
    			<strong>Dashboard</strong>
    			<a href="logout.php" class="btn btn-primary pull-right" style="z-index:100;margin-top:10px;">Logout</a>

    			<div class="form-inline">
    			    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    			        <thead>
    			            <tr>
    			                <th data-class="expand">User ID</th>
    			                <th>User Name</th>
    			                <th data-hide="phone">Blocked Status</th>
    			            </tr>
    			        </thead>
    			        <!--tbody section is required-->
    			        <tbody></tbody>
    			    </table>
    			</div>
    		</div>
    	</div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
           aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" 
                       aria-hidden="true">×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                       User Details
                    </h4>
                 </div>
                 <div class="modal-body">
                    <table>
                        <tr>
                          <td><span class="modalBodyTerms">User ID:</span></td>
                          <td><span id="userId"></span></td>
                        </tr>
                        <tr>
                          <td><span class="modalBodyTerms">UserName:</span></td>
                          <td><span id="userName"></span></td>
                        </tr>
                        <tr>
                          <td><span class="modalBodyTerms">Blocked Status:</span></td>
                          <td><span id="blockedStatus"></span></td>
                        <tr>
                    </table>
                 </div>
                 <div class="modal-footer">
                    <button id="blockUser" type="button" class="btn btn-primary">
                       Block User
                    </button>
                 </div>
              </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../packages/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="../packages/DataTables/js/dataTables.bootstrap.js"></script>
    <script src="../packages/DataTables/js/datatables.responsive.js"></script>
    <script src="../packages/DataTables/js/input.js"></script>
    <script src="../packages/DataTables/js/ajax-bootstrap3.js"></script>
  </body>
</html>