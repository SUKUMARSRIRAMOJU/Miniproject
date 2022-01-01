<?php
  require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" href="css/style1.css">
    </head>
    <body style="background-color:#CAD3C8">
    <div id="main-wrapper">
    <center>
        <h2>Register Form</h2>
        <img src="imgs/avatar.png" class="avatar"/>
    </center>
    
        <form class="myform" action="register.php" method="post">
            <label><b>Username:</label><br>
            <input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
            <label><b>Password:</label><br>
            <input name="password" type="password" class="inputvalues" placeholder="Your password" required/><br>
            <label><b>Confirm Password:</label><br>
            <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br>
            <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
            <a href="index.php"><input type="button" id="back_btn" value="Back"/></a>        
        </form>
        <?php
          if(isset($_POST['submit_btn'])){
              //echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
              $username = $_POST['username'];
              $password = $_POST['password'];
              $cpassword = $_POST['cpassword'];
              if($password==$cpassword){
                  $query= "select * from user WHERE username='$username'";
                  $query_run = mysqli_query($con,$query);
                  if(mysqli_num_rows($query_run)>0){
                      echo '<script type="text/javascript"> alert("User already exists...try another username ") </script>';
                  }
                  else
                  {
                    $query= "insert into user values('$username','$password')";
                    $query_run = mysqli_query($con,$query);
                    if($query_run){
                        echo '<script type="text/javascript"> alert("User Registered..Go to login page to login") </script>';
                    }
                    else{
                        echo '<script type="text/javascript"> alert("Error!") </script>';
 
                    }
                  }

              }
              else{
                echo '<script type="text/javascript"> alert("password and confirmpassword does not match!") </script>';
              }
          }
        ?>
        </div>
    </body>
</html>