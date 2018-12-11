<?php
// Turn off error reporting
	error_reporting(0);
	
	session_start(); 
	$member_ic = $_SESSION['memberIC'];
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
    }
    elseif ($_GET['family_ic']) {
     $family = $_GET['family_ic'];
    }

    require('../connection.php');
    $id = $_GET['eduID'];

    $sql = mysqli_query($myConnection,"SELECT * FROM `education_info` WHERE edu_id = '$id' ") or die (mysqli_error());
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
		<title>Ahli | Kemaskini Pendidikan</title>
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
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Pendidikan</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI PENDIDIKAN</h1></br>

						<form action="controller.php" method="post">
							<input name="edu_id" type="hidden" value="<?php echo $id;?>" size="50" maxlength="50">
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PENDIDIKAN</b></center></td> 
								</tr>
								<tr>
									<td>Nama Institusi :</td>
									<td><br><input name="edu_name" value="<?php echo $row['edu_name'];?>" type="text" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat Institusi :</td>
									<td><br><input name="edu_address" value="<?php echo $row['edu_address'];?>" type="text" size="50" maxlength="250" class="form-control" required></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="edu_phone" value="<?php echo $row['edu_phone'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control"></td>
								</tr>
								<tr>
									<td>Kursus :</td>
									<td><br><input name="edu_course" value="<?php echo $row['edu_course'];?>" type="text" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Tahap Pendidikan :</td>
									<td><br><select name="edu_level" class="form-control" required>
										<option name="">-Pilih-</option>
										<option value="PMR" <?php if($row['edu_level']=="PMR") echo 'selected="selected"'; ?> >PMR</option>
										<option value="SPM" <?php if($row['edu_level']=="SPM") echo 'selected="selected"'; ?> >SPM</option>
										<option value="Diploma" <?php if($row['edu_level']=="Diploma") echo 'selected="selected"'; ?> >Diploma</option>
										<option value="Ijazah" <?php if($row['edu_level']=="Ijazah") echo 'selected="selected"'; ?> >Ijazah</option>
										<option value="Master" <?php if($row['edu_level']=="Master") echo 'selected="selected"'; ?> >Master</option>
										<option value="PhD" <?php if($row['edu_level']=="PhD") echo 'selected="selected"'; ?> >PhD</option>
									</select>
									</td>
								</tr>
								<tr>
									<td>Tarikh Mula Belajar :</td>
									<td><br><input name="edu_start_date" value="<?php echo $row['edu_start_date'];?>" type="date" size="50" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td>Tarikh Tamat Belajar :</td>
									<td><br><input name="edu_end_date" value="<?php echo $row['edu_end_date'];?>" type="date" size="50" class="form-control" maxlength="50">
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="update_edu" value="Kemaskini" class="btn btn-primary form-control">
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