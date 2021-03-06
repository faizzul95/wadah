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
		<title>Admin | Aktiviti</title>
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
			<?php include '../activity/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb"><br>
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="../admin/admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Aktiviti</li>
								  </ol>
								</nav><br>
								<div class="container">
								<section>	

									
									
						            <table style="width:100%"> 
						            	<tr>
						            	<td>
						            		<input type="submit" value="Daftar Aktiviti Awam" onclick="location.href='register_public.php';" class="btn btn-primary pull-right"> &nbsp; &nbsp; &nbsp;
						            		
						            		<input type="submit" value="Daftar Aktiviti Ahli" onclick="location.href='register_aktiviti.php';" class="btn btn-primary pull-right">
						            		<?php 
			                          		$sql = "SELECT * FROM `activity` WHERE `act_category` = 'Awam'";
					                             $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
					                             $row = mysqli_fetch_array($res);

					                             if (mysqli_num_rows($res)!=0) { ?>
					                              <input type="submit" name="login" value="Daftar Penaja Aktiviti" onclick="location.href='assign_sponsor.php';" class="btn btn-primary pull-right">
			                          		<?php }?>
						            	</td>
						            	</tr>   
						            </table>

						            <br>

						             <table style="width:100%"> 
						            	<tr>
						                <td width="70%">
						            		
						            	</td>
						            	<td>
						            		<form method="post" action="list_activity.php?result=search">
						            		<table>
						            			<tr>
						            				<td width="80%">
						            					<input type="text" name="search" autocomplete="off" class="form-control" size="90" required>
						            				</td>
						            				<td>
						            					<input type="submit" name="searchbtn"  value="Carian" class="btn btn-primary pull-right">
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
												<th>Tarikh</th>
												<th>Masa</th>
												<th>Tempat</th>
												<th>Kategori</th>
												<th>Jenis</th>
												<th>Penaja</th>
												<th>Peserta</th>
												<th>Maklum Balas</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>
										<?php 

						                 if(isset($_POST['searchbtn'])) {
						                	$search = $_POST['search'];
						                	$sql="SELECT * FROM `activity` WHERE  `act_name` LIKE '%" . $search . "%' OR `act_type` LIKE '%" . $search  ."%'"; 
						                }else{
						                	 $sql = "SELECT * FROM `activity`";
						                }
						 
						                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

						                if (mysqli_num_rows($result)==0){
						                     echo "Data Tidak Ditemui";
						                  }
						                else{
							                $count = 1;
							                while($row = mysqli_fetch_assoc($result))
							                 { 
							                 		$act_id = $row['act_id'];
							                 		$act_category = $row['act_category'];
							                  ?>
							                     
							                     <tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row['act_name']; ?></td>
												<td><?php echo $row['act_date']; ?></td>
												<td><?php echo $row['act_time']; ?></td>
												<td><?php echo $row['act_venue']; ?></td>
												<td><?php echo $row['act_category']; ?></td>
												<td><?php echo $row['act_type']; ?></td>
												<td>
                                                    <?php 
													$sql = "SELECT * FROM `act_sponsorship` WHERE `act_id` = '$act_id'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
													<form method='post' action=''>
                                                      <center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-whatever="<?php echo $act_id; ?>" >Lihat
                                                      </button></center>
                                                     </form>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>
												</td>
												<td>
													<?php 
													$sql = "SELECT * FROM `event` WHERE `activity_id` = '$act_id'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
                                                      <center>
                                                      	<button class="btn btn-info" onclick="location.href='list_participant.php?act_id=<?php echo $act_id; ?>';">Lihat
                                                      	</button>
                                                      </center>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>
                                                 </td>
                                                 <td>
													<?php 
													$sql = "SELECT * FROM `feedback` WHERE `activity_id` = '$act_id'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
                                                      <center>
                                                      	<button class="btn btn-info" onclick="location.href='analysis_feedback.php?act_id=<?php echo $act_id; ?>';">Lihat
                                                      	</button>
                                                      </center>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>
                                                 </td>
												<td>
													 <?php if ($act_category == "Awam") { ?>
														<button class="btn btn-primary" onclick="location.href='update_public.php?act_id=<?php echo $act_id; ?>';">
							                            <span class="glyphicon glyphicon-edit"></span>
							                      </button>
													<?php } else { ?>
														 <button class="btn btn-primary" onclick="location.href='update_member.php?act_id=<?php echo $act_id; ?>';">
							                            <span class="glyphicon glyphicon-edit"></span>
							                      </button>
													<?php } ?>
								                    <form method="post" action="controller.php?act_id=<?php echo $act_id; ?>">
								                           <input type="hidden" name="act_id" value="<?php echo $act_id; ?>">
								                           <button name="deleteactivity" onclick='return checkDeleteMem()' class="btn btn-danger">
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
        <h2 class="modal-title" id="exampleModalLabel"><center><font color="white">PENAJA</font></center></center></h2>
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
                url: "list_act_sponsor.php",
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