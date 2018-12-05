<?php
  // Turn off error reporting
	error_reporting(0);

  require ('../connection.php');
  session_start(); 
  $member_ic = $_SESSION['memberIC'];

 $result = $myConnection->query("SELECT * FROM `member` WHERE `mbr_ic` = '$member_ic'"); 
 $row = $result->fetch_assoc();
 $mmbrName = $row['mbr_name'];
 $mmbrIC = $row['mbr_ic'];
 $profileimage = $row['mbr_profile_picture'];

 $mbr_address = $row['mbr_address'];
 $mbr_phone = $row['mbr_phone'];
 $mbr_branch = $row['mbr_branch'];
 $mbr_email = $row['mbr_email'];

 echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
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
		<title>Ahli | Halaman Utama</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script>
      	function checkDeleteEdu(){
             return confirm('Padam Pendidikan ?');
         }

        function checkDeleteJob(){
             return confirm('Padam Pekerjaan ?');
         }

      </script>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../style/navigation.php'; ?>
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
								    <li class="breadcrumb-item"><a href="admin.php">Halaman Utama</a></li>
								  </ol>
								</nav>
								<center><strong>Selamat Datang. <?php echo strtoupper($mmbrName); ?> ( <?php echo $mmbrIC; ?> ) </strong> 

								<br><br>	

								<img title=" " alt=" " src="img/<?php echo $profileimage ?>" height="300px" width="300px" />
								<br><br>

								<form method="post" action="user_update.php?member_ic=<?php echo $mmbrIC; ?>">
									<input type="hidden" name="member_ic" value="<?php echo $mmbrIC; ?>">
									<input type="submit" class="btn btn-primary" name="updateprofile" value="Kemaskini Profil">
								</form>

							</center>

								<br><br>
								<div class="container">
								<section>

                				<div class="container">
								     <table style="width:100%"> 
					                      <tr bgcolor="#5bc0de">
					                        <td colspan="8"> <br><center><b>MAKLUMAT PERIBADI</b></center><br></td>
					                      </tr>  
					                </table>
					                <br>
					                <center>
					                	<table border="1" class="table table-striped" style="width:50%"> 
					                      <tr>
					                        <td> <center>Nama : </center></td>
					                        <td> <center><b><?php echo $mmbrName; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Nombor IC : </center></td>
					                        <td> <center><b><?php echo $mmbrIC; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Alamat : </center></td>
					                        <td> <center><b><?php echo $mbr_address; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>No Telefon : </center></td>
					                        <td> <center><b><?php echo $mbr_phone; ?></b> </center></td>
					                      </tr>  
					                      <tr>
					                        <td> <center>Email : </center></td>
					                        <td> <center><b><?php echo $mbr_email; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Cawangan : </center></td>
					                        <td> <center><b><?php echo $mbr_branch; ?></b> </center></td>
					                      </tr>    
					                	</table>
					            	</center>
								</div>

								<br><br>

								<div class="container">
								  <button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#study">MAKLUMAT PENDIDIKAN</button>
								  <div id="study" class="collapse">
								   <?php include 'user_edu_list.php'; ?>
								  </div>
								</div>

								<br>

								<div class="container">
								  <button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#job">MAKLUMAT PEKERJAAN</button>
								  <div id="job" class="collapse">
								   <?php include 'user_job_list.php'; ?>
								  </div>
								</div>

								<br>

								<div class="container">
								  <button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#family">MAKLUMAT KELUARGA</button>
								  <div id="family" class="collapse">
								   <?php include 'user_family_list.php'; ?>
								  </div>
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