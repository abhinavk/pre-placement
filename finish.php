<?php 
include('./inchead.php');
 
if (isset($_SESSION['user-login-id'])) {
  $id = $_SESSION['user-login-id'];
} else {
  header('location:./session_error.php');
}
?>
<!-- Currently it's just a clone of question.php -->
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
    
    <!-- sidebar -->
    <div class="col-md-2">
      <div class="well">
        <div class="list-group">
        <a class="list-group-item" href="./rules.pdf">Rules</a>
        <a class="list-group-item" href="./sampleq.pdf">Sample Questions</a>
        <a class="list-group-item" href="mailto:me@abhinavk.me">Contact us</a>
      </div>
      </div>
    </div>

    <!-- main -->
    <div class="col-md-9">

      <?php
      $testscoreq = mysqli_query($db,"SELECT score,completed FROM users WHERE id = '$id'") or die(mysqli_error($db));
      $testscorer = mysqli_fetch_array($testscoreq);

      ob_start();
      // All code related to test
      ?>
      <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> You have completed the test. <a href="#" class="alert-link">Check your email soon for the complete report</a>.
      </div>

      <div class="jumbotron">
      <h1>Score: <?php echo $testscorer[0] ?></h1>
      <p></p>
        <p><a class="btn btn-primary btn-lg">Learn more</a></p>
      </div>

      <?php
      if($testscorer[1] == 1) {
        ob_end_flush();
      } else {
        ob_end_clean();
        echo '<div class="alert alert-danger">
        <strong>Sorry!</strong> You have not completed the test yet</a>.
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
