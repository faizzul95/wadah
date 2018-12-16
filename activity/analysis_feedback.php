<?php 

require ('../connection.php');
session_start();

$act_id = $_GET['act_id'];
$result = $myConnection->query("SELECT * FROM `activity` WHERE `act_id` = '$act_id'"); 
$row = $result->fetch_assoc();
$act_name = $row['act_name'];
$activity_id = $act_id;

for($i=1; $i<=10; $i++)
{
	for($j=1; $j<=5; $j++)
	{
		$sql = "SELECT count(*) FROM `feedback` WHERE `q{$i}` = '$j' and `activity_id` = '$activity_id'";
        $sql_rec = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
        $row = mysqli_fetch_array($sql_rec);
        $arr[$i][$j] = $row[0];
	}
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
		<title>Aktiviti | Analisis Maklum Balas</title>
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
								    <li class="breadcrumb-item active" aria-current="page"><a href="list_activity.php">Senarai Aktiviti</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Analisis Maklum Balas</li>
								  </ol>
								</nav>
									
								<div class="container">
									<section>
										<div align="center">
											<h1>ANALISIS MAKLUM BALAS</h1>
											<h4>Nama Aktiviti : <br> <?php echo $act_name ?></h4>
											</br>

											<?php

									// $sql = "SELECT count(*) FROM `feedback`";
									$sql = "SELECT count(*) FROM `feedback` where `activity_id` = '$activity_id'";
									$sql_rec = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));

									$row = mysqli_fetch_array($sql_rec);
									$total = $row[0];

									for($i=1; $i<=10; $i++) // question
									{

										if($i == 1)  
											$question = "Saya dapat maklumat selepas mengikuti aktiviti.";
										elseif ($i == 2)
											$question = "Saya dapat jumpa kawan baru selepas mengikuti aktiviti ini.";
										elseif ($i == 3)
											$question = "Pengunaan peralatan sangat bagus.";
										elseif ($i == 4)
											$question = "Makanan disediakan sedap dan bersih,";
										elseif ($i == 5)
											$question = "Tempat yang sangat selesa.";
										elseif ($i == 6)
											$question = "Saya berpuas hati dengan perkhidmatan yang disediakan.";
										elseif ($i == 7)
											$question = "Aktiviti ini dijalankan pada hari terluang .";
										elseif ($i == 8)
											$question = "Aktiviti ini memberi manfaat kepada saya.";
										elseif ($i == 9)
											$question = "Ingin mengajak teman lain menyertai aktiviti.";
										elseif ($i == 10)
											$question = "Ingin melibatkan diri dengan aktiviti ini lagi jika ada.";


										echo "<br><h4>Soalan {$i} : {$question}</h4><br><br>";
										for($j=1; $j<=5; $j++)
										{ 
												 $totalprint = (($arr[$i][$j]/$total)*100);

												if($j == 1)  // mark
													$status = "Very Disagree";
												elseif ($j == 2)
													$status = "Disagree";
												elseif ($j == 3)
													$status = "Maybe";
												elseif ($j == 4)
													$status = "Agree";
												elseif ($j == 5)
													$status = "Very Agree";
											?>

											<table class="table table-responsive" border="0">
												<tr>
													<td width="40%">
														<?php echo $status; ?> :
													</td>
													<td width="60%">
															<div class="progress">
													          <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $totalprint ?>%">
													           <?php echo round($totalprint,2) ?>%
													         </div>
												        </div>
													</td>
												</tr>
											</table>
										<?php }
									}

									?>

										</div>
									</section>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</section>
		</div>

				 <footer class="footer">
					<?php include '../style/footer.php'; ?>
				</footer>

		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.bxslider.js"></script>
<span class="col-md-12">
<article class="blog-post"></article>
</span>
<script src="../js/mooz.scripts.min.js"></script>
</body>
</html>