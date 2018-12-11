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
		<title>Admin | Naqib</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script>
      	function checkDeleteMem(){
             return confirm('Padam Naqib ?');
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
						<div class="blog-post-image">
							<a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Naqib & Naqibah</li>
								  </ol>
								</nav><br><br>
								<div class="container">
								<section>
						           
									<table style="width:100%"> 
						            	<tr>
						                <td>
						            		<input type="submit" name="login" value="Daftar Naqib/Naqibah" onclick="location.href='admin_naqib_registration.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>

						            <br>

						             <table style="width:100%"> 
						            	<tr>
						                <td width="70%">
						            		
						            	</td>
						            	<td>
						            		<form method="post" action="list_naqib.php?result=search">
						            		<table>
						            			<tr>
						            				<td width="88%">
						            					<input type="text" name="search" class="form-control" size="90" autocomplete="off" required>
						            				</td>
						            				<td>
						            					<button type="submit" class="btn btn-primary pull-right">
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
												<th>No.</th>
												<th>Nama</th>
												<th>No Kad Pengenalan</th>
												<th>No Telefon</th>
												<th>Alamat</th>
												<th>Email</th>
												<th>Kategori</th>
												<th>Cawangan</th>
												<th>Aktiviti</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>

									<?php 
						               if (isset($_POST['search'])) {
						                	$search = $_POST['search'];
						                	$sql="SELECT * FROM `naqib` WHERE  `naqib_name` LIKE '%" . $search . "%' OR `naqib_ic` LIKE '%" . $search  ."%'"; 
						                	
						                }else{
						                	 $sql = "SELECT * FROM `naqib`";
						                }
						 
						                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

						                if (mysqli_num_rows($result)==0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($result))
							                 { 
							                 		$naqib_ic = $row['naqib_ic'];
							                  ?>
							                     
							                     <tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row['naqib_name']; ?></td>
												<td><?php echo $naqib_ic; ?></td>
												<td><?php echo $row['naqib_address']; ?></td>
												<td><?php echo $row['naqib_phone']; ?></td>
												<td><?php echo $row['naqib_mail']; ?></td>
												<td><?php echo $row['naqib_category']; ?></td>
												<td><?php echo $row['naqib_branch']; ?></td>
												<td><center> <?php 
							                          $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$family_ic'";
							                             $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
							                             $row = mysqli_fetch_array($res);

							                             if (mysqli_num_rows($res)!=0) { ?>
							                          <button class="btn btn-info" onclick="location.href='user_edu_info.php?famIC=<?php echo $row['family_ic']; ?>';">Lihat</button>
							                             <?php }else{ ?>
							                               <center> - Tiada Maklumat - </center>
							                        <?php } ?></center></td>
											
												<td><button class="btn btn-primary" onclick="location.href='admin_member_edit.php?naqib_ic=<?php echo $naqib_ic; ?>';">Kemaskini</button><br>
													 <form method="post" action="controller.php?member_ic=<?php echo $row["naqib_ic"]; ?>">
						                              <input type="hidden" name="naqib_ic" value="<?php echo $naqib_ic; ?>">
						                              <input type="submit" name="deletenaqib" onclick='return checkDeleteMem()' class="btn btn-danger" value="Padam">
						                          </form>
												</td>
											</tr>

							                    <?php
							                    $count++;
							                  }
							                 } 
						                    ?>

										</tbody>
										<tfoot>
											<tr>
												<th>No.</th>
												<th>Nama</th>
												<th>No Kad Pengenalan</th>
												<th>No Telefon</th>
												<th>Alamat</th>
												<th>Email</th>
												<th>Kategori</th>
												<th>Cawangan</th>
												<th>Aktiviti</th>
												<th>Tindakan</th>
											</tr>
										</tfoot>
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

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h2 class="modal-title" id="exampleModalLabel"><center><font color="white">MAKLUMAT PENDIDIKAN</font></center></center></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
		        <input type="submit" class="btn btn-secondary" name="" data-dismiss="modal" onClick="window.location.reload()" value="Tutup">
		        <input type="submit" class="btn btn-primary" name="updatestudy" value="Kemaskini">
	  </div>
    </div>
  </div>
</div>

<!-- ajax untuk pendidikan -->
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "admin_edu_info.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.modal-body').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    })
</script>