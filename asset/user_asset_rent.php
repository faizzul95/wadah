
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
				    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span>&nbsp; <a href="user.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Daftar Sewaan Aset</li>
				  </ol>
				</nav>
							
				<div class="container">
				<section>
					<div align="center">
								<h1><br>DAFTAR SEWAAN ASET</h1></br>

						<form action="controller.php" method="post">
						  <TABLE border="0" cellpadding="5" cellspacing="2">
						  <tr>
						  <td><table border="0" cellpadding="5" cellspacing="2">
						    <tr>
						      <td colspan="2"><center>
						        <b>MAKLUMAT ASET</b>
						        </center></td>
						      </tr>
						    <tr>
						      <td>Jenis Aset :</td>
						      <td><br>
						        <?php
                                            $sql = $myConnection->query("SELECT * FROM asset");
                                            $rowCount = $sql->num_rows;
                                            ?>
						        <select name="asset_id" id="asset_id" class="form-control" required>
						          <option value="">- Sila Pilih -</option>
						          <?php
                                          if($rowCount > 0){
                                              while($row = $sql->fetch_assoc()){ 
                                                  echo '<option value="'.$row['asset_id'].'">'.strtoupper($row['asset_type']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada aset yang berdaftar</option>';
                                          }
                                          ?>
						          </select></td>
						      </tr>
						    <tr>
						      <td>Tarikh Mula Sewaan :</td>
						      <td><br>
						        <input name="rent_startdate" type="date" size="50" class="form-control" maxlength="50"></td>
						      </tr>
						    <tr>
						      <td>Tarikh Pulangan Aset :</td>
						      <td><br>
						        <input name="rent_finishdate" type="date" size="50" class="form-control" maxlength="50"></td>
						      </tr>
						    <tr>
						      <td>Syarikat Sewaan :</td>
						      <td><br>
						        <input name="rent_companyname" value="" type="text" size="50" class="form-control" maxlength="50"></td>
						      </tr>
                              <tr>
									<td>Kuantiti Sewaan Aset:</td>
									<td><br><select name="rent_quantity" class="form-control" required>
							<option value="" >- Pilih -</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3" >3</option>
							<option value="4">4</option>
                            <option value="5" >5</option>
							<option value="6">6</option>
						</select></td>
								</tr>
						    <tr align="center">
						      <td colspan="2"><br>
						        <input type="submit" name="rent_asset" value="Daftar" class="btn btn-primary form-control"></td>
						      </tr>
						    </table></td>
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