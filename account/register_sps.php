<?php 

require ('../connection.php');
session_start();


 if(!isset($_SESSION['role'])) // If session is not set then redirect to home
    {
       header("Location:logout.php");  
    }
   else if($_SESSION['role'] != "admin") // if not admin redirect to home
    {
       echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Anda tidak mempunyai akses ke menu Admin.')
          window.location = 'logout.php';
          </SCRIPT>");  
    }

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

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
		<title>Admin | Daftar Penaja</title>
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
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-image">
							<a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="list_sps.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Penaja</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR PENAJA</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>ID :</td>
												<td><br><input name="Sps_id" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "12" class="form-control" required></td>
											</tr>
											<tr>
												<td>Nama :</td>
												<td><br><input name="Sps_name" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "50"
							                         min = "1"
							                         max = "50" class="form-control" required ></td>
											</tr>
											<tr>
												<td>Alamat :</td>
												<td><br><input name="Sps_add" type="text" size="50" maxlength="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "250" class="form-control" required></td>
											</tr>
											<tr>
												<td>No. Telefon :</td>
												<td><br>
												<input name="Sps_phoneNo" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "12"
							                         min = "1"
							                         max = "12" class="form-control" required>
												</td>
											</tr>
											<tr>
												<td>Emel :</td>
												<td><br>
												<input name="Sps_email" type="email" size="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "40" class="form-control" required>
												</td>	
											</tr>
											<tr>
												<td>Jenis :</td>
												<td><br>
												<select name="Sps_type" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Wang Tunai">Wang Tunai</option>
														<option value="Cek">Cek</option>
                                                        <option value="Keperluan Harian">Keperluan Harian</option>
                                                        <option value="Makanan & Minuman">Makanan & Minuman</option>
                                                        <option value="Makanan">Makanan </option>
                                                        <option value="Minuman">Minuman</option>
												</select>
												</td>
											</tr>
											</tr>
										
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="register_sps" value="Daftar" class="btn btn-primary">
												</td>
											</tr>
										</form>
								</TABLE>
											</div>
								</section>
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