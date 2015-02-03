<?php
include('./inchead.php');
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Pre-Placement|Registration</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style type="text/css">
#message {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
#inner-message {
    margin: 0 auto;
}
    </style>

</head>
<body>
    <div class="container">
        <div class="row text-center pad-top ">
            <div class="col-md-12">
                <h2>Pre-Placement Registration</h2>
            </div>
        </div>
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="register.php">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="register_name" class="form-control" placeholder="Your Name" required/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="register_roll" class="form-control" placeholder="Your Roll No" required/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="register_email" class="form-control" placeholder="Your Email" required/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-briefcase"  ></i></span>
                                            <input type="text" name="register_sem" class="form-control" placeholder="Your Semester" required/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="register_dob" class="form-control" placeholder="Date Of Birth (YYYY-MM-DD)" required/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="register_password" class="form-control" placeholder="Password" required/>
                                        </div>
                                     
                                     <input type="submit" class="btn btn-success " name="register_button" value="Register Me" />
                                    <hr />
                                    Already Registered ?  <a href="index.php" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/plugins/bootstrap.js"></script>
   
</body>
</html>

<!--REGiSTER PHP-->
<?php
if (isset($_POST['register_roll']) && isset($_POST['register_name']) && isset($_POST['register_dob']) && isset($_POST['register_sem']) && isset($_POST['register_email']) && isset($_POST['register_password'])) {
  $register_roll=mysql_real_escape_string($_POST['register_roll']);
  $register_name=mysql_real_escape_string($_POST['register_name']);
  $parts = explode(" ", $register_name);
  $lastname = array_pop($parts);
  $firstname = implode(" ", $parts);

  $register_email=mysql_real_escape_string($_POST['register_email']);
  $register_dob=mysql_real_escape_string($_POST['register_dob']);
  $register_password=mysql_real_escape_string($_POST['register_password']);
  $register_semester=mysql_real_escape_string($_POST['register_sem']);
   
   if(!empty($register_roll) && !empty($register_name) && !empty($register_dob) && !empty($register_email) && !empty($register_password) && !empty($register_semester)){
      $query_check_roll=mysqli_query($db,"SELECT roll FROM users WHERE roll='$register_roll';");
     if(mysqli_num_rows($query_check_roll)==0){
      $query2=mysqli_query($db,"INSERT INTO users VALUES('','$register_roll','$firstname','$lastname','$register_dob','$register_password','0','0','0');");
      if($query2){
          echo '<div class="alert alert-success" id="message">'.
    '<a href="index.php" class="close" data-dismiss="alert" id="inner-message">&times;</a>'.'
    <strong>Success!</strong>'.'Thanks for Registering.'.
'</div>';
        header('location:../');

      }else{
        echo '<script type="text/javascript">'.
        'alert("Unable to register!");'.
        '</script>';
      }

     }else{
        echo '<div class="alert alert-warning" id="message">'.
    '<a href="#" class="close" data-dismiss="alert" id="inner-message">&times;</a>'.'
    <strong>Warning!</strong>'.' User already registered.'.
'</div>';
     }

   }else{
    /*echo '<script type="text/javascript">'.
        'alert("Fill all fields !");'.
        '</script>';*/
   }

}else{
   
}
?>

<!--END REGISTER-->