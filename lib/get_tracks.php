<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);

	$sql = "SELECT * FROM `Tracks`";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			echo "<div class=\"col-md-4\" style=\"background-color: #fff; box-shadow: 0 0 10px #808080; margin: 10px; padding: 1px 10px 1px; border-radius: 25px;\">";
			echo "<h2>{$row["Name"]}</h2>";
			echo "<a href=\"{$row["Folder"]}\" role=\"button\" class=\"btn btn-raised active\">View video »</a>";
			if ($row["ExamLink"] != "#")
				echo "<a href=\"{$row["ExamLink"]}\" role=\"button\" class=\"btn btn-raised btn-success\">Do exam »</a>";
			echo "</div>";
		}
	}
?>
