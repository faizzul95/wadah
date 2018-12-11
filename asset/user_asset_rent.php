
<?php
 	// Turn off error reporting
	error_reporting(0); 
	
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
		<title>Staf | Daftar Sewaan Aset</title>
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
			<?php include '../style/navigation.php'; ?>
            <?php include '../connection.php';?>
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span>&nbsp; <a href="user.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Sewaan Aset</li>
				  </ol>
				</nav>
								
				<br><br><br>
				<div class="container">
				<section>
            
								<div align="center">
								<h1><br>DAFTAR SEWAAN ASET</h1></br>

						<form action="controller.php" method="post">
								<?php if (isset($member)) { ?>
								<input name="member_ic" type="hidden" value="<?php echo $member;?>" size="50" maxlength="50">
							<?php } else { ?>
								<input name="family_ic" type="hidden" value="<?php echo $family;?>" size="50" maxlength="50">
							<?php } ?>
							<TABLE border="0" cellpadding="5" cellspacing="2">
								<tr>
									<td colspan="2"><center><b>MAKLUMAT ASET</b></center></td> 
								</tr>
								<tr>
									<td>Jenis Aset :</td>
									<td><?php
                                            
                                            $query = $myConnection->query("SELECT * FROM asset");
                                            $rowCount = $query->num_rows;
                                            ?>

                                      <div class="form-group">
                                        <select name="asset_id" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['asset_id'].'">'.strtoupper($row['asset_type']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada aset yang berdaftar</option>';
                                          }
                                          ?>></td>
								</tr>
								<tr>
					<td>Status Aset:</td>
					<td><br>
                    <select name="rent_availability" class="form-control" required>
						<option value="">- Status -</option>
							<option value="ya">ya</option>
							<option value="tidak">tidak</option>
					</select>
					</td>
					
				</tr>
								<tr>
									<td>Bilangan Hari Sewaan:</td>
									<td><br><select name="rent_days" class="form-control" required>
							<option value="" >- Pilih -</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3" >3</option>
							<option value="4">4</option>
                            <option value="5" >5</option>
							<option value="6">6</option>
						</select></td>
								</tr>
                                <tr>
					<td>Tarikh Mula Sewaan :</td>
					<td><br><input name="rent_startdate" type="date" size="50" class="form-control" maxlength="50"></td>
				</tr>
                <tr>
					<td>Tarikh Akhir Sewaan :</td>
					<td><br><input name="rent_finishdate" type="date" size="50" class="form-control" maxlength="50"></td>
				</tr>
				
                <tr>
					<td>Syarikat Sewaan :</td>
					<td><br><input name="asset_place" value="" type="text" size="50" class="form-control" maxlength="50"></td>
				</tr>
								
								<tr align="center">
									<td colspan="2">
										<br>
										<input type="submit" name="rent_asset" value="Daftar" class="btn btn-primary form-control">
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