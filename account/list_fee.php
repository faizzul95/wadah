<?php 

require ('../connection.php');
session_start();


 if(!isset($_SESSION['role'])) 
    {
       header("Location:logout.php");  
    }
   else if($_SESSION['role'] != "admin") 
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
		<title>Admin | Yuran</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
        <script>
      	function checkDeleteFee(){
             return confirm('Padam Yuran ?');
         }

      </script>
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
			      <div class="col-md-12">
			        <article class="blog-post">
			          <div class="blog-post-image"> <a href="post.html"><img src="images/750x500-5.jpg" alt=""></a> </div>
			          <div class="blog-post-body">
			            <div class="blog-post-text"> <br>
			            	<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Yuran</li>
								  </ol>
								</nav>
			              <div class="container">
			                <section>
                             <table style="width:100%"> 
						            	<tr>
						            		<td> </td>
						                  <td>
						            		<input type="submit" name="login" value="Daftar Yuran" onclick="location.href='register_fees.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>
			                  <br>
			                  <table id="example" class="table table-striped table-bordered" style="width:100%">
			                    <thead>
			                      <tr>
			                        <th>No.</th>
			                        <th>Nama</th>
			                        <th>Kad Pengenalan</th>
			                        <th>Status</th>
			                        <th>Tarikh</th>
			                        <th>Jumlah</th>
			                        <th>Jenis</th>
                                    <th>Tindakan</th>
		                          </tr>
		                        </thead>
			                    <tbody>
			                      <?php 

						                $sql = mysqli_query($myConnection,"SELECT `fees`.*,`member`.* FROM `fees` 
										INNER JOIN  `member` ON `fees`.`member_ic` = `member`.`mbr_ic`") or die (mysqli_error($myConnection));
										//$row=mysqli_fetch_assoc($sql);

						                if (mysqli_num_rows($sql)<0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($sql))
							                 { 
							                 	$Fee_id = $row['Fee_id'];
							                 	$mbr_name = $row['mbr_name'];
							                  ?>
			                      <tr>
			                        <td><?php echo $count; ?></td>
			                        <td><?php echo $mbr_name; ?></td>
			                        <td><?php echo $row['member_ic']; ?></td>
			                        <td><?php echo $row['Fee_status']; ?></td>
			                        <td><?php echo $row['Fee_date']; ?></td>
			                        <td><?php echo $row['Fee_amount']; ?></td>
                                    <td><?php echo $row['Fee_type']; ?></td>
			                       <td>
			                       	<center><button class="btn btn-primary" onclick="location.href='update_fees.php?feeID=<?php echo $row['Fee_id']; ?>';"><span class="glyphicon glyphicon-edit"></span></button>
			                       	</center>
                                  </td>
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