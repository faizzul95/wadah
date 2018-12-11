<?php 

require ('../connection.php');
session_start();

$member_ic = $_SESSION['memberIC'];

 if(!isset($_SESSION['role'])) // If session is not set then redirect to home
    {
       header("Location:logout.php");  
    }
    if(isset($_SESSION['role']) != "admin") // if not admin redirect to home
    {
       echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Anda tidak mempunyai akses ke menu Admin.')
          window.location = 'logout.php';
          </SCRIPT>");  
    }

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
		<title>Admin | Menu</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
			<!-- Font Awesome -->
	  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins
	       folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">
	  <!-- Morris chart -->
	  <link rel="stylesheet" href="../admin/bower_components/morris.js/morris.css">
	  <!-- jvectormap -->
	  <link rel="stylesheet" href="../admin/bower_components/jvectormap/jquery-jvectormap.css">
	  <!-- Date Picker -->
	  <link rel="stylesheet" href="../admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="../admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	  <!-- bootstrap wysihtml5 - text editor -->
	  <link rel="stylesheet" href="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../admin/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-image">
							<a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<div class="blog-post-text">
								
								<br><br><br>
								<div class="container">

									  <!-- Main content -->
								    <section class="content">
								      <!-- Small boxes (Stat box) -->
								      <div class="row">
								        <div class="col-lg-3 col-xs-6">
								          <!-- small box -->
								          <div class="small-box bg-aqua">
								            <div class="inner">
								              <h3><?php 
                                          	$countmember = mysqli_query($myConnection,"SELECT * FROM member") or die (mysqli_error($myConnection));
                                            $count=mysqli_num_rows($countmember);
                                            echo $count;
                                            ?></h3>

								              <p>Ahli</p>
								            </div>
								            <div class="icon">
								              <i class="ion ion-person-add"></i>
								            </div>
								            <a href="list_member.php" class="small-box-footer">Baca Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
								          </div>
								        </div>
								        <!-- ./col -->
								        <div class="col-lg-3 col-xs-6">
								          <!-- small box -->
								          <div class="small-box bg-green">
								            <div class="inner">
								              <h3>53<sup style="font-size: 20px">%</sup></h3>

								              <p>Kewangan</p>
								            </div>
								            <div class="icon">
								              <i class="ion ion-stats-bars"></i>
								            </div>
								            <a href="#" class="small-box-footer">Baca Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
								          </div>
								        </div>
								        <!-- ./col -->
								        <div class="col-lg-3 col-xs-6">
								          <!-- small box -->
								          <div class="small-box bg-yellow">
								            <div class="inner">
								              <h3><?php 
                                          	$countmember = mysqli_query($myConnection,"SELECT * FROM activity WHERE `act_category` = 'Awam'") or die (mysqli_error($myConnection));
                                            $count=mysqli_num_rows($countmember);
                                            echo $count;
                                            ?></h3>

								              <p>Aktiviti Awam</p>
								            </div>
								            <div class="icon">
								              <i class="ion ion-person-add"></i>
								            </div>
								            <a href="../activity/list_activity.php" class="small-box-footer">Baca Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
								          </div>
								        </div>
								        <!-- ./col -->
								        <div class="col-lg-3 col-xs-6">
								          <!-- small box -->
								          <div class="small-box bg-red">
								            <div class="inner">
								              <h3><?php 
                                          	$countmember = mysqli_query($myConnection,"SELECT * FROM activity WHERE `act_category` = 'Ahli'") or die (mysqli_error($myConnection));
                                            $count=mysqli_num_rows($countmember);
                                            echo $count;
                                            ?></h3>

								              <p>Aktiviti Ahli</p>
								            </div>
								            <div class="icon">
								              <i class="ion ion-pie-graph"></i>
								            </div>
								            <a href="../activity/list_activity.php" class="small-box-footer">Baca Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
								          </div>
								        </div>
								        <!-- ./col -->
								      </div>

								      </div>
								      <!-- /.row (main row) -->

								    </section>
								    <!-- /.content -->
								
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</section>
		</div><!-- /.container -->

		<footer class="footer">
			<?php include '../style/footer.php'; ?>
		</footer>

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.bxslider.js"></script>
		<script src="../js/mooz.scripts.min.js"></script>
	</body>
</html>