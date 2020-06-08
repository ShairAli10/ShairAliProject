<?php
	require_once'db/connection.php';

	$sql = "SELECT * FROM tbl_gameplays";
	$result = $conn->query($sql);
?>

<?php require 'header.php'; ?>
<?php require('nav.php') ?>



<div class="news-page">
		<div class="container">
			
			<?php
			if(!empty($result)){		
			while($row = $result->fetch_assoc()) {
		?>
			<div class="news-div">
				<div class="row" >
					<div class="news-left">
						<div class="img-left">
							<div class="img-tabs hovereffect">
								<img class="img-responsive" src="<?php echo $row['gp_img'];?>" style="width:100%;  height: 400px;" alt="">
							</div>
						</div>
					</div>
					<div class="news-right">					
						<div class="right-detail news-page-tabs hovereffects">
							<h6>Player Unknown Battle Ground</h6>
							<p><?php echo $row['gp_desc'];?></p>

									<div class="overlay">
										<h2><a href="about.php">read more</a></h2>
									</div>

						</div>
					</div>					
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


<?php require 'footer.php'; ?>