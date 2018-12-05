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
		<title>Wadah | Log Masuk</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/jquery.bxslider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<style type="text/css">
				.progress-bar {
				    color: #333;
				} 

				* {
				    -webkit-box-sizing: border-box;
					   -moz-box-sizing: border-box;
					        box-sizing: border-box;
					outline: none;
				}

			    .form-control {
				  position: relative;
				  font-size: 16px;
				  height: auto;
				  padding: 10px;
					@include box-sizing(border-box);

					&:focus {
					  z-index: 2;
					}
				}


				.login-form {
					margin-top: 10px;
				}

				form[role=login] {
					color: #5d5d5d;
					background: #f2f2f2;
					padding: 26px;
					border-radius: 10px;
					-moz-border-radius: 10px;
					-webkit-border-radius: 10px;
				}
					form[role=login] img {
						display: block;
						margin: 0 auto;
						margin-bottom: 35px;
					}
					form[role=login] input,
					form[role=login] button {
						font-size: 18px;
						margin: 16px 0;
					}
					form[role=login] > div {
						text-align: center;
					}
					
				.form-links {
					text-align: center;
					margin-top: 1em;
					margin-bottom: 50px;
				}
					.form-links a {
						color: #fff;
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
			<a href="index.php"><img src="images/fulllogo.png" width="50%" height="50%"></a>
		</header>
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<h2><a href="">Log Masuk</a></h2>
								<div class="row" id="pwd-container">
								    <div class="col-md-4"></div>
								    
								    <div class="col-md-4">
								      <section class="login-form">
								        <form method="post" action="controller.php" role="login">
								          <input type="text" name="usr_username" placeholder="NRIC : 880808025588 (contoh)" required class="form-control input-lg" required autocomplete="off" maxlength="13" />
								          <input type="password" name="usr_password" class="form-control input-lg" id="password" placeholder="Kata Laluan" required autocomplete="off" maxlength="13" />
								          <input type="submit" name="login" value="Log Masuk" class="btn btn-lg btn-primary btn-block">
								        </form>
								      </section>  
								      </div>
								      <div class="col-md-4"></div>
								  </div>
						</div>
					</article>
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