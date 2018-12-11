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
			<?php include '../activity/style/navigation.php'; ?>
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
						  <div align="center">
						    <p>&nbsp;</p>
                              <p>&nbsp;</p>
                              <table border="1">
                                <thead>
                                  <tr>
                                    <th width="24" scope="col"><center>
                                      No
                                    </center></th>
                                    <th width="260" scope="col"><center>
                                      Aktiviti
                                    </center></th>
                                    <th width="93" scope="col"><center>
                                      Tarikh
                                    </center></th>
                                    <th width="192" scope="col"><center>
                                      Penerangan
                                    </center></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                     

                     echo "No result found";
                $count = 1;
                 {  
                  
                  ?>
                                  <tr>
                                    <th scope="row"><center>
                                    </center></th>
                                    <td><center>
                                    </center></td>
                                    <td><center>
                                    </center></td>
                                    <td><center>
                                    </center></td>
                                  </tr>
                                  <?php
                    $count++;
                  }
                  ?>
                                </tbody>
                              </table>
                              <div align="right"></div>
                            <h1>&nbsp;</h1>
						  </div>
				  </div></article>
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