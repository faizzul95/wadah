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
		<title>Admin | Daftar Penaja</title>
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
			<?php include '../account/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="list_sps.php">Halaman Utama</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Yuran Ahli</li>
				  </ol>
				</nav>
								

		<div class="container"  style="font-size:12px;">
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
			              <div class="container" >
						  <div align="center">
								<h1><br>YURAN AHLI</h1></br>
			                <section>
                             <table style="width:100%" > 
						            	<tr>
						            		<td> </td>
						                  <td>
						            		<!--<input type="submit" name="login" value="REGISTER NEW MEMBER" onclick="location.href='register_speaker.php';" class="btn btn-primary pull-right">-->
						            	</td>
						            	</tr>   
						            </table>
			                  <br>
			                  <table id="example" class="table table-striped table-bordered" style="width:100%">
			                    <thead>
			                      <tr>
			                        <th>No.</th>
			                        <th>Gambar profil</th>
			                        <th>Name</th>
			                        <th>IC</th>
			                        <th>Alamat</th>
			                        <th>Jantina</th>
			                        <th>Telefon Nombor</th>
									<th>Emel</th>
                                    <th>Yuran Ahli (RM)<th>
		                          </tr>
		                        </thead>
			                    <tbody>
			                      <?php 

						                $sql = "SELECT * FROM `member`";

						                
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
			                        <td>
									
									<?php $image = $row['mbr_profile_picture'];
										$image_src = "picture/".$image; ?>
										<img  src='<?php echo $image_src;  ?>'  style="width:60px; height:70px">
									
									</td>
			                        <td><?php echo $row['mbr_name']; ?></td>
			                        <td><?php echo $row['mbr_ic']; ?></td>
			                        <td><?php echo $row['mbr_address']; ?></td>
                                    <td><?php echo $row['mbr_gender']; ?></td>
                                    <td><?php echo $row['mbr_phone']; ?></td>
									<td><?php echo $row['mbr_email']; ?></td>
			                       <td> <?php if ($row['mbr_fee'] == NULL)  echo 'UNPAID'; else echo $row['mbr_fee'] ?></td>
								  
		                          </tr>
			                      <?php
							                    $count++;
							                  }
							                 } 
						                    ?>
											

		                        </tbody>
			                   
										



<script>
function myFunction() {
    window.print();
}
</script>
							   <!--
							   <tfoot>
			                      <tr>
			                         <th>No.</th>
			                        <th>ID</th>
			                        <th>Nama</th>
			                        <th>Alamat</th>
			                        <th>Nombor Telefon</th>
			                        <th>Emel</th>
			                        <th>Jenis</th>
                                    <th>Tindakan</th>
		                          </tr>
		                        </tfoot>-->
		                      </table>
							  <button onclick="myFunction()">PRINT</button>
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
		
		</div>
		<br><br><br><!-- /.container -->
		
		

		<footer class="footer">
			<?php include 'footer.php'; ?>
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