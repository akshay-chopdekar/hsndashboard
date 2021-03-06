<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'hotel';

// Table's primary key
$primaryKey = 'hotelId';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'hotelName', 'dt' => 0 ),
	array( 'db' => 'category',  'dt' => 1 ),
);

// SQL server connection information
$sql_details = array(
	'user' => 'admin',
	'pass' => 'sysadmin',
	'db'   => 'hotelsamenight',
	'host' => 'hsn-final.cc3ufhmfnitc.us-west-2.rds.amazonaws.com'
);


/*$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'hotelsamenight',
	'host' => 'localhost'
);*/

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns ),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE
);
/*echo json_encode(SSP::findUsers( $_GET, $sql_details, $table, $primaryKey, $columns, " blocked = 0 AND userName <> 'admin' " ),JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);*/

?>