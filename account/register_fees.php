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
		<title>Admin | Daftar Yuran</title>
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp;<a href="list_fee.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Yuran</li>
				  </ol>
				</nav>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR YURAN</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
											<tr>
												<td>No Kad Pengenalan :</td>
												<td><br><input name="member_ic" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "12" class="form-control"></td>
											</tr>
											<tr>
												<td>Nama Aktiviti :</td>
												<td><br>
													<select name="act_id" id="" class="form-control"><?php
                                            
			                                            $query = $myConnection->query("SELECT * FROM activity");
			                                            $rowCount = $query->num_rows;
			                                            ?>
					                                        <option value="">- Sila Pilih -</option>
					                                          <?php
					                                          if($rowCount > 0){
					                                              while($row = $query->fetch_assoc()){ 
					                                                  echo '<option value="'.$row['act_id'].'">'.strtoupper($row['act_name']).'</option>';
					                                              }
					                                          }else{
					                                              echo '<option value="">Tiada aktiviti berdaftar</option>';
					                                          }
					                                     ?>
					                            </td>
											</tr>

											<tr>
												<td>Jumlah :</td>
												<td><br><input name="Fee_amount" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "50"
							                         min = "1"
							                         max = "50" class="form-control" required ></td>
											</tr>

											<tr>
												<td>Status :</td>
												<td><br>
												<select name="Fee_status" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Telah Dibayar">Telah Dibayar</option>
														<option value="Belum dibayar">Belum dibayar</option>
												</select>
												</td>
											</tr>
											<tr>
												<td>Tarikh :</td>
												<td><br>
												<input name="Fee_date" type="date" size="50" class="form-control" maxlength="50" required>
												</td>
											</tr>
							
											<tr>
												<td>Jenis :</td>
												<td><br><select name="Fee_type" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Yuran Ahli">Yuran Ahli</option>
														<option value="Yuran Aktiviti">Yuran Aktiviti</option>
												</select>
											</tr>
											</tr>
										
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="register_fees" value="Daftar" class="btn btn-primary form-control">
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