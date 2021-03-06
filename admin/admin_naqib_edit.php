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

    $id = $_GET['naqib_ic'];

    $sql = mysqli_query($myConnection,"SELECT * FROM `naqib` WHERE naqib_ic = '$id' ") or die (mysqli_error());
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
		<title>Admin | Kemaskini Naqib</title>
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
								<br><br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Naqib & Naqibah</li>
				  </ol>
				</nav>		
				<br>
				<div class="container">
				<section>
								<div align="center">
								<h1><br>KEMASKINI NAQIB / NAQIBAH</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>Nama :</td>
												<td><br><input name="naqib_name" value="<?php echo $row['naqib_name'];?>" type="text" size="50" autocomplete="off" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "60" class="form-control"></td>
											</tr>
											<tr>
												<td>No. Kad Pengenalan :</td>
												<td><br><input name="naqib_ic" value="<?php echo $row['naqib_ic'];?>" id="nokadpengenalan" autocomplete="off" oninput="ValNoAlphaIC(this)" onblur="icInformation(this)" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "12"
							                         min = "1"
							                         max = "12" class="form-control" required ></td>
											</tr>
											<tr>
												<td>Alamat :</td>
												<td><br>
							                     <textarea name="naqib_address" class="form-control" rows="5" cols="20" required><?php echo $row['naqib_address'];?></textarea>

							                 </td>
											</tr>
											<tr>
												<td>No. Telefon :</td>
												<td><br>
												<input name="naqib_phone" type="text" value="<?php echo $row['naqib_phone'];?>" size="50" autocomplete="off" onkeypress="return isNumeric(event)"
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
													<input type="radio" name="naqib_category" id="lelaki" value="Naqib" <?php if($row['naqib_category']=="Naqib") echo 'checked="checked"'; ?> > Naqib &nbsp;
													<input type="radio" name="naqib_category" id="perempuan" value="Naqibah" <?php if($row['naqib_category']=="Naqibah") echo 'checked="checked"'; ?>> Naqibah
												</td>
											</tr>
											<tr>
												<td>Email :</td>
												<td><br>
												<input name="naqib_mail" value="<?php echo $row['naqib_mail'];?>" type="email" autocomplete="off" size="50" class="form-control" required>
												</td>
											</tr>
											<tr>
												<td>Cawangan :</td>
												<td><br>
												<select name="naqib_branch" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Kedah" <?php if($row['naqib_branch']=="Kedah") echo 'selected="selected"'; ?> >Kedah</option>
														<option value="Perlis" <?php if($row['naqib_branch']=="Perlis") echo 'selected="selected"'; ?> >Perlis</option>
														<option value="Perak" <?php if($row['naqib_branch']=="Perak") echo 'selected="selected"'; ?> >Perak</option>
														<option value="Pahang" <?php if($row['naqib_branch']=="Pahang") echo 'selected="selected"'; ?> >Pahang</option>
														<option value="Kuala Lumpur" <?php if($row['naqib_branch']=="Kuala Lumpur") echo 'selected="selected"'; ?> >Kuala Lumpur</option>
														<option value="Selangor" <?php if($row['naqib_branch']=="Selangor") echo 'selected="selected"'; ?> >Selangor</option>
														<option value="Melaka" <?php if($row['naqib_branch']=="Melaka") echo 'selected="selected"'; ?> >Melaka</option>
														<option value="Johor" <?php if($row['naqib_branch']=="Johor") echo 'selected="selected"'; ?> >Johor</option>
														<option value="Negeri Sembilan" <?php if($row['naqib_branch']=="Negeri Sembilan") echo 'selected="selected"'; ?>>Negeri Sembilan</option>
														<option value="Terengganu" <?php if($row['naqib_branch']=="Terengganu") echo 'selected="selected"'; ?> >Terengganu</option>

														<option value="Kelantan" <?php if($row['naqib_branch']=="Kelantan") echo 'selected="selected"'; ?>>Kelantan</option>

														<option value="Sabah" <?php if($row['naqib_branch']=="Sabah") echo 'selected="selected"'; ?>>Sabah</option>

														<option value="Serawak" <?php if($row['naqib_branch']=="Serawak") echo 'selected="selected"'; ?>>Serawak</option>
												</select>
												</td>
											</tr>
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="kemaskini_naqib" value="Kemaskini" class="btn btn-primary form-control">
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