<?php
// Turn off error reporting
	error_reporting(0);
	
	session_start(); 
	$member_ic = $_SESSION['memberIC'];
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
    }
    require('../connection.php');

    $sql = mysqli_query($myConnection,"SELECT * FROM `member` WHERE `mbr_ic` = '$member' ") or die (mysqli_error());
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
		<title>Ahli | Kemaskini Maklumat</title>
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Maklumat Peribadi</li>
				  </ol>
				</nav>
							
				<div class="container">
				<section>
							<center><img title=" " alt=" " src="img/<?php echo $row['mbr_profile_picture'];?>" height="300px" width="300px" />
								<br><br>

							<form method="post" action="controller.php"  enctype = "multipart/form-data">
									<div class="form-group">
										<input type="file" name="image_upload" class="btn btn-primary" id="" placeholder="">
									</div>
							</center>
								<div align="center">
								<h1><br>KEMASKINI MAKLUMAT PERIBADI</h1></br>

							<input name="mbr_id" type="hidden" value="<?php echo $row['mbr_id'];?>" size="50" maxlength="50">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PERIBADI</b></center></td> 
								</tr>
								<tr>
									<td>Nama :</td>
									<td><br><input name="mbr_name" value="<?php echo $row['mbr_name'];?>" type="text" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Nombor Kad Pengenalan :</td>
									<td><br><input name="mbr_ic" value="<?php echo $row['mbr_ic'];?>" type="text" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat :</td>
									<td><br><input name="mbr_address" value="<?php echo $row['mbr_address'];?>" type="text" size="50" maxlength="250" class="form-control" required></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="mbr_phone" value="<?php echo $row['mbr_phone'];?>" autocomplete="off" type="text" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control" required></td>
								</tr>
								<tr>
									<td>Email :</td>
									<td><br><input name="mbr_email" value="<?php echo $row['mbr_email'];?>" type="text" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jantina :</td>
									<td><br><select name="mbr_gender" class="form-control" required>
										<option name="">-Pilih-</option>
										<option value="Lelaki" <?php if($row['mbr_gender']=="Lelaki") echo 'selected="selected"'; ?> >Lelaki</option>
										<option value="Perempuan" <?php if($row['mbr_gender']=="Perempuan") echo 'selected="selected"'; ?> >Perempuan</option>
									</select>
									</td>
								</tr>
								<tr>
									<td>Tarikh Lahir :</td>
									<td><br><input name="mbr_dob" value="<?php echo $row['mbr_dob'];?>" type="date" size="50" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td>Cawangan :</td>
									<td> <br>
										<select name="mbr_branch" class="form-control" required>
										<option value="">- Pilih -</option>
										<option value="Kedah" <?php if($row['mbr_branch']=="Kedah") echo 'selected="selected"'; ?>>Kedah</option>
										<option value="Perlis" <?php if($row['mbr_branch']=="Perlis") echo 'selected="selected"'; ?>>Perlis</option>
										<option value="Perak" <?php if($row['mbr_branch']=="Perak") echo 'selected="selected"'; ?>>Perak</option>
										<option value="Pahang" <?php if($row['mbr_branch']=="Pahang") echo 'selected="selected"'; ?>>Pahang</option>
										<option value="Kuala Lumpur" <?php if($row['mbr_branch']=="Kuala Lumpur") echo 'selected="selected"'; ?>>Kuala Lumpur</option>
										<option value="Selangor" <?php if($row['mbr_branch']=="Selangor") echo 'selected="selected"'; ?>>Selangor</option>
										<option value="Melaka" <?php if($row['mbr_branch']=="Melaka") echo 'selected="selected"'; ?>>Melaka</option>
										<option value="Johor" <?php if($row['mbr_branch']=="Johor") echo 'selected="selected"'; ?>>Johor</option>
										<option value="Negeri Sembilan" <?php if($row['mbr_branch']=="Negeri Sembilan") echo 'selected="selected"'; ?>>Negeri Sembilan</option>
										<option value="Terengganu" <?php if($row['mbr_branch']=="Terengganu") echo 'selected="selected"'; ?>>Terengganu</option>
										<option value="Kelantan" <?php if($row['mbr_branch']=="Kelantan") echo 'selected="selected"'; ?>>Kelantan</option>
										</select>
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="update_member" value="Kemaskini" class="btn btn-primary form-control">
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