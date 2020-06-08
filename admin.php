


<?php require 'header.php'; ?>
<?php require('nav.php') ?>

<?php
session_start();
$uname=$pwd=$count="";
$uname_error = $pass_error ="";


	if(isset($_POST['submit'])&&$_POST['submit']!='' ){
		
		
		$uname=($_POST['uname']);
		$pwd=($_POST['pass']);
		
		if((isset($uname) || $uname=="") && (isset($pwd) || $pwd=="")){	 	
			if($uname==""){
	    		$uname_error= "*name is empty";
	 		}
			else if($pwd==""){
	    		$pass_error= "*password is required";
	 		}
			
			
			if($uname_error == "" && $pass_error== ""){
			
				require_once 'db/connection.php';
					$sql = "SELECT id FROM tbl_admins where uname='$uname' && pass='$pwd'";
				
				
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     
      
      $counted = mysqli_num_rows($result);
				if($counted ==1){
					echo "login sucessfull";
					
					
         			$_SESSION['login_user'] = $uname;					
         			$_SESSION['user_id'] = $row['id'];
					$_SESSION['loggedin_time'] = time(); 
         
         			header("location: welcome.php");
					
				}
				else{
					$uname_error ="user name  incorrect";
					$pass_error ="password mismatch";
					
				}
					
			}
			
			else{
				echo "all field required";
			}
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>admin panel</title>
	
</head>

<body>
	<div class="contactadmin">
<div class="container">	
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
<div class="formadmin">
	
	<h1>ADMIN LOGIN</h1>
	<form action="#" id="contact" method="post">
		
		<p>name</p>
		<input type="text" name="uname" placeholder="enter name" value="<?php echo $uname; ?>" id="name"> <span style="color: red;"><?php echo $uname_error; ?></span>
		
		<p>password</p>
		<input type="password" name="pass" placeholder="password" id="pass">
		<span style="color: red;"><?php echo $pass_error; ?></span>
		 
		<p><label for="rem">remember me</label></p>
		<input type="checkbox"  name="rem" id="rem" ><br>
		
		<input type="submit" name="submit"  class="btn btn-primary" value="LOG IN">
		<a href="#">Forgot password</a>
		<a href="add_signup.php">Sign Up</a>
	</form>
</div>
</div>
</div>
</div>
	</div>		
		
		
	

<?php require 'footer.php'; ?>