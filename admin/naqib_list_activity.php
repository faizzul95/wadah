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

  $id = $_GET['naqib_ic'];

  $sql = mysqli_query($myConnection,"SELECT * FROM `activity` WHERE `naqib_ic` = '$id'") or die (mysqli_error());
  $row=mysqli_fetch_array($sql);
  $actname = $row['act_name'];
  $date = $row['act_date'];
  $fee = $row['act_fee'];

  $sql2 = mysqli_query($myConnection,"SELECT * FROM `naqib` WHERE `naqib_ic` = '$id'") or die (mysqli_error());
  $row2=mysqli_fetch_array($sql2);
  $naname = $row2['naqib_name'];
  $naic = $row2['naqib_ic'];


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
		<title>Admin | Senarai Aktiviti Naqib</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script>
      	function checkDeleteMem(){
             return confirm('Padam Ahli ?');
         }

      </script>
	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../admin/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Aktiviti Naqib</li>
								  </ol>
								</nav><br><br>
								<div class="container">
								<section>

									<p>NAMA : <b><?php echo strtoupper($naname); ?></b><br>
  								NO KAD PENGENALAN : <b><?php echo $naic; ?></b></p>

                  Jumlah Bayaran : <b>    </b></p>

						            <br>

									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
						                        <th><center>Nama Aktiviti</center></th>
						                        <th><center>Tarikh Aktiviti</center></th>
                                    <th><center>Masa Aktiviti</center></th>
						                        <th><center>Bayaran Aktiviti</center></th>
											</tr>
										</thead>
										<tbody>
                      <?php 

                            $sql = "SELECT * FROM `activity` WHERE `naqib_ic` = '$id'";
                              $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                            if (mysqli_num_rows($result)==0){
                                 echo "Data Tidak Ditemui";
                              }
                            else{
                              $count = 1;
                              while($row = mysqli_fetch_assoc($result))
                               { 
                                  $act_id = $row['act_id'];
                                ?>
                                   
                                  <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><center><?php echo $row['act_name']; ?></center></td>
                                    <td><center><?php echo $row['act_date']; ?></center></td>
                                    <td><center><?php echo $row['act_date']; ?></center></td>
                                    <td><center><?php echo $row['act_fee']; ?></center></td>
                                  </tr>
                                  <?php
                                  $count++;
                                }
                               } 
                                ?>

                    </tbody>
										<tfoot>
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
