<?php
	// Turn off error reporting
	// error_reporting(0);
	
	session_start();

	if(!isset($_SESSION['UserID'])) // If session is not set then redirect to home
    {
       header("Location:../logout.php");  
    }

    require('../connection.php');
    $id = $_GET['famIC'];

    $sql = mysqli_query($myConnection,"SELECT * FROM `family` WHERE `family_ic` = '$id' ") or die (mysqli_error());
    $row=mysqli_fetch_array($sql);

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
		<title>Ahli | Kemaskini Keluarga</title>
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
						<div class="blog-post-image">
							<a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Keluarga</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI KELUARGA</h1></br>

						<form action="controller.php" method="post">

							<input name="family_ic" type="hidden" value="<?php echo $row['family_ic'];?>" size="50" maxlength="50">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT KELUARGA</b></center></td> 
								</tr>
								<tr>
									<td>Nama  :</td>
									<td><br><input name="family_name" type="text" value="<?php echo $row['family_name'];?>" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Nombor IC  :</td>
									<td><br><input name="new_family_ic" type="text" value="<?php echo $row['family_ic'];?>" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat :</td>
									<td><br><input name="family_address" type="text" value="<?php echo $row['family_address'];?>" size="50" class="form-control" maxlength="250"></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="family_phone" type="text" value="<?php echo $row['family_phone'];?>" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jantina :</td>
									<td><br>
										<select name="family_gender" class="form-control">
											<option value="" >- Pilih -</option>
											<option value="Lelaki" <?php if($row['family_gender']=="Lelaki") echo 'selected="selected"'; ?> >Lelaki</option>
										<option value="Perempuan" <?php if($row['family_gender']=="Perempuan") echo 'selected="selected"'; ?> >Perempuan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Email :</td>
									<td><br><input name="family_email" type="text" value="<?php echo $row['family_email'];?>" size="50" class="form-control" maxlength="80"></td>
								</tr>
								<tr>
									<td>Tarikh Lahir : <br></td>
									<td><br><input name="family_dob" type="date" size="50" value="<?php echo $row['family_dob'];?>" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td><br>
										Hubungan Keluarga : 
									</td>
									<td><br>
										<select name="family_relation" class="form-control" required>
											<option value="" >- Pilih -</option>
											<option value="Ayah" <?php if($row['family_relation']=="Ayah") echo 'selected="selected"'; ?> >Ayah</option>
											<option value="Ibu" <?php if($row['family_relation']=="Ibu") echo 'selected="selected"'; ?> >Ibu</option>
											<option value="Anak Lelaki" <?php if($row['family_relation']=="Anak Lelaki") echo 'selected="selected"'; ?> >Anak Lelaki</option>
											<option value="Anak Perempuan" <?php if($row['family_relation']=="Anak Perempuan") echo 'selected="selected"'; ?> >Anak Perempuan</option>
											<option value="Suami" <?php if($row['family_relation']=="Suami") echo 'selected="selected"'; ?> >Suami</option>
											<option value="Isteri" <?php if($row['family_relation']=="Isteri") echo 'selected="selected"'; ?> >Isteri</option>
											<option value="Adik Beradik" <?php if($row['family_relation']=="Adik Beradik") echo 'selected="selected"'; ?> >Adik Beradik</option>

										</select>
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="update_family" value="Kemaskini" class="btn btn-primary form-control">
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