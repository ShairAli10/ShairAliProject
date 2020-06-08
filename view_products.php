<?php
	require_once'db/connection.php';

	$sql = "SELECT * FROM tbl_products";
	$result = $conn->query($sql);
?>
<?php include('session.php');?>
<?php require 'header.php'; ?>

<div class="row">
	
	<?php require 'dashboard.php'; ?>
	
	
	
	<div class="col-md-10 col-sm-10 col-lg-10 col-xs-10">
		<div class="dashboard-top logintop">
			<ul> 
				<li><h5>ADMIN PANEL VIEW PRODUCT TABLE</h5></li> 
				<li>					
					<img src="<?php echo $login_img; ?>"  alt="">
					<a href="welcome.php"><?php echo $login_Uname ; ?></a>
					<a href="logout.php">signout</a>
				</li>
			</ul>
		
		 
		

		</div>
<div class="view-table">
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">prod_id</th>
      <th scope="col">prod_name</th>
      <th scope="col">prod_size</th>
      <th scope="col">prod_price</th>
      <th scope="col">prod_discount</th>
      <th scope="col">prod_details</th>
      <th scope="col">prod_img</th>
    </tr>
  </thead>
  <tbody>
	  
	  <?php
	  	if(!empty($result)){		
    	while($row = $result->fetch_assoc()) {//this fetches array 
		?>
        
	<tr>	
	  <td><?php echo $row['id'];?></td>
	  <td><?php echo $row['prod_name'];?></td>
	  <td><?php echo $row['prod_size'];?></td>
	  <td><?php echo $row['prod_price'];?></td>
	  <td><?php echo $row['prod_discount'];?></td>
	  <td><a href="product-detail.php?id=<?php echo $row['id'];?>" class="btn btn-success">view details</a></td>
	  <td><img src="<?php echo $row['prod_img'];?>" alt="img" style=" width:75px; height: 75px;"></td>
	  <td>
		<a href="update_product.php?id=<?php echo $row['id'];?>" class="btn btn-primary">EDIT</a>
		<a href="delete_product.php?id=<?php echo $row['id'];?>" class="btn btn-danger">DELETE</a>		
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
		<tr><a href="add_product.php" class="btn btn-primary">ADD NEW</a></tr>			
</div>
	</div>
	
</div>

	
	
</body>
</html>