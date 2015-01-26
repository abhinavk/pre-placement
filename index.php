<?php 
include('./inchead.php')
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mock Placement Quiz</title>
  <link type="text/css" href="./css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/login.css">
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
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="well bs-component">
      <!-- Login form -->
      <form class="form-horizontal" method="post">
      <fieldset>
        <legend>Login to the test</legend>
        <div class="form-group" method="post">
          <label for="loginid" class="col-md-2 control-label">Login ID</label>
          <div class="col-md-10">
            <input class="form-control" name="roll" placeholder="your roll-no" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-md-2 control-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" name="password" placeholder="enter your password" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="submit" name="login" class="btn btn-primary">Sign in</button>
            &nbsp;&nbsp;&nbsp;<button class="btn btn-default">Register new</button>
          </div>
        </div>
      </fieldset>
      </form>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>

</div>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>

<?php 

if (isset($_POST['login'])) {
  $roll = $_POST['roll'];
  $password = $_POST['password'];

  $select_login = "SELECT * FROM users WHERE `roll` = '$roll' AND `password` = '$password'";
  $result_login = mysql_query($select_login) or die(mysql_error());
  $res_login = mysql_fetch_assoc($result_login);

  if ($res_login) { 
    echo "Login Successful";
    $_SESSION['user-login-id'] = $res_login['id'];
    header('location:./question.php');
  }
  else{
    echo "<script>alert('Incorrect username  or password');</script>";
  }
}
?>