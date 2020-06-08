<?php
   require_once 'db/connection.php';
   session_start();
   
   $user_check = $_SESSION['login_user'];

	$user_time = $_SESSION['loggedin_time'];






	$sql = "select * from tbl_admins where uname = '$user_check' ";

   $ses_sql = mysqli_query($conn,$sql);
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_Uname = $row['uname'];
   $login_id = $row['id'];
   $login_email = $row['email'];
   $login_img = $row['img'];
   

   if(!isset($_SESSION['login_user'])){
      header("location:admin.php");
      die();
   }







?>