<?php 

require ('../connection.php');
session_start();

$member_ic = $_SESSION['memberIC'];

 if(!isset($_SESSION['adminID'])) // If session is not set then redirect to home
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
		<title>Wadah | Admin</title>
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

					<button onclick="location.href='../logout.php';">Logout</button><br>
					<h1>LIST OF ALL MEMBERS</h1>

						<div align="center">
					<button onclick="location.href='admin_member_registration.php';">Register Member</button>
					<form method="post" action="admin.php">
 					Branch : 				 
	                <select name="mbr_branch">
	                   <option value="ALL">ALL</option>
	                            <?php
	                              $sql = "SELECT DISTINCT `mbr_branch` FROM `member`";
	                              $sql_tuition = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
	                              
	                              while( $row = mysqli_fetch_array($sql_tuition) )
	                              {
	                                ?>
	                                <option value="<?php echo $row['mbr_branch']; ?>"><?php echo $row['mbr_branch']; ?></option>
	                                <?php
	                              }
	                            ?>
	                  </select>
	                  <input type="submit" value="search">
                  </form> 
                 </div>        
            <table border="1">
                <thead>
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Name</center></th>
                    <th scope="col"><center>IC Number</center></th>
                    <th scope="col"><center>Phone Number</center></th>
                    <th scope="col"><center>Branch</center></th>
                    <th scope="col"><center>Children Info</center></th>
                    <th scope="col"><center>Education Info</center></th>
                    <th scope="col"><center>Occupation Info</center></th>
                    <th scope="col"><center>Action</center></th>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/jquery.bxslider.js"></script>
		<script src="../js/mooz.scripts.min.js"></script>
	</body>
</html>