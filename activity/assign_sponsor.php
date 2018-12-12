<?php
 	// Turn off error reporting
	require ('../connection.php');
	session_start(); 
    if(isset($_SESSION['role'] )!= "admin") // if not admin redirect to home
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
		<title>Admin | Daftar Sponsor Aktiviti</title>
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
			<?php include '../asset/style/navigation.php'; ?>
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span>&nbsp; <a href="list_activity.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Penaja Aktiviti</li>
				  </ol>
				</nav>
								
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR PENAJA AKTIVITI</h1></br>

						<form action="controller.php" method="post">
						
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PENAJA AKTIVITI</b></center></td> 
								</tr>
								<tr>
									<td>Nama Penaja: <br></td>
									<td><br>
                                      <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM sponsors");
                                            $rowCount = $query->num_rows;
                                            ?>

                                        <select name="sponsor_id" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['Sps_id'].'">'.strtoupper($row['Sps_name']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada Penaja yang berdaftar</option>';
                                          }
                                     ?>
                                      </select> 
                                      
                    				</td>
								</tr>
								
								<tr>
									<td>Nama Aktiviti :</td>
					<td><br> 
                                      <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM activity");
                                            $rowCount = $query->num_rows;
                                            ?>

                                        <select name="act_id" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['act_id'].'">'.strtoupper($row['act_name']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada aktiviti yang berdaftar</option>';
                                          }
                                          ?>
                                      </select> </td>
								</tr>
								<tr>
									<td>Jumlah Tajaan :</td>
									<td>
										<br><input name="sponsor_amount" autocomplete="off" oninput="ValNoAlphaIC(this)" onblur="icInformation(this)" type="text" size="50" onkeypress="return isNumeric(event)"
							                         oninput="maxLengthCheck(this)"
							                         type = "text"
							                         maxlength = "6"
							                         min = "1"
							                         max = "6" class="form-control" required >	
									</td>
				                    <tr>
					                    <td>Penerangan Tajaan:</td>
										<td><br><input name="sps_description" type="text"  value="" size="50" maxlength="150" class="form-control" required>
										</td>
									</tr>
								
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="assign_sponsor" value="Daftar" class="btn btn-primary form-control">
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