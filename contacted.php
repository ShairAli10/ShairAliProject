<?php require 'header.php'; ?>
<?php require('nav.php') ?>

<?php
$name=$number=$email="";
$name_error = $number_error = $email_error =" ";

	if(isset($_POST['submit'])&&$_POST['submit']!='' ){
	//if(	$_SERVER["REQUEST_METHOD"] == "POST"){
function func($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}	

$name=func($_POST['name']);
$email=func($_POST['email']);
$number=func($_POST['number']);

   if((isset($name) || $name=="") && (isset($number) || $number=="") && (isset($email) || $email=="")){
	 if($name==""){
	    $name_error= "*name is required";
	 }
	 else if(!preg_match( "/^(([A-za-z]+[\s]{1}[A-za-z]+)|([A-Za-z]+))$/",$name)){
		$name_error="*Name does not contain 0-9 digits";
	 }
	 else if(strlen($name)<3 or strlen($name)>10){
	    $name_error= "*length should be b/w 3 and 10";
	 }
	if($email==""){
	    $email_error= "*email is required";
	 }	
	if(!preg_match("/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/" ,$email)){
		$email_error="*Email must contain @ and correct domain";
	 }
	 if($number==""){
	    $number_error= "*number is required";
	 } 
	 else if(strlen($number)<10) {
	    $number_error= "*phone number is invalid ";
	 }
	 if( strlen($number)>11){
		$number_error= "*phone number can't exceed 11 digits ";
	 }
				
	}
	else{
		
	}
	}
	
?>
<div class="contact">
<div class="container">
	<h1>Contact Us</h1>
<div class="row">
<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
<div class="forms">
	<form action="#" id="contact" method="post">
		
		<p>name</p><span style="color: red;"><?php echo $name_error; ?></span>
		<input type="text" name="name" placeholder="enter name" value="<?php echo $name; ?>" id="name"> 
		
		<p>email</p><span style="color: red;"><?php echo $email_error; ?></span>		
		<input type="email" name="email" value="<?php echo $email; ?>" placeholder="email@gmail.com" id="email"> 
		
		<p>phone number</p><span style="color: red;"><?php echo $number_error; ?></span>
		<input type="number" value="<?php echo $number; ?>" name="number" placeholder="enter number"  id="number">
		
		<p>comments</p>
		<textarea name="details" class="form-control" id="details" rows="6" cols="47"></textarea>
		<a href="#"><input type="submit" name="submit" value="Submit"></a><br>
		<input type="reset"   value="reset">

	</form>
</div>
</div>
	
<div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
<div class="address">
	<p>
		PUBG Corporation<br>
		520 Broadway<br>
		Suite 200<br>
		Santa Monica, CA 90401<br>
		<a href="#">(949) 829-3714</a><br>
		<a href="#">https://playbattlegrounds.com</a><br>
	</p>
	<div id="map-container-google-1" class="z-depth-1-half map-container">
		<iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" 		frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</div>
</div>
</div>
</div>
</div>


<?php require 'footer.php'; ?>

</body>
</html>

<script>
$(document).ready(function() {
  $("#contact").validate({
    rules: {
      name : {
        required: true,
        minlength: 3,
		maxLength:20,
		Number:false
      },
      email: {
        required: true,
        email: true
      },
      number: {
		required : true,
        minlength: 10,
        maxlength: 11
      },
		
    },
    messages : {
      name: {
		required : "name is compulsory",
        minlength: "name must be at least 3 characters",
        maxlength: "name should be at most 20 characters",
		Number:"name does not contain 0-9 or @etc.."
      },
      email: {
		required : "email is required",
        email: "email should be in the format: abc@gmail.com"
      },
      number: {
		required : "number is required",
        minlength: "number should be at least 11 digits",
        maxlength: "number exceeding 11 digits"
      },
    }
  });
});
	</script>
