<?php
   include("config.php");
   session_start();
   $error = "";
   
   if(isset($_SESSION['login_user'])){
      header("location:homepage.html");
      die();
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT user_ID FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login-check'] = 1;
         
         header("location: homepage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <h2>Login Form</h2>
<div class = "container form-signin">



</div> 
   <div class="imgcontainer"><img src="images/Daycare.png" alt="Avatar" class="avatar"></div>
   <div class="container">
   <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
   <form action="" method = "post">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required> 

      <button type="submit" name="login" value=" Submit ">Login</button>
      <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
   </div>
   <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a   href="#">password?</a></span>
   </div>
</form>
</body>
</html>
