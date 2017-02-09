<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$result = $conn -> query ('INSERT INTO `Tracks`(`ID`, `Name`, `Folder`) VALUES ("","' . $_POST ["name"] . '","' . $_POST ["link"] . '");');
	
	echo "<script> window.history.back(); </script>";
?>
