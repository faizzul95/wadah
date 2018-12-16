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

    $id = $_GET['mbr_ic'];

  $sql = mysqli_query($myConnection,"SELECT `event`.*,`member`.*,`activity`.* FROM `event` 
	INNER JOIN  `member` ON `event`.`member_ic` = `member`.`mbr_ic`
  INNER JOIN  `activity` ON `event`.`activity_id` = `activity`.`act_id`
	WHERE `mbr_ic` = '$id'") or die (mysqli_error());
	$row=mysqli_fetch_array($sql);
  $actName = $row['act_name'];
  $patname = $row['mbr_name'];
  $patic = $row['mbr_ic'];
  $mbr_phone = $row['mbr_phone'];
  $pataddress = $row['mbr_address'];

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
		<title>Admin | Profil & Senarai Aktiviti</title>
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
			<?php include '../admin/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Profil & Senarai Aktiviti</li>
								  </ol>
								</nav><br><br>
								<div class="container">
								<section>

									<center><h3>Maklumat Peribadi</h3></center>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <tr>
                            <th width="158" scope="row"><div align="right">Nama : </div></th>
                            <td>&nbsp; <?php echo $row['mbr_name']; ?></td>
                          </tr>
                         
                          <tr>
                            <th width="158" scope="row"><div align="right"> No Kad Pengenalan : </div></th>
                            <td>&nbsp; <?php echo $row['mbr_ic']; ?></td>
                          </tr>
                          <tr>
                            <th width="158" scope="row"><div align="right"> Alamat : </div></th>
                            <td>&nbsp; <?php echo $row['mbr_address']; ?></td>
                          </tr>
                          <tr>
                            <th width="158" scope="row"><div align="right"> No telefon : </div></th>
                            <td>&nbsp; <?php echo $row['mbr_phone']; ?></td>
                          </tr>
                          <tr>
                            <th width="158" scope="row"><div align="right"> Jantina : </div></th>
                            <td>&nbsp; <?php echo $row['mbr_gender']; ?></td>
                          </tr>
                           <tr>
                            <th width="158" scope="row"><div align="right"> Tarikh Lahir: </div></th>
                            <td>&nbsp; <?php echo $row['mbr_dob']; ?></td>
                          </tr>
                          <tr>
                            <th width="158" scope="row"><div align="right"> Email: </div></th>
                            <td>&nbsp; <?php echo $row['mbr_email']; ?></td>
                          </tr>
                          </p>;
                        </table>

                        <center><h3>Senarai Aktiviti</h3></center>

                        <br>

									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>No.</th>
						            <th>Nama Aktiviti</th>
						            <th>Tarikh</th>
						            <th>Masa</th>
						            <th>Tempat</th>
                        <th>Bayaran Aktiviti</th>
											</tr>
										</thead>
										<tbody>


                      <?php 

                      $sql = mysqli_query($myConnection,"SELECT `event`.*,`member`.*,`activity`.* FROM `event` 
                      INNER JOIN  `member` ON `event`.`member_ic` = `member`.`mbr_ic`
                      INNER JOIN  `activity` ON `event`.`activity_id` = `activity`.`act_id`
                      WHERE `mbr_ic` = '$id'") or die (mysqli_error($myConnection));

                            if (mysqli_num_rows($sql)==0){
                                 echo "Data Tidak Ditemui";
                              }
                            else{
                              $count = 1;
                              while($row = mysqli_fetch_assoc($sql))
                               { 
                                  $act_id = $row['act_id'];
                                  // $actName = $row['act_name'];
                                ?>
                                   
                                   <tr>
                        <td><?php echo $count; ?></td>
                        <td><center><?php echo $row['act_name']; ?></center></td>
                       <td><center><?php echo $row['act_date']; ?></center></td>
                       <td><center><?php echo $row['act_time']; ?></center></td>
                       <td><center><?php echo $row['act_venue']; ?></center></td>
                       <td><center><?php echo $row['act_fee']; ?></center></td>
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


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2LongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h2 class="modal-title" id="exampleModal2Label"><center><font color="white">MAKLUMAT PEKERJAAN</font></center></center></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
		        <input type="submit" class="btn btn-secondary" name="" data-dismiss="modal" onClick="window.location.reload()" value="Tutup">
	  </div>
    </div>
  </div>
</div>

<!-- ajax untuk pendidikan -->
<script>
    $('#exampleModal2').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "admin_occupation_info.php",
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