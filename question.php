<?php 
include('./inchead.php');
 
if (isset($_SESSION['user-login-id'])) {
  $id = $_SESSION['user-login-id'];
} else {
  header('location:./session_error.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Placement Mock Test</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
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
    
    <!-- sidebar -->
    <div class="col-md-2">
      <div class="well">
        
      </div>
    </div>

    <!-- main -->
    <div class="col-md-9">

      <?php
      $test_open_query = "SELECT value FROM test WHERE id = 1";
      $test_open_res = mysqli_query($db,$test_open_query) or die(mysqli_error($db));
      $test_open = mysqli_fetch_array($test_open_res);

      ob_start();
      // All code related to test
      ?>
      <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> You have successfully logged in. <a href="#" class="alert-link">Don't forget to read the rules before startng the test</a>.
      </div>

      <?php
      if($test_open == 'yes') {
        ob_end_flush();
      } else {
        ob_end_clean();
        echo '<div class="alert alert-warning">
        <strong>Well done!</strong> You have successfully logged in. <a href="#" class="alert-link">Test is not open yet. Take your time to go through directions, rules and stuff,</a>.
      </div>';
      }
      ?>

    </div>

    <!-- offset -->
    <div class="col-md-1"></div>
  </div>

  <footer>
    
  </footer>  

</div>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('./incfoot.php');
?>
