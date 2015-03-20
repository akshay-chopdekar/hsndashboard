 <?php 
    
     // database connection 
     Define("DB_SERVER","localhost");
     Define("DB_USER","betterthegame");
     Define("DB_PASS","#betterthegame#");
     Define("DB_NAME","helixtech_betterthegame");

	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);


	if($connection)
	{
		echo "conneted";
	}
	else
	{
		echo "not connected";

	}


	$select=mysql_select_db(DB_NAME);


	// if($select)
	// {
	// 	echo "db selectd";
	// }
	// else
	// {
	// 	echo "db not selected";
	// }

	$base_url='http://betterthegame.com/public/';


?>

 