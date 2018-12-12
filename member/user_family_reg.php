<?php
	// Turn off error reporting
	error_reporting(0);
	
	session_start();

	if(!isset($_SESSION['UserID'])) // If session is not set then redirect to home
    {
       header("Location:../logout.php");  
    }

	$member_ic = $_SESSION['memberIC'];
	
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
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
		<title>Ahli | Daftar Keluarga</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script type="text/javascript">
			<?php include '../js/input_restriction.js';?>
		</script>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../member/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						occupation_registration
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Keluarga</li>
				  </ol>
				</nav>
				
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR MAKLUMAT KELUARGA</h1></br>

						<form action="controller.php" method="post">

							<input name="member_ic" type="hidden" value="<?php echo $member;?>" size="50" maxlength="50">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT KELUARGA</b></center></td> 
								</tr>
								<tr>
									<td>Nama  :</td>
									<td><br><input name="family_name" type="text" autocomplete="off" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>No Kad Pengenalan  :</td>
									<td><br><input name="family_ic" type="text" autocomplete="off" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat :</td>
									<td><br><input name="family_address" type="text" autocomplete="off" size="50" class="form-control" maxlength="250"></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="family_phone" type="text" autocomplete="off" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "11"
				                         min = "1"
				                         max = "11" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jantina :</td>
									<td><br>
										<input type="radio" name="family_gender" value="Lelaki"> Lelaki &nbsp;
										<input type="radio" name="family_gender" value="Perempuan"> Perempuan
									</td>
								</tr>
								<tr>
									<td>Email :</td>
									<td><br><input name="family_email" type="text" size="50" autocomplete="off" class="form-control" maxlength="80"></td>
								</tr>
								<tr>
									<td>Tarikh Lahir : <br></td>
									<td><br><input name="family_dob" type="date" size="50" autocomplete="off" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td><br>
										Hubungan Keluarga : 
									</td>
									<td><br>
										<select name="family_relation" class="form-control" required>
											<option value="" >- Pilih -</option>
											<option value="Ayah" >Ayah</option>
											<option value="Ibu">Ibu</option>
											<option value="Anak Lelaki" >Anak Lelaki</option>
											<option value="Anak Perempuan">Anak Perempuan</option>
				                            <option value="Suami" >Suami</option>
											<option value="Isteri">Isteri</option>
											<option value="Adik Beradik">Adik Beradik</option>
										</select>
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="reg_family" value="Daftar" class="btn btn-primary form-control">
									</td>
								</tr>
							</TABLE>
						</form>
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