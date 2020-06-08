<?php
$fname=$uname=$email=$pass=$cpass=$img=$img_name="";
$fname_error = $uname_error = $email_error = $pass_error = $cpass_error = $img_error =$imgs_error ="";

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
	 else if( strlen($pass)>5){
		$pass_error= "*string password";
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
			
			require_once 'connect.php';
		
			$image_info = $_FILES['img'];

			$image_name = $image_info['name'];
			$image_tmp_name = $image_info['tmp_name'];

			$folder = "images/";

			$full_path = $folder . $image_name;
			move_uploaded_file($image_info['tmp_name'],$full_path);
			 $img_path = $full_path;
		
		
		  
		  // DATABASE QUERRY TO INSERT
		  
	$stu_querry = "INSERT INTO `signup_user`(fname,uname,email,pass,img) VALUES('".$fname."','".$uname."','".$email."','".$pass."','".$img_path."')";
		
		$result = mysqli_query($conn,$stu_querry);
		if($result){
			echo "record has been saved"; 
			?>	
				<a href="signin.php" class="btn btn-primary">Proceed Further</a>
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



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Form Validation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 
</head>
<body>

	<div class="container w-50" >
		<h4>sir bss iss mai session aur login wala kam nahi hua mere se my appologies</h4>
<form id="signup" method="POST" enctype="multipart/form-data" action="" style="width: 650px; padding: 25px; border: 2px solid; background-color: orange;">
	<h1 style="text-align: center; color: #8C8282;">Sign Up Form</h1>
	
  <div class="form-group "><span style="color: red;"><?php echo $fname_error; ?></span>
    <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="full name*" class="form-control" id="fname"  >
  </div>
	
  <div class="form-group "> <span style="color: red;"><?php echo $uname_error; ?></span>   
    <input type="text" name="uname" value="<?php echo $uname; ?>"  placeholder="user name*" class="form-control" id="uname" >
  </div>
		
  <div class="form-group "><span style="color: red;"><?php echo $email_error; ?></span>
    <input type="email" name="email" value="<?php echo $email; ?>"  placeholder="email@gmail.com" class="form-control" id="email" > 
  </div>
  <div class="form-group w-50 " >
	  <label><b>Gender*</b></label>
	<input  type="radio" id="male" name="gender" value="male"><label  for="male">Male</label>
	<input type="radio" id="female" name="gender" value="female"><label for="female">female</label>
		 
  </div>
  <div class="form-group ">
    
	  <select class="form-control" name="country" id="country">
	  	<option value="">Select Country</option>	  
	  	<option value="pakistan">PAKISTAN</option>	  
	  	<option value="canada">CANADA</option>	  
	  	<option value="america">AMERICA</option>	  
	  	<option value="switzerland">SWITZERLAND</option>	  
	  	<option value="germany">GERMANY</option>	  
	  </select>
	  
  </div>
  <div class="form-group "><span style="color: red;"><?php echo $pass_error; ?></span>
    <input type="password" name="pass" value="<?php echo $pass; ?>"  placeholder="enter password *" class="form-control" id="pass" > 
	  
  </div>
  <div class="form-group "><span style="color: red;"><?php echo $cpass_error; ?></span>
    <input type="password" name="cpass" value="<?php echo $cpass; ?>"  placeholder="Confirm password *" class="form-control" id="cpass" > 
	  
  </div>
  <div class="form-group ">
    <textarea name="details" class="form-control" id="details" rows="6">
	  	
	  </textarea>
    
	  
  </div>
  <div class="form-group "><span style="color: red;"><?php echo $img_error; ?></span>
    <input type="file"  name="img" placeholder="image" class="form-control" id="img"> 
	     
  </div>
  
<div class="form-group">
 <input id="id1" type="submit" name="submit"  class="btn btn-success"  value="Submit"  style="width: 49%;">
 <input type="reset" class="btn btn-danger"  value="reset" style="width: 50%;" >
	
 
</div>	
 
</form>
	</div>
	
		
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>
/*
$(document).ready(function() {
  $("#signup").validate({
    rules: {
      fname : {
        required: true,
        minlength: 3,
		maxLength:20,
		Number:false
      },
      uname: {
        required: true,
        number: true,
        minlength: 10
      },
      email: {
        required: true,
        email: true
      },
		
      gender: {
		required : true
        
      },
      pwd: {
		required : true,
        minlength: 8,
        maxlength: 20
      },
      cpwd: {
		required:true,
		equalTo:'#pwd'
		 
      },
	  img:{
		required : true,
		extension: "jpeg|jpg|png|gif"
		
	  },
		
    },
    messages : {
      fname: {
		required : "name is compulsory",
        minlength: "name should be at least 3 characters",
        maxlength: "name should be at most 20 characters",
		Number:"name does not contain 0-9 or @etc.."
      },
      uname: {
		required : "user name is compulsory",
        minlength: "name should be at least 10 characters"
      },
      email: {
		required : "email is required",
        email: "email should be in the format: abc@gmail.com"
      },
      gender: {
		required : "Gender is required"
        
      },
      pwd: {
		required : "password is required",
        minlength: "password should be at least 8 characters",
        maxlength: "password should be at most 20 characters"
      },
      cpwd: {
		required : "confirm password mismatch",
		 equalto : "password mismatch"
      },
		
	  img:{
		required : "please select image",
		extension: "select valid extension"
		
	  },
    }
  });
});	
	
*/	

</script>
</body>
</html>