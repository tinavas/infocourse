<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The core aim of our project is to create online learning management system that combines best practices in organizing training so that it will be interesting, useful and much easier for the students. The most important part of our project is to fertilize future programmers, showing them that it is not as difficult as it sounds. This will happen through brief and extensive online practical competitions taken their levels, with certificates and prizes for the best ones.">
    <meta name="author" content="Tech Education ++">
    <meta name="keywords" content="Learning, Online, System, Presentations, Videos, Exam">
    <meta name="distribution" content="web">
    <meta name="robots" content="index, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="/favicon.png">
    <title>Student System</title>
    <link href="/css/jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/extension.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a href="/" class="navbar-brand">TechEdu ++</a>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/news">News</a></li>
                    <li><a href="https://chat.techedu.cf">Chat</a></li>
                    <li><a href="/aboutus.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Preparing...</h1>
            <p>This academy can teach you how to be good at computer sciences</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div style="height: 400px" class="col-md-7">
                <iframe src="https://www.youtube.com/embed/heXKR7KDt-c" allowfullscreen="" height="315" frameborder="0" width="560"></iframe>
				<h3>Author: Yasen Georgiev (<a href="http://yasen.me">yasen.me</a>)</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<h2 id="commentsText" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">Comments: <span class="label label-default" style="padding: 10px 5px 5px">{{number}}</span></h2></a>
		</div>
		<div class="row" id="comments">
<!--			<div class="col-md-4">-->
				<form method="post" onsubmit="return false;" class="form-group">
					Name: <input id="name" name="name" type="text" class="form-control" value="{{name}}" readonly>
					Comment: <textarea id="comment" name="comment" class="form-control"></textarea>
					<input name="video" type="hidden" value="{{video}}" class="form-control">
					<button id="publish" class="btn btn-primary">Publish</button>
				</form>
				<div id="comments_container">
				</div>
		</div>
    </div>
    <hr>
    <footer>
        <center>
            <p>Copyrights © Tech Education++ 2016-2017</p>
        </center>
	</footer>
	<script>
		$("#comments").hide ();
		$("#commentsText").click (function ()
		{
			if ($("#commentsText").attr ("class") == "showed")
			{
				$("#commentsText").attr ("class", "my_hidden");
				$("#comments").hide (250);
			}
			else
			{	
				$("#commentsText").attr ("class", "showed");
				$("#comments").show (250);
			}
		});
		$.ajax({
			method: "POST",
			url: "post_comment.php",
			data: { type: "get", link: "{{params}}" }
		})
		.done(function (all_posts) {
			alert (all_posts);
			let all = JSON.parse (all_posts);
			$("#comments_container").html ("");
			for (let x in all)
			{
				$("#comments_container").html ($("#comments_container").html () + "<div id=" + x + "><h3>" + all [x].author + " <small>uploaded on <time>" + all[x].time + "</time></small></h3><p>" + all[x].text + "</p></div><hr>");
			}
		});
		$("#publish").click (function ()
		{
			$.ajax({
				method: "POST",
				url: "post_comment.php",
				data: { type: "post", author: $("#name").val (), text: $("#comment").val (), link: "{{params}}" }
			})
			.done(function (all_posts) {
				//alert("Data Saved: " + all_posts);
				let all = JSON.parse (all_posts);
				$("#comments_container").html ("");
				for (let x in all)
				{
					$("#comments_container").html ($("#comments_container").html () + "<div id=" + x + "><h3>" + all [x].author + " <small>uploaded on <time>" + all[x].time + "</time></small></h3><p>" + all[x].text + "</p></div><hr>");
				}
			});
			$("#comment").val("");
		});
	</script>
</body>

</html>
