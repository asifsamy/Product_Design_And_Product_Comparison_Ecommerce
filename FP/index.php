﻿<?php include 'inc/header.php';?>
<!--Header End-->
<?php include 'inc/slider.php';?>

<?php
    $viewsCnt = $msg->dailyViews();
?>

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<?php include 'inc/sidebar.php';?>
<!-- Sidebar end=============================================== -->
		<div class="span9">	
		 <h4>Custom Designed Products</h4>	
		  <div class="well well-small"> <!--here-->
			<div class="row-fluid">
			  <ul class="thumbnails">
			<?php
			   $getCpd = $cPd->getCustomSoldProduct();
			   if ($getCpd) {
			      while ($resultCp = $getCpd->fetch_assoc()) {   
			?>	
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a  href="details.php?proid=<?php echo $resultCp['productId']; ?>"><img style="height: 200px;" src="admin/<?php echo $resultCp['image']; ?>" alt=""/></a>
					<div class="caption">
					  <h5>Designed By: <?php echo $resultCp['lName']; ?></h5>
					  <h4><a class="btn" href="details.php?proid=<?php echo $resultCp['productId']; ?>">VIEW</a> <span class="pull-right">TK. <?php echo $resultCp['price']; ?></span></h4>
					</div>
				  </div>
				</li>
			<?php } } ?>	
			  </ul>			  		  
			  </div>
		</div> <!--here-->
		<h4>Featured Products </h4>
			  <ul class="thumbnails">
			  <?php
			    $getFpd = $pd->getFeaturedProduct(); 
			    if ($getFpd) {
			    	while ($result = $getFpd->fetch_assoc()) {
			  ?>	
				<li class="span3">
				  <div class="thumbnail">
					<a  href="details.php?proid=<?php echo $result['productId']; ?>"><img style="height: 200px;" src="admin/<?php echo $result['image']; ?>" alt=""/></a>
					<div class="caption">
					  <h5><?php echo $result['productName']; ?></h5>
					  <p> 
						<?php echo $fm->textShorten($result['body'], 60); ?> 
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="details.php?proid=<?php echo $result['productId']; ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="details.php?proid=<?php echo $result['productId']; ?>">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" type="disable"><?php echo $result['price']; ?></a></h4>
					</div>
				  </div>
				</li>
			<?php } } ?>
			  </ul>	

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
<?php include 'inc/footer.php';?>