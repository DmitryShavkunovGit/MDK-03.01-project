<?php 

 require "../../db.php"; 

/**
 * Получение отчёта в *.csv
 */


function get_csv($_table) {
	$db_record = $_table;
	$where = "WHERE 1 ORDER BY 1";
	
	
	/**
	 * Название экспортируемого файла и данные подключения
	 */
	$csv_filename = $db_record . '_db_export_' . date('Y-m-d H:i') . '.csv';
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "enterprise_products";
	
	
	
	$conn = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		 die("Failed to connect to MySQL: " . mysqli_connect_error());
	}
	
	$csv_export = '';
	
	mysqli_query($conn, "SET NAMES 'cp1251'");
	
	$query = mysqli_query($conn, "SELECT * FROM " . $db_record ." ". $where);
	$field = mysqli_field_count($conn);
	
	for ($i = 0; $i < $field; $i++) {
		 $csv_export .= mysqli_fetch_field_direct($query, $i)->name . ';';
	}
	
	$csv_export.= '
	';
	
	while ($row = mysqli_fetch_array($query)) {
		 for ($i = 0; $i < $field; $i++) {
			  $csv_export.= '"' . $row[mysqli_fetch_field_direct($query, $i)->name] . '";';
		 }
		 $csv_export .= '
	';
	}

	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment; filename=" . $csv_filename . "");
	echo($csv_export);
}

if (isset($_POST['_get_reply_order'])) {
	get_csv('product_order');
}


// else { header("Location: admin.php"); }
?>