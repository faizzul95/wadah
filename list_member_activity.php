<?php 
require ('connection.php');
session_start();
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
		<title>Wadah | Aktiviti Ahli</title>
		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="css/jquery.bxslider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

		<script type="text/javascript">

         function checkJoin(){
             return confirm('Adakah anda mahu ikut serta dengan aktiviti ini ?');
         }

      </script>

	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include 'style/navigation.php'; ?>
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
								<br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Aktiviti Ahli</li>
								  </ol>
								</nav><br>
								<div class="container">
								<section>
						            <table style="width:100%"> 
						            	<tr>
						                <td width="70%">
						            		
						            	</td>
						            	<td>
						            		<form method="post" action="list_member_activity.php?result=search">
						            		<table>
						            			<tr>
						            				<td width="10%">
						            					
						            				</td>
						            				<td width="80%">
						            					<input type="text" name="search" class="form-control" size="90" autocomplete="off" required>
						            				</td>
						            				<td>
						            					<!-- <input type="submit" name="btnSearch" value="Carian" class="btn btn-primary pull-right"> -->
						            					<button name="btnSearch" class="btn btn-primary pull-right">
												          <span class="glyphicon glyphicon-search"></span> 
												        </button>
						            				</td>
						            			</tr>
						            		</table>
						                  </form> 
						              	</td>
						            	</tr>   
						            </table>

						            <br>

									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th><center>No.</center></th>
												<th><center>Nama</center></th>
												<th><center>Tarikh</center></th>
												<th><center>Masa</center></th>
												<th><center>Tempat</center></th>
												<th><center>Penerangan</center></th>
												<th><center>Jenis</center></th>
												<th><center>Yuran Aktiviti</center></th>
												<?php if(isset($_SESSION['memberIC'])) { ?>
												<th><center>Tindakan</center></th>
												<?php } ?>  
											</tr>
										</thead>
										<tbody>

											<?php 

						               if (isset($_POST['btnSearch'])) {
						                	$query = $_POST['search'];
						                	$sql="SELECT * FROM `activity` WHERE  `act_name` LIKE '%" . $query . "%'"; 
						                }else{
						                	 $sql = "SELECT * FROM `activity` WHERE `act_category` = 'Ahli'";
						                }
						                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

						                if (mysqli_num_rows($result)==0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($result))
							                 { 
							                 		$act_id = $row['act_id'];
							                 		$act_fee = $row['act_fee'];
							                  ?>
							                     
							                     <tr>
												<td><center><?php echo $count; ?></td>
												<td><center><?php echo $row['act_name']; ?></center></td>
												<td><center><?php echo $row['act_date']; ?></center></td>
												<td><center><?php echo $row['act_time']; ?></center></td>
												<td><center><?php echo $row['act_venue']; ?></center></td>
												<td><center><?php echo $row['act_description']; ?></center></td>
												<td><center><?php echo $row['act_type']; ?></center></td>
												<td><center><?php echo $act_fee; ?></center></td>
													<?php if(isset($_SESSION['memberIC'])) 
													    { ?>
													    <td>
													       <center>
													       	<?php

													       	 ?>
													       	<form method="post" action="controller.php">
													       		<input type="hidden" name="member_ic" value="<?php echo $_SESSION['memberIC']; ?>">
													       		<input type="hidden" name="member_ic" value="<?php echo $act_id; ?>">
													       		<input type="submit" name="joinevent" class="btn btn-primary" value="Sertai Aktiviti" onclick='return checkJoin()'>
													       	</form>
															</center>
														</td>
													 <?php } ?>  
											</tr>

							                    <?php
							                    $count++;
							                  }
							                 } 
						                    ?>

										</tbody>
									</table>
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
			<?php include 'style/footer.php'; ?>
		</footer>

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.bxslider.js"></script>
		<script src="js/mooz.scripts.min.js"></script>
	</body>
</html>
