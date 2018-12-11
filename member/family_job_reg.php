<?php
	session_start(); 
	$member_ic = $_SESSION['memberIC'];
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
    }

    require ('../connection.php');

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
		<title>Ahli | Daftar Pekerjaan Keluarga</title>
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
				    <li class="breadcrumb-item active" aria-current="page">Daftar Pekerjaan Keluarga</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR MAKLUMAT PEKERJAAN</h1></br>

						<form action="controller.php" method="post">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PEKERJAAN KELUARGA</b></center></td> 
								</tr>
								<tr>
									<td>Nama Keluarga :</td>
									<td><br>
										<?php
                                            
                                            $query = $myConnection->query("SELECT * FROM `family` WHERE `member_ic` = '$member'");
                                            $rowCount = $query->num_rows;
                                            ?>
                                        <select name="family_ic" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['family_ic'].'">'.strtoupper($row['family_name']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada Keluarga Didaftarkan</option>';
                                          }
                                          ?>
                                      </select> 
									</td>
								</tr>
								<tr>
									<td>Nama Syarikat :</td>
									<td><br><input name="company_name" type="text" autocomplete="off" size="50" maxlength="50" class="form-control" required></td>
								</tr>
								<tr>
									<td>Alamat Syarikat :</td>
									<td><br><input name="company_address" type="text" autocomplete="off" size="50" maxlength="250" class="form-control" required></td>
								</tr>
								<tr>
									<td>No telefon :</td>
									<td><br><input name="company_phone" type="text" autocomplete="off" size="50" onkeypress="return isNumeric(event)"
				                         oninput="maxLengthCheck(this)"
				                         type = "text"
				                         maxlength = "11"
				                         min = "1"
				                         max = "11" class="form-control" required></td>
								</tr>
								<tr>
									<td>Jawatan :</td>
									<td><br><input name="company_position" type="text" autocomplete="off" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Email Syarikat :</td>
									<td><br><input name="company_email" type="email" autocomplete="off" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Tarikh Mula Bekerja :</td>
									<td><br><input name="company_start_date" autocomplete="off" type="date" size="50" class="form-control" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td>Tarikh Tamat Bekerja :</td>
									<td><br><input name="company_end_date" type="date" size="50" class="form-control" maxlength="50" >
									</td>
								</tr>
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="reg_job" value="Daftar" class="btn btn-primary form-control">
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