





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
		<title>Admin | Sewaan</title>
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
			<?php include '../style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
			  <div class="col-md-12">
			    <article class="blog-post">
			      <div class="col-md-12">
			        <article class="blog-post">
			          <div class="blog-post-image"> <a href="post.html"><img src="images/750x500-5.jpg" alt=""></a> </div>
			          <div class="blog-post-body">
			            <div class="blog-post-text"> <br>
			              <br>
			              <br>
			              <div class="container">
			                <section>
                             <table style="width:100%"> 
						            	<tr>
						            		<td> </td>
						                  <td>
						            		<input type="submit" name="login" value="Tambah Maklumat Sewaan" onclick="location.href='user_asset_rent.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>
			                  <br>
			                  <table id="example" class="table table-striped table-bordered" style="width:100%">
			                    <thead>
			                      <tr>
			                        <th>#</th>
			                        <th>Id Sewaan</th>
			                        <th>Jenis Aset</th>
			                        <th>Status Aset</th>
			                        <th>Bilangan Hari Sewaan</th>
			                        <th>Tarikh Mula Sewaan</th>
                                    <th>Tarikh Akhir Sewaan</th>
                                    <th>Syarikat Sewaan</th>
		                          </tr>
		                        </thead>
			                    <tbody>
			                      <?php 

						                //$sql = "SELECT * FROM `maintenance`";

						                $sql = "SELECT * FROM `rent` 
										INNER JOIN `asset` ON `asset`.`asset_id` = `rent`.`asset_id` 
										INNER JOIN `asset` ON `asset`.`asset_id` = `rent`.`asset_id`";

						                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

						                if (mysqli_num_rows($result)==0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($result))
							                 { 
							                  ?>
			                      <tr>
			                        <td><?php echo $count; ?></td>
			                        <td><?php echo $row['rent_id']; ?></td>
			                        <td><?php echo $row['asset_type']; ?></td>
			                        <td><?php echo $row['rent_availability']; ?></td>
			                        <td><?php echo $row['rent_days']; ?></td>
                                    <td><?php echo $row['rent_startdate']; ?></td>
                                    <td><?php echo $row['rent_finishdate']; ?></td>
                                    <td><?php echo $row['rent_companyname']; ?></td>
			                       <td><button class="btn btn-primary" onclick="location.href='member_edit.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Kemaskini</button><br><button class="btn btn-danger" onclick="location.href='member_delete.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Buang</button></td>
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