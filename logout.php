<?php 
include('./inchead.php');
 
if (isset($_SESSION['user-login-id'])) {
  $id = $_SESSION['user-login-id'];
  session_destroy();
  header('location:./index.php');
} else {
  header('location:./session_error.php');
}

include('./incfoot.php');
?>
