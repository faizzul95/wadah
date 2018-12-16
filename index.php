<?php 

session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<title>Wadah | Laman Utama</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/jquery.bxslider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<style>
		.active {
		    background-color: #4CAF50;
		}
		</style>
	</head>
	<body background="images/bg2.jpg">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include 'style/navigation.php'; ?>
		</nav>

		<div class="container">
		<header>
			<a href="index.php"><img src="images/fulllogo.jpg" width="100%" height="100%"></a>
		</header>
		<section class="main-slider">
			<ul class="bxslider">
				<li><div class="slider-item"><img src="images/1.png" title="" /><h2><a href="post.php" title="">Slider 1</a></h2></div></li>
				<li><div class="slider-item"><img src="images/2.png" title="" /><h2><a href="post.php" title="Vintage-Inspired Finds for Your Home">Slider 2</a></h2></div></li>
				<li><div class="slider-item"><img src="images/3.png" title="Funky roots" /><h2><a href="post.php" title="">Slider 3</a></h2></div></li>
			</ul>
		</section>
		<section>
			<div class="row">
				<div class="col-md-8">
					

					<?php //Open php
					    require('connection.php');
					    
					   $category = "Awam";
					   $today = date('Y-m-d');
					   $sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_category` = '$category'") or die (mysqli_error());//Select table from database

							while($row=mysqli_fetch_array($sql))//loop the data
							{
								$act_id = $row['act_id'];
								$act_name = $row['act_name'];
								$act_description = $row['act_description'];
								$act_date = $row['act_date'];
								$act_time = $row['act_time'];

						?>
							
							<article class="blog-post">
						<!-- <div class="blog-post-image">
							<center><a href="post.php?page=baca"><img src="images/activiti.jpeg" alt=""></a></center>
						</div> -->
						<div class="blog-post-body">
							<h2><a href="post.php?page=<?php echo $act_id; ?>"><?php echo $act_name; ?></a></h2>
							<div class="post-meta"><span><i class="fa fa-clock-o"></i> <?php echo $act_date; ?></span></div>
							<p><?php echo $act_description; ?></p>
							<div class="read-more"><a href="post.php?page=<?php echo $act_id; ?>">Teruskan Membaca</a></div>
						</div>
					</article>

						<?php } ?>

				</div>
				<div class="col-md-4 sidebar-gutter">
					<?php include 'style/sidebar.php'; ?>
				</div>
			</div>
		</section>
		</div><!-- /.container -->

		<footer class="footer">
			<?php include 'style/footer.php'; ?>
		</footer>

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.bxslider.js"></script>
		<script src="js/mooz.scripts.min.js"></script>
	</body>
</html>