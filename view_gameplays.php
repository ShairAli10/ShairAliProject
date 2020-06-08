<?php
	require_once'db/connection.php';

	$sql = "SELECT * FROM tbl_gameplays";
	$result = $conn->query($sql);
?>

<?php include('session.php');?>
<?php require 'header.php'; ?>
<div class="row">
	<?php require 'dashboard.php'; ?>
	<div class="col-md-10 col-sm-10 col-lg-10 col-xs-10">
		<div class="dashboard-top logintop">
			<ul> 
				<li><h5> VIEW GAMEPLAYS TABLE</h5></li> 
				<li>					
					<img src="<?php echo $login_img; ?>"  alt="">
					<a href="welcome.php"><?php echo $login_Uname ; ?></a>
					<a href="logout.php">signout</a>
				</li>
			</ul>
		
		 
		

		</div>
	<h5>COMING SOON</h5>
<div class="view-table">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">gameplay_id</th>
      <th scope="col">gameplay_image</th>
      <th scope="col">gameplay_desc</th>
      <th scope="col">gameplay_view</th>
      <th scope="col">Actions</th
    </tr>
  </thead>
  <tbody>
	  
	  <?php
	  	if(!empty($result)){		
    	while($row = $result->fetch_assoc()) {//this fetches array 
		?>
        
				<tr>	
				  <td><?php echo $row['gp_id'];?></td>
					<td><img src="<?php echo $row['gp_img'];?>" alt="img" style=" width:75px; height: 75px;"></td>
				  <td><?php echo $row['gp_desc'];?></td>
					<td><a href="gameplays.php" class="btn btn-success">view details</a></td>
				  
				  <td>
					<a href="update.php?id=<?php echo $row['gp_id'];?>" class="btn btn-primary">EDIT</a>
					<a href="delete.php?id=<?php echo $row['gp_id'];?>" class="btn btn-danger">DELETE</a>		
				  </td>
	     		</tr>
	  			
	  <?php
			}
	 
		}
 else {
    echo "NO results database empty";
	}

	   ?>
	
    
  </tbody>
</table>
		<tr><a href="add_gameplay.php" class="btn btn-primary">ADD NEW</a></tr>			
</div>
</div>
	
</div>