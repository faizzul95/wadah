<?php 

require ('../connection.php');
session_start();

$member_ic = $_SESSION['memberIC'];

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

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

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
		<title>Wadah | Yuran</title>
		<!-- Bootstrap core CSS -->
		<!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->
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
			<?php include '../member/style/navigation.php'; ?>
		</nav>

		<div class="container"><!-- 
		<header>
			<a href="index.php"><img src="images/logo.jpg" width="50%" height="50%"></a>
		</header> -->
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<h2><a href="">Tentang Wadah</a></h2>
							<div class="blog-post-text">


					<h1>SENARAI YURAN AHLI</h1>

						<div align="center">
					<button onclick="location.href='register_fees.php';">Pendaftaran Yuran</button>
					<form method="post" action="feeinformation.php">
                 </div>        
            <table border="1">
                <thead>
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>
                    Nama
                    </center></th>
                    <th scope="col"><center>
                      IC 
                    </center></th>
                    <th scope="col"><center>
                      Nombor Telefon
                    </center></th>
                    <th scope="col"><center>
                      Cawangan
                    </center></th>
                    <th scope="col"><center></center></th>
          
                   
                    <th scope="col"><center>Status Yuran</center></th>
                  </tr>
                </thead>
                <tbody>
                    
                <?php 

                if (isset($_POST['mbr_branch'])) {
                	$branch = $_POST['mbr_branch'];
                	$sql = "SELECT * FROM `member` WHERE `mbr_branch` = '$branch'";
                }else{

                	 $sql = "SELECT * FROM `member`";

                }
 
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  }
                else{
	                $count = 1;
	                while($row = mysqli_fetch_assoc($result))
	                 { 
	                  ?>
	                      <tr>
	                        <th scope="row"><center><?php echo $count; ?></center></th>
	                        <td><center><?php echo $row['mbr_name']; ?></center></td>
	                        <td><center><?php echo $row['mbr_ic']; ?></center></td>
	                        <td><center><?php echo $row['mbr_phone']; ?></center></td>
	                        <td><center><?php echo $row['mbr_branch']; ?></center></td>
	                        <td><center><button onclick="location.href='admin_children_info.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='admin_edu_info.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='admin_occupation_info.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='family_edit.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Edit</button></center></td>
	                      </tr>
	                    <?php
	                    $count++;
	                  }
	                 } 
	                 // echo "<small>Shows ".$count." to ".$count." entries</small";
                    ?>

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
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
		<!-- <script src="../js/bootstrap.min.js"></script> -->
		<!-- <script src="../js/jquery.bxslider.js"></script> -->
		<!-- <script src="../js/mooz.scripts.min.js"></script> -->
	</body>
</html>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>DataTables example - Bootstrap 4</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.css">

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../js/dataTables.bootstrap4.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	
$(document).ready(function() {
	$('#example').DataTable();
} );

	</script>
</head>
<body class="dt-example dt-example-bootstrap4">
	<div class="container">
		<section>
			<!-- <div class="demo-html"></div> -->
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Age</th>
						<th>Start date</th>
						<th>Salary</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tiger Nixon</td>
						<td>System Architect</td>
						<td>Edinburgh</td>
						<td>61</td>
						<td>2011/04/25</td>
						<td>$320,800</td>
					</tr>
					<tr>
						<td>Garrett Winters</td>
						<td>Accountant</td>
						<td>Tokyo</td>
						<td>63</td>
						<td>2011/07/25</td>
						<td>$170,750</td>
					</tr>
					<tr>
						<td>Ashton Cox</td>
						<td>Junior Technical Author</td>
						<td>San Francisco</td>
						<td>66</td>
						<td>2009/01/12</td>
						<td>$86,000</td>
					</tr>
					<tr>
						<td>Cedric Kelly</td>
						<td>Senior Javascript Developer</td>
						<td>Edinburgh</td>
						<td>22</td>
						<td>2012/03/29</td>
						<td>$433,060</td>
					</tr>
					<tr>
						<td>Airi Satou</td>
						<td>Accountant</td>
						<td>Tokyo</td>
						<td>33</td>
						<td>2008/11/28</td>
						<td>$162,700</td>
					</tr>
					<tr>
						<td>Brielle Williamson</td>
						<td>Integration Specialist</td>
						<td>New York</td>
						<td>61</td>
						<td>2012/12/02</td>
						<td>$372,000</td>
					</tr>
					<tr>
						<td>Herrod Chandler</td>
						<td>Sales Assistant</td>
						<td>San Francisco</td>
						<td>59</td>
						<td>2012/08/06</td>
						<td>$137,500</td>
					</tr>
					<tr>
						<td>Rhona Davidson</td>
						<td>Integration Specialist</td>
						<td>Tokyo</td>
						<td>55</td>
						<td>2010/10/14</td>
						<td>$327,900</td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>Name</th>
						<th>Position</th>
						<th>Office</th>
						<th>Age</th>
						<th>Start date</th>
						<th>Salary</th>
					</tr>
				</tfoot>
			</table>
			</div>
		</section>
	</div>
</body>
</html>