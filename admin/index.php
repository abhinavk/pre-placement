<?php 
include('../inchead.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Amin Login</title>
  <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <style type="text/css">
#message {
    position: fixed;
    top: 40px;
    left: 0;
    width: 100%;
}
#inner-message {
    margin: 1 auto;
}
    </style>
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
					<a class="navbar-brand" href="#">Abc Limited Placement Test | Admin Panel</a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="http://www.juit.ac.in">JUIT</a></li>
						<li><a href="http://www.juitieee.com">JUIT-IEEE</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="../logout.php">Logout</a></li>
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
      <form id="login" class="form-horizontal" method="POST" action="index.php">
      <fieldset>
        <legend>Login to Admin-Panel</legend>
        <div class="form-group">
          <label for="loginid" class="col-md-2 control-label">Login ID</label>
          <div class="col-md-10">
            <input class="form-control" name="admin_id" id="id" placeholder="Admin id" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-md-2 control-label">Password</label>
          <div class="col-md-10">
            <input class="form-control" id="psd" name="admin_password" placeholder="Password" type="password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" name="admin_login_bt" value="Login" />

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
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php 
if (isset($_POST['admin_id']) && isset($_POST['admin_password'])) {
  $email = $_POST['admin_id'];
  $password = $_POST['admin_password'];
  $select_login = mysqli_query($db,"SELECT * FROM admins WHERE email = '$email' AND password = '$password';");
  $res_login = mysqli_fetch_assoc($select_login);
  if ($res_login) { 
    $_SESSION['admin_email'] = $res_login['email'];
    $_SESSION['last_name']=$res_login['lastn'];
    $_SESSION['rights']=$res_login['rights'];
      header('location: ./pages/index.php');
  }
  else{
   echo '<div class="alert alert-warning" id="message">'.
    '<a href="#" class="close" data-dismiss="alert" id="inner-message">&times;</a>'.'
    <strong>Warning!</strong>'.' Wrong Username or Password.'.
'</div>';
  }
}
?>