<?php

	include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

	$dbname = "Infocourse";

	$conn = new MySQL ($dbname);
	
	$uri = addslashes($_REQUEST ['link']);

	if (
		isset ($_REQUEST ['author']) &&
		isset ($_REQUEST ['text'])
	   )
	{
		file_put_contents("php://stdout", "\nRequested: POST: " . $_SERVER['REQUEST_URI'] . "\n");
		$author = addslashes($_REQUEST ['author']);
		$text = addslashes(strip_tags ($_REQUEST ['text'], "<i><b><u><br><p><ul><li>"));
		$time = date('Y-m-d, h:i:sa');
		$code = addslashes(md5 ($author . $text . $uri));

		$conn->query ("INSERT INTO `Comments` (`ID`, `Author`, `Text`, `Link`, `Time`) VALUES ('{$code}','{$author}','{$text}','{$uri}','{$time}')");
	}
	
	file_put_contents("php://stdout", "\nRequested: GET all: " . $_SERVER['REQUEST_URI'] . "\n");

	$sql = "SELECT * FROM `Comments` WHERE `Link`='" . $uri . "'";
	$result = $conn->query($sql);

	$ans = "{";
	
	if ($result->num_rows > 0) 
	{
		$id = 0;
		while($row = $result->fetch_assoc()) 
		{
			$ans = $ans . "\"{$id}\": {\"author\": \"{$row ["Author"]}\", \"text\": \"{$row ["Text"]}\", \"time\": \"{$row ["Time"]}\"},";
			$id = $id + 1;
		}
	}
	$ans = substr ($ans, 0, -1) . "}";
	file_put_contents("php://stdout", "\nRequested: GET all: " . $ans . "\n");
	echo $ans;
?>
