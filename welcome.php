
<?php require 'header.php'; ?>

<?php
   include('session.php');
   
?>
<div class="row">
	<?php require 'dashboard.php'; ?>
	
<div class=" col-md-7 col-sm-7 col-lg-7 col-xs-7">
		<div class="dashboard">
		<div class="admin_main">
			<div class="loginleft">
				<h2>Welcome <?php echo $login_Uname ; ?></h2>
			</div>
			
		</div>
		
		
		</div> 
	</div>
	<div class=" col-md-3 col-sm-3 col-lg-3 col-xs-3">
			<div class="loginright ">
				<h6>Currently logged In as:</h6>
				<img src="<?php echo $login_img; ?>"  alt=""> 
				<h6><?php echo $login_Uname ; ?></h6>
				<h6><?php echo $login_email ; ?></h6>
				<a href="#">edit profile</a>
				<br>
				<a href="logout.php">signout</a>
			</div>
		</div>
	
	
	</div>	
</div>

  



<?php
function isLoginSessionExpired() {
	$login_session_duration = 10; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time'])/*and isset($_SESSION["user_id"])*/){ 
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			echo 'yes not expire';
			return true; 
		} 
	}
	echo 'yes expired';
	return false;
}

	
if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		//header("Location:admin.php");
		echo "redirecting ";
	} 
	else {
		header("Location:logout.php?session_expired=1");
	}
}



?>




<?php require 'footer.php'; ?>