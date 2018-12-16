<?php 

require ('../connection.php');
session_start();

$act_id = $_GET['act_id'];
$member_ic = $_SESSION['memberIC'];

$result = $myConnection->query("SELECT * FROM `activity` WHERE `act_id` = '$act_id'"); 
$row = $result->fetch_assoc();
$act_name = $row['act_name'];


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
		<title>Aktiviti | Maklum Balas</title>
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

    	<script>
		function validateForm() {
		  var a = document.forms["myForm"]["q1"].value;
		  var b = document.forms["myForm"]["q2"].value;
		  var c = document.forms["myForm"]["q3"].value;
		  var d = document.forms["myForm"]["q4"].value;
		  var e = document.forms["myForm"]["q5"].value;
		  var f = document.forms["myForm"]["q6"].value;
		  var g = document.forms["myForm"]["q7"].value;
		  var h = document.forms["myForm"]["q8"].value;
		  var i = document.forms["myForm"]["q9"].value;
		  var j = document.forms["myForm"]["q10"].value;
		  if (a == "") {
		    alert("Soalan 1 tidak dijawab");
		    return false;
		  }
		  if (b == "") {
		    alert("Soalan 2 tidak dijawab");
		    return false;
		  }
		  if (c == "") {
		    alert("Soalan 3 tidak dijawab");
		    return false;
		  }
		  if (d == "") {
		    alert("Soalan 4 tidak dijawab");
		    return false;
		  }
		  if (e == "") {
		    alert("Soalan 5 tidak dijawab");
		    return false;
		  }
		  if (f == "") {
		    alert("Soalan 6 tidak dijawab");
		    return false;
		  }
		  if (g == "") {
		    alert("Soalan 7 tidak dijawab");
		    return false;
		  }
		  if (h == "") {
		    alert("Soalan 8 tidak dijawab");
		    return false;
		  }
		  if (i == "") {
		    alert("Soalan 9 tidak dijawab");
		    return false;
		  }
		  if (j == "") {
		    alert("Soalan 10 tidak dijawab");
		    return false;
		  }
		}
		</script>

	</head>
	<body>
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../member/style/navigation.php'; ?>
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
				    <li class="breadcrumb-item active" aria-current="page">Senarai Aktiviti</li>
				    <li class="breadcrumb-item active" aria-current="page">Maklum Balas</li>
				  </ol>
				</nav>
								
				<div class="container">
				<section>
            
								<div align="center">
								<h1>MAKLUM BALAS</h1>
								<h4>Nama Aktiviti : <br> <?php echo $act_name ?></h4>
								</br>
							<form name="myForm" method="post" action="controller.php" onsubmit="return validateForm()">
								<input type="hidden" name="act_id" value="<?php echo $act_id ?>">
								<input type="hidden" name="member_ic" value="<?php echo $member_ic ?>">
								<table class="table table-striped table-bordered table-responsive" border="1">
								      <tr>
								        <th width="612" scope="col">&nbsp;</th>
								        <th width="17" scope="col"><div align="center">1 </div></th>
								        <th width="17" scope="col"><div align="center">2</div></th>
								        <th width="17" scope="col"><div align="center">3</div></th>
								        <th width="17" scope="col"><div align="center">4</div></th>
								        <th width="17" scope="col"><div align="center">5</div></th>
							          </tr>
								      <tr>
								        <td>Saya dapat maklumat selepas mengikuti aktiviti.</td>
								        <td><input type="radio" name="q1" data-col="1" value="1"></td>
								        <td><input type="radio" name="q1" data-col="1" value="2"></td>
								        <td><input type="radio" name="q1" data-col="1" value="3"></td>
								        <td><input type="radio" name="q1" data-col="1" value="4"></td>
								        <td><input type="radio" name="q1" data-col="1" value="5"></td>
							          </tr>
								      <tr>
								        <td height="24">Saya dapat jumpa kawan baru selepas mengikuti aktiviti ini.</td>
								        <td><input type="radio" name="q2" value="1"></td>
								        <td><input type="radio" name="q2" value="2"></td>
								        <td><input type="radio" name="q2" value="3"></td>
								        <td><input type="radio" name="q2" value="4"></td>
								        <td><input type="radio" name="q2" value="5"></td>
							          </tr>
								      <tr>
								        <td>Pengunaan peralatan sangat bagus.</td>
								        <td><input type="radio" name="q3" value="1"></td>
								        <td><input type="radio" name="q3" value="2"></td>
								        <td><input type="radio" name="q3" value="3"></td>
								        <td><input type="radio" name="q3" value="4"></td>
								        <td><input type="radio" name="q3" value="5"></td>
							          </tr>
								      <tr>
								        <td>Makanan disediakan sedap dan bersih,</td>
								        <td><input type="radio" name="q4" value="1"></td>
								        <td><input type="radio" name="q4" value="2"></td>
								        <td><input type="radio" name="q4" value="3"></td>
								        <td><input type="radio" name="q4" value="4"></td>
								        <td><input type="radio" name="q4" value="5"></td>
							          </tr>
								      <tr>
								        <td>Tempat sangat selesa.</td>
								        <td><input type="radio" name="q5" value="1"></td>
								        <td><input type="radio" name="q5" value="2"></td>
								        <td><input type="radio" name="q5" value="3"></td>
								        <td><input type="radio" name="q5" value="4"></td>
								        <td><input type="radio" name="q5" value="5"></td>
							          </tr>
								      <tr>
								        <td>Saya berpuas hati dengan perkhidmatan yang disediakan.</td>
								        <td><input type="radio" name="q6" value="1"></td>
								        <td><input type="radio" name="q6" value="2"></td>
								        <td><input type="radio" name="q6" value="3"></td>
								        <td><input type="radio" name="q6" value="4"></td>
								        <td><input type="radio" name="q6" value="5"></td>
							          </tr>
								      <tr>
								        <td>Aktiviti ini dijalankan pada hari terluang .</td>
								        <td><input type="radio" name="q7" value="1"></td>
								        <td><input type="radio" name="q7" value="2"></td>
								        <td><input type="radio" name="q7" value="3"></td>
								        <td><input type="radio" name="q7" value="4"></td>
								        <td><input type="radio" name="q7" value="5"></td>
							          </tr>
								      <tr>
								        <td>Aktiviti ini memberi manfaat kepada saya.</td>
								        <td><input type="radio" name="q8" value="1"></td>
								        <td><input type="radio" name="q8" value="2"></td>
								        <td><input type="radio" name="q8" value="3"></td>
								        <td><input type="radio" name="q8" value="4"></td>
								        <td><input type="radio" name="q8" value="5"></td>
							          </tr>
								      <tr>
								        <td>Ingin mengajak teman lain menyertai aktiviti.</td>
								        <td><input type="radio" name="q9" value="1"></td>
								        <td><input type="radio" name="q9" value="2"></td>
								        <td><input type="radio" name="q9" value="3"></td>
								        <td><input type="radio" name="q9" value="4"></td>
								        <td><input type="radio" name="q9" value="5"></td>
							          </tr>
								      <tr>
								        <td>Ingin melibatkan diri dengan aktiviti ini lagi jika ada.</td>
								        <td><input type="radio" name="q10" value="1"></td>
								        <td><input type="radio" name="q10" value="2"></td>
								        <td><input type="radio" name="q10" value="3"></td>
								        <td><input type="radio" name="q10" value="4"></td>
								        <td><input type="radio" name="q10" value="5"></td>
							          </tr>
								      </table>
								<input type="submit" name="feedbackahli" value="Hantar Maklum Balas" class="btn btn-primary form-control" required >
								</div>
								</form>
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
<span class="col-md-12">
<article class="blog-post"></article>
</span>
<script src="../js/mooz.scripts.min.js"></script>
</body>
</html>
	