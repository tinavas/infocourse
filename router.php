<?php
	$jokes = 72;
	file_put_contents("php://stdout", "\nRequested: Router: " . $_SERVER['REQUEST_URI'] . "\n");
    if ($_SERVER['REQUEST_URI'] == '/news')
    {
    	file_put_contents("php://stdout", "\nRequested: Router: News: " . $_SERVER['REQUEST_URI'] . "\n");
		$joke = rand () % $jokes + 1;

		file_put_contents("php://stdout", "\nRequested: Router: Joke: " . $joke . "\n");
    	echo 
			str_replace (
				"{{joke}}",
				file_get_contents (__DIR__ . "/jokes/" . $joke . ".php"),
				str_replace (
					"{{page}}",
					1,
					str_replace (
						"{{id}}",
						file_get_contents (__DIR__ . "/news/1.php"), 
						str_replace (
							"{{top}}", 
							file_get_contents (__DIR__ . "/news/top.php"), 
							file_get_contents (__DIR__ . "/news.php")
						)
					)
				)
			); 
		
		return false;
    }
    else if (preg_match ("/\/news.{1,}/", $_SERVER['REQUEST_URI']) != 0)
	{
		file_put_contents("php://stdout", "\nRequested: Router: News: " . $_SERVER['REQUEST_URI'] . "\n");
		$id = $_SERVER['REQUEST_URI'];
		if ($id == "/news/")
			$id = "1";
		else
			$id = substr ($id, 6);
		file_put_contents("php://stdout", "\nRequested: Router: News: " . $id . "\n");
		$joke = rand () % $jokes + 1;

		file_put_contents("php://stdout", "\nRequested: Router: Joke: " . $joke . "\n");
		
		echo 
			str_replace (
				"{{joke}}",
				file_get_contents (__DIR__ . "/jokes/" . $joke . ".php"),
				str_replace (
					"{{page}}",
					$id,
					str_replace (
						"{{id}}",
						file_get_contents (__DIR__ . "/news/" . $id . ".php"), 
						str_replace (
							"{{top}}", 
							file_get_contents (__DIR__ . "/news/top.php"), 
							file_get_contents (__DIR__ . "/news.php")
						)
					)
				)
			); 

		return false;
	}
	else if (preg_match ("/\/seminars\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = $_SERVER["REQUEST_URI"];
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Seminars` WHERE `Link`=\"{$URI}\"";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc ();
			$file = file_get_contents('./lib/prototype/video_prototype.php', FILE_USE_INCLUDE_PATH);
			echo 
				str_replace (
					"{{params}}", $URI,
					str_replace (
						"{{label}}", $row["Label"],  
						str_replace (
							"{{title}}", $row["Name"],  
							str_replace (
								"{{link}}", $row["Source"], 
								$file
							)
						)
					)
				); 
		}

		return false;
	}
	else if (preg_match ("/\/courses\/.*\/videos\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = $_SERVER["REQUEST_URI"];
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Videos` WHERE `Link`=\"{$URI}\"";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc ();
			$file = file_get_contents('./lib/prototype/video_prototype.php', FILE_USE_INCLUDE_PATH);
			file_put_contents("php://stdout", "\nRequested: Router: Lable: " . $row["Label"] . "\n");
			echo 
				str_replace (
					"{{params}}", $URI,  
					str_replace (
						"{{label}}", $row["Label"],  
						str_replace (
							"{{title}}", $row["ID"],  
							str_replace (
								"{{link}}", $row["Source"], 
								$file
							)
						)
					)
				); 
		}

		return false;
	}
	else if (preg_match ("/\/courses\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = substr ($_SERVER["REQUEST_URI"], 9);
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Videos` WHERE `Course`=\"{$URI}\"";
		$result = $conn->query($sql);
		$all = "";

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc ())
			{
				$all = $all . "<div class=\"col-md-4\" style=\"background-color: #fff; box-shadow: 0 0 10px #808080; margin: 10px; padding: 1px 10px 1px; border-radius: 25px\"><h2>{$row["ID"]}</h2><p></p><a href=\"{$row ["Link"]}\" role=\"button\" class=\"btn btn-raised active\">View video »</a><a href=\"#\" role=\"button\" class=\"btn btn-raised btn-success\">Do exam »</a></div>";
			}
		}
		
		$file = file_get_contents('./lib/prototype/track_view_prototype.php', FILE_USE_INCLUDE_PATH);
		echo 
			str_replace ("{{title}}", $conn->query ("SELECT * FROM `Courses` WHERE `Link`='" . $_SERVER['REQUEST_URI'] . "'")->fetch_assoc ()["ID"],
			str_replace ("{{all}}", $all, $file)); 

		return false;
	}
	else if (preg_match ("/\/tracks\/.*/", $_SERVER['REQUEST_URI']) != 0)
	{
		include_once ($_SERVER["DOCUMENT_ROOT"] . "/lib/mysql.php");

		$dbname = "Infocourse";

		$conn = new MySQL ($dbname);

		$URI = substr ($_SERVER["REQUEST_URI"], 8);
		file_put_contents("php://stdout", "\nRequested: Router: " . $URI . "\n");
		$sql = "SELECT * FROM `Courses` WHERE `Track`=\"{$URI}\"";
		$result = $conn->query($sql);
		$all = "";

		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc ())
			{
				$all = $all . "<div class=\"col-md-4\" style=\"background-color: #fff; box-shadow: 0 0 10px #808080; margin: 10px; padding: 1px 10px 1px; border-radius: 25px\"><h2>{$row["ID"]}</h2><p></p><a href=\"{$row ["Link"]}\" role=\"button\" class=\"btn btn-raised active\">View details »</a><a href=\"#\" role=\"button\" class=\"btn btn-raised btn-success\">Do exam »</a></div>";
			}
		}
		
		$file = file_get_contents('./lib/prototype/track_view_prototype.php', FILE_USE_INCLUDE_PATH);
		echo 
			str_replace ("{{title}}", $URI,  
			str_replace ("{{all}}", $all, $file)); 

		return false;
	}
?>
