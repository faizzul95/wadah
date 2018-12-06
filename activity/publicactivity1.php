<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../favicon.ico">
		<title>Wadah | Aktiviti</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../style/navigation.php'; ?>
		</nav>

		<div class="container">
		<header>
			<a href="../index.php"><img src="../images/logo.jpg" width="50%" height="50%"></a>
		</header>
		<section>
			<div class="row">
				<div class="col-md-8">
					<article class="blog-post">
						<div class="blog-post-image">
							<a href="../post.html"><img src="../images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<h2>Aktiviti Masyarakat</h2>
							<p>&nbsp;</p>
							<p>Pendaftaran </p>
							<form name="form1" method="post" action="">
							  <div align="left">
							    <p>&nbsp;</p>
							    <p>Masyarakat ID							    			
							      <input type="text" name="masyarakat_id" id="public_id">
							    </p>
							    <p>Nama
							      <input type="text" name="nama" id="public_name">
							    </p>
							    <p>Aktviti 
                                  <select name="type" required>
                                    <option value="">- Jenis Aktiviti -</option>
                                    <option valuea="Muktamar">Muktamar</option>
                                    <option value="Tamrin">Tamrin</option>
                                    <option value="Usrah">Usrah</option>
                                    <option value="Rehleh">Rehleh</option>
                                    <
                                  </select>
                                </p>
							    <p>No. Telefon 
                                  <input type="text" name="telefon" id="public_phone">
                                </p>
							    <p>Tarikh Aktiviti Berlangsung
							      <input id="event_date" type="date" value="2011-01-13"/></p>
							    <p>Tempat 
							      <input type="text" name="event_venue" id="event_venue">
							    </p>
							    <p>&nbsp;</p>
							  </div>
					      </form>
							<p>&nbsp;</p>
							<p>
							  <input type="submit" name="Button" id="Button" value="Set Semula">
							  <input type="submit" name="Button2" id="Button2" value="Hantar">
							</p>
							<div class="post-meta"><span><i class="fa fa-clock-o"></i></span></div>
							<div class="blog-post-text"></div>
					      <form name="form2" method="post" action="">
					      </form>
						</div>
					</article>
				</div>
				<div class="col-md-4 sidebar-gutter"></div>
			</div>
			</div>
		</section>
		</div><!-- /.container -->

		<footer class="footer">
			<?php include '../footer.php'; ?>
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