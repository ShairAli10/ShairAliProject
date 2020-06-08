
<?php 

$ids = $_GET['id'];

  require_once('db/connection.php');

	$sql = "SELECT * FROM tbl_products where id=$ids";
	$result = $conn->query($sql);


?>

<?php require_once('header.php'); ?>
<?php require_once('nav.php') ?>

	
<?php
	  	if(!empty($result)){		
    	while($row = $result->fetch_assoc()) {//this fetches array 
		
			$pname = $row['prod_name'] ;
			$pprice = $row['prod_price'] ;
			$psize = $row['prod_size'] ;
			$pdiscount = $row['prod_discount'] ;
			$pdetails = $row['prod_details'] ;
			$pimg = $row['prod_img'] ;
		
?>




<div class="detail-tab">
	 	<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="img-tabs hovereffect">
					<img class="img-responsive" src="<?php echo $pimg;?>" alt="product-img"> 
					</div>
				</div>
				<div class="col-md-8">					
					<div class="img-detail">
						<h2><?php echo $pname;?></h2>
						<h6>Price: <?php echo $pprice;?> UC.</h6>
						<h6>Discount: <?php echo $pdiscount;?>.</h6>
						<h6>available color:</h6>
						<input type="radio"><span>Red</span><br>
						<input type="radio"><span>Pink</span><br>
						<input type="radio"><span>violet</span><br>
						
						<button><a href="#">Buy now</a></button>
						<button><a href="#">Add to cart</a></button>
						
						<p><?php echo $pdetails;?></p>
						
						<button><a href="products.php">View more</a></button>
					</div>
				</div>
			</div>
		</div>
	</div>	
<?php	
		}
		}

?>
	
	
	
<?php require 'footer.php'; ?>
	
	
	
	