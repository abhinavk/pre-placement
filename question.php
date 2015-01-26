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
  <link type="text/css" href="./css/question.css" rel="stylesheet">
  <script type="text/javascript" src="./question.js"></script>
</head>

<body onload="hide()">
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

  <div class="row topbfr">
    
    <!-- left sidebar for links and details -->
    <div class="col-md-2">
    <div class="well">

      <div class="list-group">
        <a class="list-group-item" href="./rules.pdf">Rules</a>
        <a class="list-group-item" href="">Sample Questions</a>
        <a class="list-group-item" href="">Contact us</a>
        <a class="list-group-item" href="">Another link</a>
        <a class="list-group-item" href="">Another link</a>
      </div>
    </div>
    </div>

    <!-- main area for everything -->
    <div class="col-md-9">

      <?php
      $test_open_query = "SELECT value FROM test WHERE id = 1";
      $test_open_res = mysqli_query($db,$test_open_query) or die(mysqli_error($db));
      $test_open = mysqli_fetch_array($test_open_res);

      ob_start();
      // All code related to test
      ?>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div id="topbar" class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> You have successfully logged in. <a href="#" class="alert-link">Don't forget to read the rules before startng the test</a>.
        </div>
      </div>
      </div>

      <div class="row topbfr">
        <div class="col-md-12 testbtn">
          <a id="startbtn" class="btn btn-primary btn-lg" href="#" onclick="startTest()">Start the Test</a>
        </div>
      </div>

      <!-- Question image -->
      <div id="question" class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="qimgholder">
            <img id="qimg">
          </div>
        </div>
      </div>

      <!-- Options list -->
      <div id="optionspane" class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5">
          <form id="test" class="form-horizontal">
          <fieldset>
          <legend>Select an option</legend>
            <div class="radio">
              <label>
                <input name="options" id="option1" value="1" type="radio">
                <div id="op1"></div>
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="options" id="option2" value="2" type="radio">
                <div id="op2"></div>
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="options" id="option3" value="3" type="radio">
                <div id="op3"></div>
              </label>
            </div>
            <div class="radio">
              <label>
                <input name="options" id="option4" value="4" type="radio">
                <div id="op4"></div>
              </label>
            </div>
            <br><br>
            <a href="#" onclick="nextQues()" id="nextbtn" class="btn btn-warning">Submit and go to next question</a>
            </fieldset>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>

      <?php
      if($test_open[0] == 'yes') {
        ob_end_flush();
      } else {
        ob_end_clean();
        echo '<div class="alert alert-warning"><strong>Well done!</strong> You have successfully logged in. <a href="#" class="alert-link">Test is not open yet. Take your time to go through directions, rules and stuff,</a>.</div>';
      }
      ?>

    </div>

    <!-- offset -->
    <div class="col-md-1"></div>
  </div>

  <footer>
    <div class="row">
      <div class="col-md-10">
        <p class="rightalign">Copyright &copy; 2015 JUIT-IEEE Student Branch</p>
      </div>
    </div>
  </footer>  

</div>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<?php
$totalquesq = mysqli_query($db,"SELECT COUNT(*) FROM questions");
$totalques = mysqli_fetch_array($totalquesq);
print '<script>var totalques = '.$totalques[0].'</script>';
?>
</body>
</html>
<?php
include('./incfoot.php');
?>
