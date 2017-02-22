<html lang="en"><head><meta charset="utf-8"/><meta http-equiv="X-UA-Compatible" content="IE=edge"/><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/><meta name="description" content="The core aim of our project is to create online learning management system that combines best practices in organizing training so that it will be interesting, useful and much easier for the students. The most important part of our project is to fertilize future programmers, showing them that it is not as difficult as it sounds. This will happen through brief and extensive online practical competitions taken their levels, with certificates and prizes for the best ones."/><meta name="author" content="Tech Education ++"/><meta name="keywords" content="Learning, Online, System, Presentations, Videos, Exam"/><meta name="distribution" content="web"/><meta name="robots" content="index, follow"/><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/><link rel="icon" href="/favicon.png"/><title>Student System</title><!--link(href='/css/jumbotron.css', rel='stylesheet')--><link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700"/><link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons"/><link rel="stylesheet" href="/css/bootstrap.min.css"/><link rel="stylesheet" href="/css/bootstrap-material-design.min.css"/><link rel="stylesheet" href="/css/ripples.min.css"/><link rel="stylesheet" href="/css/snackbar.min.css"/><link rel="stylesheet" href="/css/extension.css"/><style type="text/css"></style></head><body><nav class="navbar navbar-default"><!--default--><div class="container-fluid"><div class="navbar-header"><a href="/" class="navbar-brand">TechEdu ++</a><ul class="nav navbar-nav"><li><a href="/">Home</a></li><li><a href="/news">News</a></li><li><a href="https://chat.techedu.cf">Chat</a></li><li><a href="/aboutus.php">About</a></li></ul></div></div></nav><div class="container"><div class="panel panel-primary"><div class="panel-heading"><h4>{{title}}</h4></div><div class="panel-body"><iframe width="560" height="315" src="{{link}}" frameborder="0" allowfullscreen=""></iframe><h3>{{label}}</h3></div></div><div class="panel panel-primary"><div class="panel-heading"><h4 id="commentsText" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">Comments: <span id="number" class="badge">{{number}}</span></h4></div><div class="panel-body"><form method="post" onsubmit="return false;" class="form-group">Name: <input id="name" name="name" type="text" value="{{name}}" readonly="" class="form-control"/>Comment: <textarea id="comment" name="comment" class="form-control"></textarea><input name="video" type="hidden" value="{{params}}" class="form-control"/><button id="publish" class="btn btn-primary">Publish</button></form><div id="comments_container" style="width: 100%"></div></div></div></div><footer><center><p>Copyrights © Tech Education++ 2016-2017</p></center></footer><script src="/js/jquery.min.js"></script><script src="/js/tether.min.js"></script><script src="/js/bootstrap.min.js"></script><script src="/js/material.min.js"></script><script src="/js/ripples.min.js"></script><script src="/js/snackbar.min.js"></script><script src="/js/jquery.nouislider.min.js"></script><script src="/js/main.js"></script><script>$("#comments").hide ();
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
	url: "/post_comment.php",
	data: { type: "get", link: "{{params}}" }
})
.done(function (all_posts) {
	//alert (all_posts);
	let all = JSON.parse (all_posts);
	$("#comments_container").html ("");
	for (let x in all)
	{
		$("#comments_container").html ($("#comments_container").html () + "<div id=" + x + "><h4><b>" + all [x].author + " <small style='float: right;'><time>" + all[x].time + " </time></small></b></h4><p>" + all[x].text + "</p></div><hr>");
	}
});
$("#publish").click (function ()
{
	$.ajax({
	method: "POST",
	url: "/post_comment.php",
	data: { type: "post", author: $("#name").val (), text: $("#comment").val (), link: "{{params}}" }
})
.done(function (all_posts) {
	//alert("Data Saved: " + all_posts);
	let all = JSON.parse (all_posts);
	$("#comments_container").html ("");
	for (let x in all)
	{
		$("#comments_container").html ($("#comments_container").html () + "<div id=" + x + "><h4><b>" + all [x].author + " <small style='float: right'><time>" + all[x].time + " </time></small></b></h4><p>" + all[x].text + "</p></div><hr>");
	}
	$("#number").html (parseInt ($("#number").html ()) + 1);
});
$("#comment").val("");
});</script></body></html>