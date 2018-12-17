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
	
	if(isset($_GET['feeID'])) 
    {
      $feeID = $_GET['feeID'];
    }
    require('../connection.php');

    $sql = mysqli_query($myConnection,"SELECT * FROM `fees` WHERE `Fee_id` = '$feeID' ") or die (mysqli_error());
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
		<title>Admin | Kemaskini Yuran</title>
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
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="list_fee.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Kemaskini Yuran</li>
								  </ol>
								</nav>
								
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>KEMASKINI YURAN</h1></br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
										<input type="hidden" name="Fee_id" value="<?php echo $row['Fee_id'];?>">
											<tr>
												<td>Kad Pengenalan Ahli :</td>
												<td><br><input name="member_ic" value="<?php echo $row['member_ic'];?>" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "12" class="form-control" required></td>
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
												<td><br><input name="Fee_amount"  value="<?php echo $row['Fee_amount'];?>" type="text" size="50" onkeypress="return isNumeric(event)"
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
														<option value="Telah Dibayar" <?php if($row['Fee_status']=="Telah Dibayar") echo 'selected="selected"'; ?>>Telah Dibayar</option>
														<option value="Belum dibayar" <?php if($row['Fee_status']=="Belum dibayar") echo 'selected="selected"'; ?>>Belum dibayar</option>
												</select>
												</td>
											</tr>
												<td>Tarikh :</td>
												<td><br>
												<input name="Fee_date"  value="<?php echo $row['Fee_date'];?>" type="date" size="50" class="form-control" maxlength="50" required>
												</td>
											</tr>
											
											<tr>
												<td>Jenis :</td>
												<td><br>
												<select name="Fee_type" class="form-control" required>
													<option value="">- Pilih -</option>
														<option value="Yuran Ahli" <?php if($row['Fee_type']=="Yuran Ahli") echo 'selected="selected"'; ?>>Yuran Ahli</option>
														<option value="Yuran Aktiviti" <?php if($row['Fee_type']=="Yuran Aktiviti") echo 'selected="selected"'; ?>>Yuran Aktiviti</option>
												</select>
												</td>
											</tr>
										
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="update_fee" value="Kemaskini" class="btn btn-primary">
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