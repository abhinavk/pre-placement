<?php 
    ob_start();
    session_start();
    mysql_connect("localhost","root","");
    mysql_select_db("juitieee_ppp");
 ?>

 <?php 
 	if (isset($_SESSION['user-login-id'])) {
		$id = $_SESSION['user-login-id'];
		
	}
	
  ?>



 <!doctype html>
    <html lang="en">
        <head>
            <title>
               Placement Mock Test
            </title>
            <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500italic' rel='stylesheet' type='text/css'>
            </head>
            <body style="background-color:white";>
             <div class="container-fluid" >
                 <div class="row">
                 <div class="col-md-12">
                     
                     <div style="background-color:black;padding:10px 10px 10px 10px;margin-left:-20px;margin-right:-20px;">
                 <center><h2 style="font-family: 'Alegreya Sans SC', sans-serif;color:white"><b>Pre-Placement Mock Test</b></h2></center> 


                 <form action="" method="post">
                 	<button type="submit" class="btn btn-default" name="logout" style="float:right;">Logout</button>
                 </form>


                     </div>
                         <br><br> <br><br><br><br>
                 </div>
                 </div>

<?php 
	if (isset($_SESSION['user-login-id']) ) { ?>
		<div class="row">
            <div class="col-md-12">
 	            <center>  <h2>Space for Questions</h2>  </center>
            </div>
        </div>

 
	<?php }else{ ?>
			
	<?php header("location:session_error.php"); }
 ?>
 



<?php 
	if (isset($_POST['logout'])) {
		session_unset($_SESSION['user-login-id']);
	 	
	 	header("location:index.php");
	}
 ?>

 <?php 


