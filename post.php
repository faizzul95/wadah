<?php 
session_start();
require('connection.php');
$page = $_GET['page'];
$sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_id` = '$page' ") or die (mysqli_error());
$row=mysqli_fetch_array($sql);
$act_id = $row['act_id'];
$act_name = $row['act_name'];
$act_description = $row['act_description'];
$act_date = $row['act_date'];
$act_time = $row['act_time'];
?>
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
		<title>Wadah | Aktiviti</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/jquery.bxslider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
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
		<section>
			<div class="row">
				<div class="col-md-8">
					<article class="blog-post">
						<div class="blog-post-image">
							<a href="post.php?page=<?php echo $act_id; ?>"><img src="images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<h2><a href="post.php?page=<?php echo $act_id; ?>"><?php echo $act_name; ?></a></h2>
							<div class="post-meta"><span><i class="fa fa-clock-o"></i><?php echo $act_date; ?></span></div>
							<div class="blog-post-text">
								<p><?php echo $act_description; ?></p>
							</div>
						</div>
					</article>
				</div>
				<div class="col-md-4 sidebar-gutter">
					<?php include 'style/sidebar.php'; ?>
				</div>
			</div>
		</section>
		</div><!-- /.container -->

		<footer class="footer">
			<?php include 'footer.php'; ?>
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