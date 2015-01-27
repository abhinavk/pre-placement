<?php 
include('./inchead.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Placement test</title>
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
						<li class="active"><a href="http://www.juit.ac.in">JUIT</a></li>
						<li><a href="http://www.juitieee.com">JUIT-IEEE</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./logout.php">Logout</a></li>
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
      <form id="login" class="form-horizontal" method="post">
      <fieldset>
        <legend>Login to the test</legend>
        <div class="form-group">
          <label for="loginid" class="col-md-2 control-label">Login ID</label>
          <div class="col-md-10">
            <input class="form-control" name="loginid" id="loginid" placeholder="your roll-no" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-md-2 control-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" id="password" name="password" placeholder="enter your password" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
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
echo "a";
if (isset($_POST['loginid'])) {
  $id = $_POST['loginid'];
  $password = $_POST['password'];

  $select_login = "SELECT * FROM users WHERE roll = '$id' AND password = '$password'";
  $result_login = mysqli_query($db,$select_login) or die(mysqli_error($db));
  $res_login = mysqli_fetch_assoc($result_login);
  if ($res_login) { 
    $_SESSION['user-login-id'] = $res_login['id'];
    if($res_login['completed']==1) {
      header('location:./finish.php');
      exit();
    } else {
    header('location:./question.php');
    exit();
    }
  }
  else{
    echo "<script>alert('Incorrect username  or password');</script>";
  }
}

include('./incfoot.php');
?>
