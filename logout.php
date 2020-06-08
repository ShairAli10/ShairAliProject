<?php
  session_start();
   
   

if($_GET["session_expired"]==1	){
	unset($_SESSION["user_id"]);
	unset($_SESSION["user_name"]);
	$url = "admin.php";
	if(isset($_GET["session_expired"])) {
		$url .= "?session_expired=" . $_GET["session_expired"];
	}
	header("Location:$url");
}



else if(session_destroy()) {
      header("Location: admin.php");
   
}
else{
	
}
?>