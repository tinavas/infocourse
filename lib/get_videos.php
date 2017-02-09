<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Videos` WHERE `Course`=\"{$course}\"";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class=\"col-md-4\"> <h2>{$row["ID"]}</h2> <p><a href=\"{$row["Link"]}\" role=\"button\" class=\"btn btn-secondary\">View details »</a></p> </div>";
		}
	}
?>
