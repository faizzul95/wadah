<?php
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
    $id = $_GET['jobID'];

    $sql = mysqli_query($myConnection,"SELECT * FROM `occupation_info` WHERE occupation_id = '$id' ") or die (mysqli_error());
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
		<title>Ahli | Kemaskini Pekerjaan</title>
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
						occupation_registration
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Pekerjaan</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI PEKERJAAN</h1></br>

						<form action="controller.php" method="post">
							<input name="occupation_id" type="hidden" value="<?php echo $row['occupation_id'];?>" size="50" maxlength="50">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PEKERJAAN</b></center></td> 
								</tr>
								<tr>
									<td>Nama Syarikat :</td>
									<td><br><input name="company_name" value="<?php echo $row['company_name'];?>" type="text" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat Syarikat :</td>
									<td><br><input name="company_address" value="<?php echo $row['company_address'];?>" type="text" size="50" maxlength="250" class="form-control" required></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="company_phone" value="<?php echo $row['company_phone'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "12"
				                         min = "1"
				                         max = "12" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jawatan :</td>
									<td><br><input name="company_position" value="<?php echo $row['company_position'];?>" type="text" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Email Syarikat :</td>
									<td><br><input name="company_email" value="<?php echo $row['company_email'];?>" type="text" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Tarikh Mula Bekerja :</td>
									<td><br><input name="company_start_date" value="<?php echo $row['company_start_date'];?>" type="date" size="50" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td>Tarikh Tamat Bekerja :</td>
									<td><br><input name="company_end_date" type="date" size="50" class="form-control" maxlength="50">
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="update_job" value="Kemaskini" class="btn btn-primary form-control">
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