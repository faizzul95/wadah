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
$id = $_GET['act_id'];
$sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `act_id` = '$id' ") or die (mysqli_error());
$row=mysqli_fetch_array($sql);

$act_name = $row['act_name'];
$act_description = $row['act_description'];
$act_date = $row['act_date'];
$act_category = $row['act_category'];
$act_type = $row['act_type'];
$act_fee = $row['act_fee'];
$naqib_ic = $row['naqib_ic'];
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
		<title>Admin | Kemaskini Aktiviti Ahli</title>
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
			<?php include '../activity/style/navigation.php'; ?>
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
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Aktiviti Ahli</li>
				  </ol>
				</nav>

				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>
								KEMASKINI AKTIVITI AHLI</h1>
								</br>

								<TABLE border="0" cellpadding="5" cellspacing="2">
									<form method="post" action="controller.php">
										<input type="hidden" name="act_id" value="<?php echo $row['act_id']; ?>">
											<tr>
												<td>Aktiviti:</td>
											  <td><select name="act_type" class="form-control" required>
											    <option value="">- Jenis Aktiviti -</option>
											    <option valuea="Muktamar" <?php if($row['act_type']=="Muktamar") echo 'selected="selected"'; ?>>Muktamar</option>
											    <option value="Tamrin" <?php if($row['act_type']=="Tamrin") echo 'selected="selected"'; ?>>Tamrin</option>
											    <option value="Usrah" <?php if($row['act_type']=="Usrah") echo 'selected="selected"'; ?>>Usrah</option>
											    <option value="Rehleh" <?php if($row['act_type']=="Rehleh") echo 'selected="selected"'; ?>>Rehleh</option>
											    </select>
											</td>
											</tr>
											<tr>
												<td>Topik :</td>
												<td><br><input name="act_name" value="<?php echo $row['act_name']; ?>" type="text" autocomplete="off"  oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "250" class="form-control" required></td>
											</tr>

											<tr>
												<td>Penerangan :</td>
												<td><br>
													<textarea name="act_description" class="form-control" rows="5" cols="20" required maxlength="250"> <?php echo $row['act_description']; ?> </textarea></td>
											</tr>
											<tr>
												<td>Tempat :</td>
												<td><br>
												<input name="act_venue" type="text" value="<?php echo $row['act_venue']; ?>" size="50" autocomplete="off" 
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "100"
							                         min = "1"
							                         max = "100" class="form-control" required>
												</td>
											</tr>
                                            
											<tr>
												<td>Tarikh:</td>
												<td><br><input name="act_date" value="<?php echo $row['act_date']; ?>" type="date" maxlength = "11" size="50" autocomplete="off" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "60" class="form-control"></td>
											</tr>

											<tr>
												<td>Masa:</td>
												<td><br> <input name="act_time" value="<?php echo $row['act_time']; ?>" type="time" maxlength = "11" size="50" autocomplete="off" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "60" class="form-control"></td>
											</tr>

											<tr>
												<td>Yuran Aktiviti:</td>
												<td><br> <input name="act_fee" value="<?php echo $row['act_fee']; ?>" type="number" maxlength = "4" size="50" autocomplete="off" required oninput="maxLengthCheck(this)"
							                     type = "text"
							                     maxlength = "60" class="form-control">
							                 	</td>
											</tr>

											<tr>
												<td>Nama Naqib/Naqibah:</td>
												<td><br>
											<select name="naqib_ic" id="" class="form-control" required>
							                 <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM naqib");
                                            $rowCount = $query->num_rows;
                                            ?>
		                                        <option value="">- Sila Pilih -</option>
		                                          <?php
		                                          if($rowCount > 0){
		                                              while($row = $query->fetch_assoc()){ 
		                                                  echo '<option value="'.$row['naqib_ic'].'">'.strtoupper($row['naqib_name']).'</option>';
		                                              }
		                                          }else{
		                                              echo '<option value="">Tiada Naqib/Naqibah berdaftar</option>';
		                                          }
		                                     ?>
		                                      

							                 	</td>
											</tr>
											
											
											<tr align="center">
												<td colspan="2"> <br>
													<input type="submit" name="update_aktiviti_ahli" value="Kemaskini" class="btn btn-primary form-control">
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
	
</body>
</html>