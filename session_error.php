<?php
header('refresh:4;url=./index.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Session error</title>
  <link type="text/css" href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Abc Limited Placement Test</a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Active</a></li>
						<li><a href="#">Link</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
					</ul>
				</div>
      </div>
    </div>
  </div>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h1>Oops! You are not logged in.</h1>
			<p>You are being redirected to the login page in a few seconds...</p>
		</div>
		<div class="col-md-3"></div>
	</div>  

</div>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
