<?php
	require_once'db/connection.php';

	$sql = "SELECT * FROM tbl_products";
	$result = $conn->query($sql);
?>


<?php require_once('header.php'); ?>
<?php require_once('nav.php') ?>


<div class="product-div">
	<div class="container">
				<h1>Products</h1>
		<div class="row">
		<?php
			if(!empty($result)){		
			while($row = $result->fetch_assoc()) {
		?>
			
				<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">					
				<div class="tabs">
					<img class="img-responsive" src="<?php echo $row['prod_img'];?>" alt="product-img"> 
					<a href="product-detail.php?id=<?php echo $row['id'];?>">READ MORE</a>
				</div> 
			</div>
		                              
		
		<?php
			}
	 
		}
 else {
    echo "NO results found or database empty";
	}

	   ?>
		
	</div> 	
	</div>
</div>


<?php require_once('footer.php'); ?>





