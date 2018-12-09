<?php 

require ('../connection.php');
session_start();

$member_ic = $_SESSION['memberIC'];

 //if(!isset($_SESSION['role'])) // If session is not set then redirect to home
    {
      // header("Location:logout.php");  
    }
  // else if($_SESSION['role'] != "admin") // if not admin redirect to home
    {
      // echo ("<SCRIPT LANGUAGE='JavaScript'>
          //window.alert('Anda tidak mempunyai akses ke menu Admin.')
        //  window.location =// 'logout.php';  
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
		<link rel="icon" href="../admin/favicon.ico">
		<title>Admin | Aktiviti Masyarakat</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script>
      	function checkDeleteMem(){
             return confirm('Padam Aktiviti ?');
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
							<a href="../admin/post.html"><img src="../admin/images/750x500-5.jpg" alt=""></a>
						</div>
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="../admin/admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Aktiviti Masyarakat</li>
								  </ol>
								</nav><br><br>
								<div class="container">
								<section>
   
						            <table style="width:100%"> 
						            	<tr>
						            		<td><form method="post" action="../admin/admin.php">
						            		</form> </td>
						                  <td>
						            		<input type="submit" name="login" value="Daftar Aktiviti Masyarakat" onclick="location.href='register_public.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>

						            <br>

									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
												<th>Masyarakat ID</th>
												<th>Nama Aktiviti</th>
												<th>Alamat</th>
												<th>No. Telefon</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>


											<?php 

						               {
						                	 $sql = "SELECT * FROM `public`";
						                }
						 
						                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

						                if (mysqli_num_rows($result)==0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($result))
							                 { 
							                 		$mbr_ic = $row['mbr_ic'];
							                  ?>
							                     
							                     <tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row['public_id']; ?></td>
												<td><?php echo $row['public_name']; ?></td>
												<td><?php echo $row['public_add']; ?></td>
												<td><?php echo $row['public_phone']; ?></td>
												<td><button class="btn btn-primary" onclick="location.href='admin_member_edit.php?member_ic=<?php echo $mbr_ic; ?>';">Kemaskini</button><br>
													 <form method="post" action="controller.php?public_id=<?php echo $row["public_id"]; ?>">
						                              <input type="hidden" name="public_id" value="<?php echo $row['public_id']; ?>">
						                              <input type="submit" name="deleteactivity" onclick='return checkDeleteMem()' class="btn btn-danger" value="Padam">
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
												<th>Masyarakat ID</th>
												<th>Nama Aktiviti</th>
												<th>Alamat</th>
												<th>No. Telefon</th>
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