<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$result = $conn -> query ('INSERT INTO `Seminars`(`ID`, `Name`, `Link`, `Source`) VALUES ("' . $_POST["name"] . '","' . $_POST["name"] . '","' . $_POST ["link"] . '","' . $_POST ["source"] . '");');

	echo "<script> window.history.back(); </script>";
?>
