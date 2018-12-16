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
	
	if(isset($_GET['spsID'])) 
    {
      $spsID = $_GET['spsID'];
    }
    require('../connection.php');

    $sql = mysqli_query($myConnection,"SELECT * FROM `sponsors` WHERE `Sps_id` = '$spsID' ") or die (mysqli_error());
    $row=mysqli_fetch_array($sql);

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
		<title>Admin | Kemaskini Penaja</title>
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
			<?php include '../account/style/navigation.php'; ?>
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp;<a href="list_sps.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Penaja</li>
				  </ol>
				</nav>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI PENAJA</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>ID :</td>
												<td><br><input name="Sps_id"  value="<?php echo $row['Sps_id'];?>" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "12" class="form-control" required></td>
											</tr>
											<tr>
												<td>Nama :</td>
												<td><br><input name="Sps_name"  value="<?php echo $row['Sps_name'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "50"
							                         min = "1"
							                         max = "50" class="form-control" required ></td>
											</tr>
											<tr>
												<td>Alamat :</td>
												<td><br><input name="Sps_add" value="<?php echo $row['Sps_add'];?>"  type="text" size="50" maxlength="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "250" class="form-control" required></td>
											</tr>
											<tr>
												<td>No. Telefon :</td>
												<td><br>
												<input name="Sps_phoneNo"  value="<?php echo $row['Sps_phoneNo'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
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
												<input name="Sps_email"  value="<?php echo $row['Sps_email'];?>" type="email" size="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "40" class="form-control" required>
												</td>	
											</tr>
											<tr>
												<td>Jenis :</td>
												<td><br>
												<select name="Sps_type" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Wang Tunai" <?php if($row['Sps_type']=="Wang Tunai") echo 'selected="selected"'; ?> >Wang Tunai</option>
														<option value="Cek" <?php if($row['Sps_type']=="Cek") echo 'selected="selected"'; ?> >Cek</option>
                                                        <option value="Keperluan Harian" <?php if($row['Sps_type']=="Keperluan Harian") echo 'selected="selected"'; ?> >Keperluan Harian</option>
                                                        <option value="Makanan & Minuman" <?php if($row['Sps_type']=="Makanan & Minuman") echo 'selected="selected"'; ?> >Makanan & Minuman</option>
                                                        <option value="Makanan" <?php if($row['Sps_type']=="Makanan") echo 'selected="selected"'; ?> >Makanan </option>
                                                        <option value="Minuman" <?php if($row['Sps_type']=="Minuman") echo 'selected="selected"'; ?> >Minuman</option>
												</select>
												</td>
											</tr>
											</tr>
										
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="update_sps" value="Kemaskini" class="btn btn-primary form-control">
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