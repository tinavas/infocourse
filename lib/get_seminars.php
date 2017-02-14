<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Seminars`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class=\"col-md-3\" style=\"background-color: #fff; margin: 10px; border-radius: 25px; border: 3px solid orange;/* padding: 1px 10px 1px;*/\"> <h2>{$row["Name"]}</h2><a href=\"{$row["Link"]}\" role=\"button\" class=\"btn btn-raised active\">View video »</a><a href=\"#\" role=\"button\" class=\"btn btn-raised btn-success\">Do exam »</a> </div>";
		}
	}
?>
