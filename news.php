<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="The core aim of our project is to create online learning management system that combines best practices in organizing training so that it will be interesting, useful and much easier for the students. The most important part of our project is to fertilize future programmers, showing them that it is not as difficult as it sounds. This will happen through brief and extensive online practical competitions taken their levels, with certificates and prizes for the best ones." />
		<meta name="author" content="Tech Education ++" />
		<meta name="keywords" content="Learning, Online, System, Presentations, Videos, Exam" />
		<meta name="distribution" content="web" />
		<meta name="robots" content="index, nofollow" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="icon" href="/favicon.png" />
		<title>Student System</title>

		<link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
		<script src="/js/jquery.min.js"></script>
		<script src="/bootstrap/dist/js/bootstrap.min.js"></script>

		<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
				width: 70%;
				margin: auto;
			}
			
			.spacing {
				height: 100px;
			}
			
			article {
				padding: 0 15% 0 15%;
			}

			.logo {
				font-size: 3em;
			}
			.logo img {
				height: 240px;
			}
			
			article>header {
				font-size: 25pt;
			}
			
			article>header>p {
				font-size: 0.4em;
			}
			
			article>header>summary {
				font-size: 0.5em;
			}
			#myCarousel article>aside {
				font-size: 1.5em;
				float: left;
			}
			#all article {
				border-top: 5px solid #eee;
				padding-top: 5px;
				padding-bottom: 5px;
			}
			#all article>header {
				display:inline-block;
				margin-right:10px;
				width: 45%;
			}
			#all article>aside {
				padding-top: 240px;
				vertical-align: top;
				font-size: 1.5em;
				position: relative;
				/*left: 50%;*/
				display:inline-block;
				text-align: left;
				width: 45%;
			}
			
			article.hideMe:after {
				vertical-align: -100px;
				font-size: 1.5em;
				text-decoration: underline;
				content:"For more information click here.";
			}
			
			#row
			{
				border: 2px solid gray;
			}
			#joke
			{
				text-align: left;
			}

			.item {
				height: 650;
			}
		</style>
		<link rel="stylesheet" href="/news/d9757859af.css">
	</head>

	<body>
		 <nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">

					<a class="navbar-brand" href="/">TechEdu ++</a>
					<ul class="nav navbar-nav">
						<li><a href="/">Home</a></li>
						<li class="active"><a href="#">News</a></li>
						<li><a href="https://chat.techedu.cf/">Chat</a></li>
						<li><a href="/aboutus.php">About</a></li>
					</ul>
				</div>

			 </div>

		 </nav>
		<span id="page" style="display: none;">{{page}}</span>
		<div id="top" style="display: none;">
			{{top}}
		</div>
		<div id="news_container" style="display: none;">
			{{id}}
		</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			</ol>
			<div class="carousel-inner" role="listbox">
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div id="all"> </div>
		<div class="container">
			<div id="row" class="row">
				<div id="joke" class="col-md-10">
					<h1>Joke:</h1><br>
					{{joke}}
				</div>
			</div>
		</div>
		<hr>
		<footer><center><p>Copyrights © Tech Education++ 2016-2017</p></center></footer>
		<script>
			let slides = $(".carousel-inner")[0];
			let all = $("#all");
			let indicators = $(".carousel-indicators")[0];
			let topNews = $("#top>article"); 
			let articles = $("#news_container>article"); 
			{
				let div = document.createElement("div");
				let newElement = topNews[0].cloneNode ("true");
				(newElement).className = "hideMe";
				$(newElement.children[newElement.children.length - 1]).hide();
				div.append(newElement);
				div.innerHTML += '<div class="spacing"> </div>';
				div.className = "item active";
				slides.append(div);
				indicators.innerHTML += ('<li data-target="#myCarousel" data-slide-to="0" class="active"></li>');
			}
			for (let i = 1; i < 10 && i < topNews.length; i += 1) {
				console.log (i + " < " + topNews.length); 
				let div = document.createElement("div");
				let newElement = topNews[i].cloneNode ("true");
				newElement.className = "hideMe";
				$(newElement.children[newElement.children.length - 1]).hide();
				div.append(newElement);
				div.innerHTML += '<div class="spacing"> </div>';
				div.className = "item";
				slides.append(div);
				indicators.innerHTML += ('<li data-target="#myCarousel" data-slide-to="' + i + '"></li>');
			}
			for (let i = 0; i < articles.length; i += 1) {
				console.log (i + " <<<< " + articles.length); 
				let newElement = articles[i].cloneNode ("true");
				$(newElement.children[newElement.children.length - 1]).show();
				all.append (newElement);
				all.innerHTML += '<hr>';
			}
			$(".item article").click(function() {
				if (this.className == "showMe") {
					(this).className = "hideMe";
					$(this.children[this.children.length - 1]).hide(500);
				} else {
					(this).className = "showMe";
					$(this.children[this.children.length - 1]).show(500);
				}
			});

			let page = Number ($("#page").html());
			let next = "/news?page=" + (page + 1);
			let prev = "/news?page=" + (page - 1);
			if (page + 1 >= 1)
			{
				next = "#";
			}
			if (page - 1 < 1)
			{
				prev = "#";
			}
			$("#next").attr ("href", next);
			$("#prev").attr ("href", prev);
		</script>
	</body>
</html>
