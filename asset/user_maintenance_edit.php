<?php
	// Turn off error reporting
	// error_reporting(0);
	
	session_start();

	if(!isset($_SESSION['userID'])) // If session is not set then redirect to home
    {
       header("Location:../logout.php");  
    }

    require('../connection.php');
    $id = $_GET['asset_id'];

    $sql = mysqli_query($myConnection,"SELECT * FROM `maintenance` WHERE `maintenance_id` = '$id' ") or die (mysqli_error());
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
		<title>Staf | Kemaskini Penyelenggaraan</title>
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
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Kemaskini Penyelenggaraan</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>
								KEMASKINI PENYELENGGARAAN</h1></br>

						<form action="controller.php" method="post">

							<input name="maintenance_id" type="hidden" value="<?php echo $row['maintenance_id'];?>" size="50" maxlength="50">
								
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT PENYELENGGARAAN</b></center></td> 
								</tr>
								<tr>
									<td>Nama Penyelenggara: <br></td>
									<td><br>
                                      <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM vendor");
                                            $rowCount = $query->num_rows;
                                            ?>

                                        <select name="vendor_id" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['vendor_id'].'">'.strtoupper($row['vendor_name']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada Vendor yang berdaftar</option>';
                                          }
                                     ?>
                                      </select> 
                                      
                    				</td>
								</tr>
								<tr>
					<td>Tahap penyelenggaraan:</td>
					<td> <br>
					<select name="maintenance_status" class="form-control" required>
						<option value="Pilih">Pilih</option>
							<option value="100%">100%</option>
							<option value="80%">80%</option>
                          							<option value="60%">60%</option>
                                                    
                            							<option value="40%">40%</option>
                                                        							<option value="20%">20%</option>

					</select>
					</td>
				</tr>
								<tr>
									<td>Kos Penyelenggaraan:</td>
									<td><br><input name="maintenance_cost" type="text" size="50" class="form-control" maxlength="50"></td>
								</tr>
								<tr>
									<td>Tempat Penyelenggaraan :</td>
					<td><br> 
                                      <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM asset");
                                            $rowCount = $query->num_rows;
                                            ?>

                                      <div class="form-group">
                                        <select name="asset_id" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['asset_id'].'">'.strtoupper($row['asset_place']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada tempat yang berdaftar</option>';
                                          }
                                          ?>
                                      </select> </td>
								</tr>
								<tr>
									<td>Tempoh Hari Penyelenggaraan :</td>
					<td>
						<select name="maintenance_days" class="form-control" required>
							<option value="" >Pilih</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3" >3</option>
							<option value="4">4</option>
                            <option value="5" >5</option>
							<option value="6">6</option>
						</select>
					</td>
                    <tr>
                    <td>Penerangan Penyelenggaraan:</td>
					<td><br><input name="maintenance_desc" type="text"  value="" size="50" maxlength="50" class="form-control" required>
					</td>
								</tr>
								
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="update_maintenance" value="Kemaskini" class="btn btn-primary form-control">
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





