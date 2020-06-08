
<?php require 'header.php'; ?>
<?php  include('session.php');?>


<?php 
$pname=	$psize=	$pprice=$pdiscount=	$pdetails=$pimg ="";


$old_pname=	$old_psize=	$old_pprice=$old_pdiscount=	$old_pdetails=$old_pimg ="";

   //this id is to delete the record ids
	$ids = (!empty($_GET['id'])) ? $_GET['id'] : '';

	$sql = "SELECT * FROM tbl_products where id='$ids' ";
$result = $conn->query($sql);

	  	if(!empty($result)){		
    	while($row = $result->fetch_assoc()) {//this fetches array 
			$row['id'];
			$old_pname=$row['prod_name'];
			$old_psize=$row['prod_size'];
			$old_pprice=$row['prod_price'];
			$old_pdiscount=$row['prod_discount'];
			$old_pdetails=$row['prod_details'];
			$old_pimg=$row['prod_img'];
				
	  
			}
	 
		}




	//this is record after submit
	if(isset($_POST['submit'])&&$_POST['submit']!='' ){
				
		require_once 'db/connection.php';
		
		
		$pname=$_POST['prod_name'];
		$psize=$_POST['prod_size'];
		$pprice=$_POST['prod_price'];
		$pdiscount=$_POST['prod_discount'];
		$pdetails=$_POST['prod_details'];
		$pimg  =($_FILES['prod_img']);
		
		
		$image_info = $_FILES['prod_img'];

			$image_name = $image_info['name'];
			$image_tmp_name = $image_info['tmp_name'];

			$folder = "images/";

			$full_path = $folder . $image_name;
			move_uploaded_file($image_info['tmp_name'],$full_path);
			 $img_path = $full_path;
		
			
		$results = "UPDATE tbl_products SET prod_name='$pname',prod_size='$psize',prod_price='$pprice',prod_discount='$pdiscount',prod_details='$pdetails',prod_img='$img_path' where id='$ids' ";
		
		if ($conn->query($results) === TRUE) {
			echo "Record updated";
		?>	
			<a href="view_products.php" class="btn btn-primary">Proceed Further</a>
		<?php
		} 
		else {
			echo "not updated" . $conn->error;
		}
	}
?>  

<div class="row">
	<?php require 'dashboard.php'; ?>
	
<div class=" col-md-7 col-sm-7 col-lg-7 col-xs-7">
		<div class="dashboard">
		<div class="admin_main">
			<div class="loginleft">
				
	<h1> EDIT PRODUCT</h1>
				<div class="add">

<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
<div class="forms">
	<form method="POST" style="display: block;" enctype="multipart/form-data" action="">
		
<input type="text" name="prod_name" value="<?php echo $old_pname; ?>" placeholder="product name*" id="pname"  >
<input type="text" name="prod_size" value="<?php echo $old_psize; ?>"  placeholder="product size*"  id="prod_size">
<input type="text" name="prod_price" value="<?php echo $old_pprice; ?>"  placeholder="product price"  id="prod_price" > 
<input  type="text" id="prod_discount" name="prod_discount" placeholder="prod_discount" value="<?php echo $old_pdiscount; ?>">
<textarea name="prod_details" cols="47" placeholder="enter details here" id="prod_details" rows="6"></textarea>	
		
	  <img src="<?php echo $old_pimg;?>" alt="" style="width: 50px;height: 50px;">
<input type="file"  name="prod_img" placeholder="image" id="prod_img"> 		 
<input id="id1" type="submit" name="submit"  class="btn btn-success"  value="Submit">
<input type="reset" class="btn btn-danger"  value="reset" >
	
 
</div>	
 
</form>
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
