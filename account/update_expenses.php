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
	
	if(isset($_GET['expID'])) 
    {
      $expID = $_GET['expID'];
    }
    require('../connection.php');

    $sql = mysqli_query($myConnection,"SELECT * FROM `expenses` WHERE `Exp_id` = '$expID' ") or die (mysqli_error());
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
		<title>Admin | Kemaskini Pembelanjaan</title>
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
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="list_exp.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Pembelanjaan</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI PEMBELANJAAN</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>Nama :</td>
												<td><br><input name="Exp_name" value="<?php echo $row['Exp_name'];?>" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "12" class="form-control"</td>
											</tr>
											<tr>
												<td>Tarikh :</td>
												<td><br><input name="Exp_date"  value="<?php echo $row['Exp_date'];?>" type="text" size="50" class="form-control" maxlength="50" required></td>
											</tr>
												<tr>
												<td>Jenis :</td>
												<td><br>
												<select name="Exp_type" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Sewaan">Sewaan</option>
														<option value="Pembelian">Pembelian</option>
												</select>
												</td>
											</tr>
											<tr>
												<td>Baki :</td>
												<td><br>
												<input name="Exp_outstanding"  value="<?php echo $row['Exp_outstanding'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "12"
							                         min = "1"
							                         max = "12" class="form-control" required>
												</td>
											</tr>
											
											<tr>
												<td>Penerangan :</td>
												<td><br><input name="Exp_desc" value="<?php echo $row['Exp_desc'];?>" type="text" size="50" maxlength="50" oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "250" class="form-control" required></td>
											</tr>
											</tr>
										
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="update_exp" value="Kemaskini" class="btn btn-primary">
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