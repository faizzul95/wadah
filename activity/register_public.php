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
							<h2>DAFTAR MASYARAKAT</h2>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<form name="form1" method="post" action="">
							  <div align="left">
							    <TABLE border="1" cellpadding="5" cellspacing="2">
							      <tr>
							        <td colspan="2"><center>
							          <b>MASYARAKAT</b>
							          </center></td>
						          </tr>
							      <tr>
							        <td width="74">Masyarakat ID:</td>
							        <td width="355"><input name="public_id" type="text" size="50" maxlength="50" required></td>
						          </tr>
							      <tr>
							        <td>Nama  :</td>
							        <td><input name="public_name" type="text" size="50" maxlength="50" required></td>
						          </tr>
							      <tr>
							        <td>Aktiviti</td>
							        <td><select name="act_type" required>
							          <option value="">- Jenis Aktiviti -</option>
							          <option valuea="Muktamar">Muktamar</option>
							          <option value="Tamrin">Tamrin</option>
							          <option value="Usrah">Usrah</option>
							          <option value="Rehleh">Rehleh</option>
							          <
						            </select></td>
						          </tr>
							      <tr>
							        <td>No. Telefon  :</td>
							        <td><input name="public_phone_phone" type="text" size="50" maxlength="50" required></td>
						          <tr>
							          <td>Tarikh:</td>
							          <td><input id="act_date" type="date" value="2011-01-13"/></td>
						          </tr>
                                   <tr>
							          <td>Tempat:</td>
							          <td><input name="act_venue" type="email" size="50" maxlength="50"></td>
						          </tr>
							      <tr align="center">
							        <td colspan="2"><input type="submit" name="register_public_output" value="DAFTAR" class="btn btn-info"></td>
						          </tr>
						        </TABLE>
							    <div align="center"></div>
							    <p>&nbsp;</p>
							  </div>
					      </form>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
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