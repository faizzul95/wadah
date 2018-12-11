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
		<title>Admin | Aset</title>
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
			<?php include '../asset/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
			  <div class="col-md-12">
			    <article class="blog-post">
			      <div class="col-md-12">
			        <article class="blog-post">
			          <div class="blog-post-body">
			            <div class="blog-post-text">
			            		<nav aria-label="breadcrumb">
								  <ol class="breadcrumb"><br><br>
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="../admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Aset</li>
								  </ol>
								</nav><br>
			              <div class="container">
			                <section>
                             <table style="width:100%"> 
						            	<tr>
						            		<td> </td>
						                  <td>
						            		<input type="submit" name="login" value="Tambah Aset" onclick="location.href='user_asset_reg.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>
			                  <br>
			                  <table id="example" class="table table-striped table-bordered" style="width:100%">
			                    <thead>
			                      <tr>
			                        <th>#</th>
			                        <th>Id Aset</th>
			                        <th>Jenis Aset</th>
			                        <th>Status Aset</th>
			                        <th>Kuantiti Aset</th>
			                        <th>Lokasi Aset</th>
                                    <th>Penerangan Aset</th>
                                    <th>Tindakan</th>
		                          </tr>
		                        </thead>
			                    <tbody>
			                      <?php 

						                $sql = "SELECT * FROM `asset`";

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
			                        <td><?php echo $row['asset_id']; ?></td>
			                        <td><?php echo $row['asset_type']; ?></td>
			                        <td><?php echo $row['asset_status']; ?></td>
			                        <td><?php echo $row['asset_quantity']; ?></td>
                                    <td><?php echo $row['asset_place']; ?></td>
                                    <td><?php echo $row['asset_desc']; ?></td>
			                       <td>
                            <button class="btn btn-primary" onclick="location.href='user_asset_edit.php?assetID=<?php echo $row["asset_id"]; ?>';">
                              <span class="glyphicon glyphicon-edit"></span>
                            </button>
                             <form method="post" action="controller.php?jobID=<?php echo $row["asset_id"]; ?>">
                                    <input type="hidden" name="asset_id" value="<?php echo $row["asset_id"]; ?>">
                                    <button name="delete_asset" onclick='return checkDeleteAsset()' class="btn btn-danger">
                                      <span class="glyphicon glyphicon-trash"></span> 
                                    </button>
                              </form>
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