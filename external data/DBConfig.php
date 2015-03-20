 <?php 
    


     // database connection 
     Define("DB_SERVER","50.62.209.40:3306");
     Define("DB_USER","betterthegame");
     Define("DB_PASS","#betterGame#");
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


	// $select = mysql_select_db(DB_NAME);


	// // if($select)
	// // {
	// // 	echo "db selectd";
	// // }
	// // else
	// // {
	// // 	echo "db not selected";
	// // }

	// $base_url='http://betterthegame.com/';


?>

 