
<?php require 'header.php'; ?>
<?php  include('session.php');?>



<?php
$gdesc=	$gimg="";


	if(isset($_POST['submit'])&&$_POST['submit']!='' ){
	
		$gdesc=$_POST['gpdesc'];
	
			
			require_once 'db/connection.php';
		
			$image_info = $_FILES['gpimg'];

			$image_name = $image_info['name'];
			$image_tmp_name = $image_info['tmp_name'];

			$folder = "images/";

			$full_path = $folder . $image_name;
			move_uploaded_file($image_info['tmp_name'],$full_path);
			 $img_path = $full_path;
		
		
		  
		  // DATABASE QUERRY TO INSERT
		  
	$stu_querry = "INSERT INTO `tbl_gameplays`(gp_img,gp_desc)VALUES('".$img_path."','".$gdesc."')";
		
		$result = mysqli_query($conn,$stu_querry);
		if($result){
			echo "record has been saved"; 
			?>	
				<a href="view_gameplays.php" class="btn btn-primary">Proceed Further</a>
			<?php
		}
		else{
			echo "some error has occured try again";
		}
	 
	   
	}//if end
	else{
		
	}
?>

<div class="row">
	<?php require 'dashboard.php'; ?>
	
<div class=" col-md-7 col-sm-7 col-lg-7 col-xs-7">
		<div class="dashboard">
		<div class="admin_main">
			<div class="loginleft">
				<h2>Welcome <?php echo $login_Uname ; ?></h2>
				<div class="add">
				<div class="forms">
	<form method="POST" style="display: block;" enctype="multipart/form-data" action="">
	
<textarea name="gpdesc" cols="47" placeholder="enter details here" id="gpdesc" rows="6"></textarea>	
<input type="file"  name="gpimg" placeholder="image" id="gpimg"> 		 
<input id="id1" type="submit" name="submit"  class="btn btn-success"  value="Submit">
<input type="reset" class="btn btn-danger"  value="reset" >
	
 </form>
					</div>	</div>
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
  
	



<?php
function isLoginSessionExpired() {
	$login_session_duration = 100; 
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


