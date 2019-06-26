<?php
   include('config.php');
   session_start();

   if(!isset($_SESSION['login_user'])){
      echo "<script type='text/javascript'>alert('Please Login First')</script>";
      header("refresh:0; url=login.php");
      die();
   }

   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select username from users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];

?>