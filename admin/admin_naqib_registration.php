<?php 

require ('../connection.php');
session_start();

$member_ic = $_SESSION['memberIC'];

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
		<title>Admin | Daftar Naqib</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		
		<script type="text/javascript">
    		<?php include '../js/calculate_age.js';?>
			<?php include '../js/input_restriction.js';?>
    	</script>

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
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Naqib & Naqibah</li>
				  </ol>
				</nav>
								
				<br><br>
				<div class="container">
				<section>
								<div align="center">
								<h1><br>DAFTAR NAQIB / NAQIBAH</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>Nama :</td>
												<td><br><input name="naqib_name" type="text" size="50" autocomplete="off" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "60" class="form-control"></td>
											</tr>
											<tr>
												<td>No. Kad Pengenalan :</td>
												<td><br><input name="naqib_ic" id="nokadpengenalan" autocomplete="off" oninput="ValNoAlphaIC(this)" onblur="icInformation(this)" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "12"
							                         min = "1"
							                         max = "12" class="form-control" required ></td>
											</tr>
											<tr>
												<td>Alamat :</td>
												<td><br><input name="naqib_address" type="text" autocomplete="off" size="50" maxlength="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "250" class="form-control" required></td>
											</tr>
											<tr>
												<td>No. Telefon :</td>
												<td><br>
												<input name="naqib_phone" type="text" size="50" autocomplete="off" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "10"
							                         min = "1"
							                         max = "11" class="form-control" required>
												</td>
											</tr>
											<tr>
												<td>Kategori :</td>
												<td><br>
													<input type="radio" name="naqib_category" id="lelaki" value="Naqib"> Naqib &nbsp;
													<input type="radio" name="naqib_category" id="perempuan" value="Naqibah"> Naqibah
												</td>
											</tr>
											<tr>
												<td>Email :</td>
												<td><br>
												<input name="naqib_mail" type="email" autocomplete="off" size="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "40" class="form-control" required>
												</td>
											</tr>
											<tr>
												<td>Cawangan :</td>
												<td><br>
												<select name="naqib_branch" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Kedah">Kedah</option>
														<option value="Perlis">Perlis</option>
														<option value="Perak">Perak</option>
														<option value="Pahang">Pahang</option>
														<option value="Kuala Lumpur">Kuala Lumpur</option>
														<option value="Selangor">Selangor</option>
														<option value="Melaka">Melaka</option>
														<option value="Johor">Johor</option>
														<option value="Negeri Sembilan">Negeri Sembilan</option>
														<option value="Terengganu">Terengganu</option>
														<option value="Kelantan">Kelantan</option>
												</select>
												</td>
											</tr>
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="reg_naqib" value="Daftar Naqib" class="btn btn-primary form-control">
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