<?php
		$id = (!empty($_GET['id'])) ? $_GET['id'] : '';
		echo "$id";
		require_once 'db/connection.php';
		
		
		$results = "DELETE FROM signup_user where id='$id' ";
		

		if ($conn->query($results) === TRUE) {
			echo "Record deleted successfully";
		?>	
			<a href="view_signup.php" class="btn btn-primary">Proceed Further</a>
		<?php
		}
		else {
			echo "Error deleting record: " . $conn->error;
		}

?>  

