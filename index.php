<?php 
    ob_start();
    session_start();
    mysql_connect("localhost","root","");
    mysql_select_db("juitieee_ppp");
 ?>

<!doctype html>
    <html lang="en">
        <head>
            <title>
                Mock Placement Quiz
            </title>
            <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,500italic' rel='stylesheet' type='text/css'>
            </head>
            <body style="background-color:silver";>
             <div class="container-fluid" >
                 <div class="row">
                 <div class="col-md-12">
                     
                     <div style="background-color:grey;padding:10px 10px 10px 10px;margin-left:-20px;margin-right:-20px;">
                 <center><h2 style="font-family: 'Alegreya Sans SC', sans-serif;color:white"><b>Mock Placement Quiz</b></h2></center> 
                     </div>
                         <br><br> <br><br><br><br>
                 </div>
                 </div>
                 
                 
                 <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                     
                         <form class="form-horizontal" method="post">
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="id" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                          </div>
                         
                          <div class="form-group">
                              <div class="col-md-4"></div>
                            <div class="col-md-2">
                         <center>    <button type="submit" name="login" class="btn btn-default">Sign in</button>  </center> 
                            </div>
                              <div class=" col-md-2" style="float:left;">
                         <center>    <button type="submit" name="register" class="btn btn-default">Register</button>  </center> 
                            </div>
                              <div class="col-md-5"></div>
                              
                              
                            
                          </div>
                        </form>
                         
                     </div>
                     <div class="col-md-4"></div>
                     
                     
                </div>
                 
                 
                    
            </div>
            </body>
        </head>
    </html>

    <?php 

    if (isset($_POST['login'])) {
        $id = $_POST['id'];
        $password = $_POST['password'];
        $password = $password;

        $select_login = "select * from users where id = '$id' and password = '$password'";
        $result_login = mysql_query($select_login) or die(mysql_error());
        $res_login = mysql_fetch_assoc($result_login);

        if ($res_login) { 
            echo "Login Successful";
            $_SESSION['user-login-id'] = $res_login['id'];
           // $_SESSION['user-login-name'] = $res_login['name'];
            header('location:question.php');
         }
        else{
            echo "<script>alert('Incorrect username  or password');</script>";
        }
    }


?>