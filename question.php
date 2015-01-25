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
  <link type="text/css" href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>
