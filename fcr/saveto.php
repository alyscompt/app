<?php

include_once 'dbconnect.php';
	$data_tgl = date('');
	
	$isi= $_POST['myData'];
	$sql = "INSERT INTO `json`( `isi`) 
	VALUES ('$isi')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>