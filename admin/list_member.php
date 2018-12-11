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
		<title>Admin | Ahli</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script>
      	function checkDeleteMem(){
             return confirm('Padam Ahli ?');
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
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br><nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="admin.php">Halaman Utama</a></li>
								    <li class="breadcrumb-item active" aria-current="page">Senarai Ahli</li>
								  </ol>
								</nav><br><br>
								<div class="container">
								<section>

   
									<table style="width:100%"> 
						            	<tr>
						                <td>
						            		<input type="submit" name="login" value="Daftar Ahli" onclick="location.href='admin_member_registration.php';" class="btn btn-primary pull-right">
						            	</td>
						            	</tr>   
						            </table>
  
						            <br>

						            <table style="width:100%"> 
						            	<tr>
						            	<td>
						            		<form method="post" action="list_member.php?sort=search">
						            		<table>
						            			<tr>
						            				<td>
						            					Susun :
						            				</td>
						            				<td width="80%">  
						            					<select name="mbr_branch" class="form-control" onchange='this.form.submit()'>
							                   			<option value="">- Pilih Cawangan -</option>
							                   			<option value="all">Lihat Semua</option>
							                            <?php
							                              $sql = "SELECT DISTINCT `mbr_branch` FROM `member`";
							                              $sql_branch = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
							                               
							                              while( $row = mysqli_fetch_array($sql_branch) )
							                              {
							                                ?>
							                                <option value="<?php echo $row['mbr_branch']; ?>"><?php echo $row['mbr_branch']; ?></option>
							                                <?php
							                              }
							                            ?>
							                 			 </select>
						            				</td>
						            				<td>
						            					&nbsp; <noscript><input type="submit" value="Submit"></noscript>
						            				</td>
						            			</tr>
						            		</table>
						                  </form> 
						              	</td>
						            	<td>
						            		&nbsp;
						            	</td>
						            	
						              <td width="45%">
						            	</td>
						            	<td width="30%">
						            		<form method="post" action="list_member.php?search=search">
						            			<input type="text" name="ic" class="form-control" placeholder="Carian.." onblur='this.form.submit()' maxlength="13" autocomplete="off">
						            			 <noscript><input type="submit" value="Submit"></noscript>
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
												<th>Nombor IC</th>
												<th>Nombor Telefon</th>
												<th>Cawangan</th>
												<th>Maklumat Keluarga</th>
												<th>Maklumat Pendidikan</th>
												<th>Maklumat Pekerjaan</th>
												<th>Tindakan</th>
											</tr>
										</thead>
										<tbody>


											<?php 

						               if (isset($_POST['mbr_branch'])) {
						                	$branch = $_POST['mbr_branch'];
						                	if ($branch == "all") {
						                		$sql = "SELECT * FROM `member`";
						                	}else{
						                		$sql = "SELECT * FROM `member` WHERE `mbr_branch` = '$branch'";
						                	}
						                }else if(isset($_POST['ic'])) {
						                	$ic = $_POST['ic'];
						                	$sql="SELECT * FROM `member` WHERE  `mbr_name` LIKE '%" . $ic . "%' OR `mbr_ic` LIKE '%" . $ic  ."%'"; 
						                	
						                }else{
						                	 $sql = "SELECT * FROM `member`";
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
												<td><?php echo $row['mbr_name']; ?></td>
												<td><?php echo $mbr_ic; ?></td>
												<td><?php echo $row['mbr_phone']; ?></td>
												<td><?php echo $row['mbr_branch']; ?></td>
												<td>
													<!-- <button class="btn btn-primary" onclick="location.href='admin_children_info.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button> -->
													<?php 
													$sql = "SELECT * FROM `family` WHERE `member_ic` = '$mbr_ic'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
                                                      <center>
                                                      	<button class="btn btn-info" onclick="location.href='list_family.php?mbr_ic=<?php echo $row['member_ic']; ?>';">Lihat
                                                      	</button>
                                                      </center>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>
												</td>

												<td>
													
                                                    <?php 
													$sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$mbr_ic'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
													<form method='post' action=''>
                                                      <center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-whatever="<?php echo $mbr_ic; ?>" >Lihat
                                                      </button></center>
                                                     </form>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>

												</td>
												<td>
													<?php 
													$sql = "SELECT * FROM `occupation_info` WHERE `member_ic` = '$mbr_ic'";
												     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
												     $row = mysqli_fetch_array($res);

												     if (mysqli_num_rows($res)!=0) { ?>
													<form method='post' action=''>
                                                      <center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $mbr_ic; ?>" >Lihat
                                                      </button></center>
                                                     </form>
                                                     <?php }else{ ?>
                                                     	 <center> - Tiada Maklumat - </center>
                                                     <?php } ?>

												</td>
												<td><button class="btn btn-primary" onclick="location.href='admin_member_edit.php?member_ic=<?php echo $mbr_ic; ?>';">Kemaskini</button><br>
													 <form method="post" action="controller.php?member_ic=<?php echo $row["mbr_ic"]; ?>">
						                              <input type="hidden" name="mbr_ic" value="<?php echo $mbr_ic; ?>">
						                              <input type="submit" name="deletemem" onclick='return checkDeleteMem()' class="btn btn-danger" value="Padam">
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
												<th>Nombor IC</th>
												<th>Nombor Telefon</th>
												<th>Cawangan</th>
												<th>Maklumat Keluarga</th>
												<th>Maklumat Pendidikan</th>
												<th>Maklumat Pekerjaan</th>
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