
<?php require 'header.php'; ?>
<?php  include('session.php');?>



<?php
$fname=$uname=$email=$pass=$cpass=$img=$img_name=$old_fname=$old_uname=$old_email=$old_pass=$old_img="";
$fname_error = $uname_error = $email_error = $pass_error = $cpass_error = $img_error =$imgs_error ="";

$ids = (!empty($_GET['id'])) ? $_GET['id'] : '';

$sql = "SELECT * FROM tbl_admins where id='$ids' ";
$result = $conn->query($sql);

	  	if(!empty($result)){		
    	while($row = $result->fetch_assoc()) {//this fetches array 
			$row['id'];
			$old_fname=$row['fname'];
			$old_uname=$row['uname'];
			$old_email=$row['email'];
			$old_pass=$row['pass'];
			$old_img=$row['img'];
				
	  
			}
	 
		}


	if(isset($_POST['submit'])&&$_POST['submit']!='' ){
		
		
function cleaning($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}	

$fname=cleaning($_POST['fname']);
$uname=cleaning($_POST['uname']);
$email=cleaning($_POST['email']);
$pass=cleaning($_POST['pass']);
$cpass=cleaning($_POST['cpass']);

$img  =($_FILES['img']);
		
			
		
		

   if((isset($fname) || $fname=="") && (isset($uname) || $uname=="") && (isset($email) || $email=="") && (isset($pass) || $pass=="") && (isset($cpass) || $cpass=="") && (isset($img) || $img=="")){
	 if($fname==""){
	    $fname_error= "*name is required";
	 }
	 else if(!preg_match( "/^(([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$/",$fname)){
		$fname_error="*Name does not contain 0-9 digits";
	 }
	 else if(strlen($fname)<3 or strlen($fname)>20){
	    $fname_error= "*length should be b/w 3 and 10";
	 }
	   
	  if($uname==""){
	    $uname_error= "*user name is required";
	 }
	 else if(strlen($uname)<3 or strlen($uname)>10){
	    $uname_error= "*user name should be b/w 3 and 15";
	 }
	   
	if($email==""){
	    $email_error= "*email is required";
	 }	
	else if(!preg_match("/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/" ,$email)){
		$email_error="*Email must contain @ and correct domain";
	 }
	 if($pass==""){
	    $pass_error= "*password is required";
	 } 
	 else if(strlen($pass)<4) {
	    $pass_error= "*password is too weak ";
	 }
	 
	   
	 if($cpass==""){
	    $cpass_error= "*confirm password empty";
	 }
	 
     else if($pass!=$cpass){
	   $pass_error= "*password mismatch ";
	   $cpass_error= "*confirm password mismatch ";
     }
		
	 if($img==""){
	    $img_error= "*please select profile pic";
	 }
	   
	  // AFTER VALIDATION ENTRING DATA TO DATABASE 
	   
	  if($fname_error=="" && $uname_error == "" && $email_error == "" && $pass_error== "" &&
		   	$cpass_error==""&&$imgs_error==""&&$img_error==""){
			
			require_once 'db/connection.php';
		
			$image_info = $_FILES['img'];

			$image_name = $image_info['name'];
			$image_tmp_name = $image_info['tmp_name'];

			$folder = "images/";

			$full_path = $folder . $image_name;
			move_uploaded_file($image_info['tmp_name'],$full_path);
			 $img_path = $full_path;
		
		
		  
		  // DATABASE QUERRY TO INSERT
		  
	$stu_querry = "update `tbl_admins` set fname='$fname',uname='$uname',email='$email',pass='$pass',img='$img_path' where id=$ids"; 
		
		$result = mysqli_query($conn,$stu_querry);
		if($result){
			echo "record has been updated"; 
			$old_fname="";
			$old_uname="";
			$old_email="";
			$old_pass="";
			$old_img="";
			?>	
				<a href="view_admin.php" class="btn btn-primary">Proceed Further</a>
			<?php
		}
		else{
			echo "some error has occured try again";
		}
	}	  
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
				
	<h1>UPDATE ADMIN USER</h1>
				<div class="add">

<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
<div class="forms">
	<form id="signup" method="POST" enctype="multipart/form-data" action="" style="width: 650px; padding: 25px; border: 2px solid; background-color: orange;">
	
  <div class="form-group "><span style="color: red;"><?php echo $fname_error; ?></span>
    <input type="text" name="fname" value="<?php echo $old_fname; ?>" placeholder="full name*" class="form-control" id="fname"  >
  </div>
	
  <div class="form-group "> <span style="color: red;"><?php echo $uname_error; ?></span>   
    <input type="text" name="uname" value="<?php echo $old_uname; ?>"  placeholder="user name*" class="form-control" id="uname" >
  </div>
		
  <div class="form-group "><span style="color: red;"><?php echo $email_error; ?></span>
    <input type="email" name="email" value="<?php echo $old_email; ?>"  placeholder="email@gmail.com" class="form-control" id="email" > 
  </div>
  
  <div class="form-group "><span style="color: red;"><?php echo $pass_error; ?></span>
    <input type="password" name="pass" value="<?php echo $old_pass; ?>"  placeholder="enter password *" class="form-control" id="pass" > 
	  
  </div>
  <div class="form-group "><span style="color: red;"><?php echo $cpass_error; ?></span>
    <input type="password" name="cpass" value="<?php echo $old_pass; ?>"  placeholder="Confirm password *" class="form-control" id="cpass" > 
	  
  </div>
  
	
  <div class="form-group "><span style="color: red;"><?php echo $img_error; ?></span>
	  <img src="<?php echo $old_img;?>" alt="" style="width: 50px;height: 50px;">
    <input type="file"  name="img" placeholder="image" class="form-control" id="img"> 
	     
  </div>
  
<div class="form-group">
 <input type="submit" name="submit"  class="btn btn-success"  value="Submit"  style="width: 49%;">
 <input type="reset" class="btn btn-danger"  value="reset" style="width: 50%;" >
	
 <a  style="width: 100%;margin-top: 10px;" href="view_admin.php" class="btn btn-primary">VIEW RECORDS</a>
 
</div>	
 
</form>
	
	
	
</div>	
 

</div>
</div>
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
