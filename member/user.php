<?php
  // Turn off error reporting
	error_reporting(0);

  date_default_timezone_set("Asia/Kuala_Lumpur");

  require ('../connection.php');
  session_start(); 
  $member_ic = $_SESSION['memberIC'];

 $result = $myConnection->query("SELECT * FROM `member` WHERE `mbr_ic` = '$member_ic'"); 
 $row = $result->fetch_assoc();
 $mmbrName = $row['mbr_name'];
 $mmbrIC = $row['mbr_ic'];
 $profileimage = $row['mbr_profile_picture'];
 $mbr_address = $row['mbr_address'];
 $mbr_phone = $row['mbr_phone'];
 $mbr_branch = $row['mbr_branch'];
 $mbr_email = $row['mbr_email'];

 $result = $myConnection->query("SELECT * FROM `fees` WHERE `member_ic` = '$mmbrIC'"); 
 $row = $result->fetch_assoc();
 $Fee_status = $row['Fee_status'];
 $Fee_type = $row['Fee_type'];
 $Fee_amount = $row['Fee_amount'];
 
//  echo '<pre>';
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
		<title>Ahli | Profil</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Custom styles for this template -->
		<link href="../css/jquery.bxslider.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">

		<script type="text/javascript">
      	function checkDeleteEdu(){
             return confirm('Padam Pendidikan ?');
         }

        function checkDeleteJob(){
             return confirm('Padam Pekerjaan ?');
         }

         function checkDeleteFamily(){
             return confirm('Padam Keluarga ?');
         }

         function clickButton(){
             document.getElementById("buttonstudy").click();
             document.getElementById("buttonjob").click();
             document.getElementById("buttonfamily").click();
             document.getElementById("buttonactivity").click();
         }

      </script>
	</head>
	<body onLoad="clickButton()">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php include '../member/style/navigation.php'; ?>
		</nav>

		<div class="container">
		<section>
			<div class="row">
				<div class="col-md-12">
					<article class="blog-post">
						occupation_registration
						<div class="blog-post-body">
							<div class="blog-post-text">
								<br>
								<nav aria-label="breadcrumb">
								  <ol class="breadcrumb">
								    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="#">Profil</a></li>
								  </ol>
								</nav>
								<center><strong>Selamat Datang. <?php echo strtoupper($mmbrName); ?> ( <?php echo $mmbrIC; ?> ) </strong> 

								<button type="submit" class="btn btn-success" onclick="window.open('print.php?member_ic=<?php echo $mmbrIC; ?>')" value="Cetak " target="_blank" data-backdrop="static"> Cetak <span class="glyphicon glyphicon-print"></span></button>

								<br><br>	

								<img title=" " alt=" " src="img/<?php echo $profileimage ?>" height="300px" width="300px" />
								<br><br>

								<form method="post" action="user_update.php?member_ic=<?php echo $mmbrIC; ?>">
									<input type="hidden" name="member_ic" value="<?php echo $mmbrIC; ?>">
									<input type="submit" class="btn btn-primary" name="updateprofile" value="Kemaskini Profil">
								</form>

								</center>

								<br><br>
								<div class="container">
								<section>

                				<div class="container">
								     <table style="width:100%"> 
					                      <tr bgcolor="#5bc0de">
					                        <td colspan="8"> <br><center><b><font color="white">MAKLUMAT PERIBADI</font></b></center><br></td>
					                      </tr>  
					                </table>
					                <br>
					                <center>
					                	<table border="1" class="table table-striped" style="width:50%"> 
					                      <tr>
					                        <td> <center>Nama : </center></td>
					                        <td> <center><b><?php echo $mmbrName; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Nombor IC : </center></td>
					                        <td> <center><b><?php echo $mmbrIC; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Alamat : </center></td>
					                        <td> <center><b><?php echo $mbr_address; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>No Telefon : </center></td>
					                        <td> <center><b><?php echo $mbr_phone; ?></b> </center></td>
					                      </tr>  
					                      <tr>
					                        <td> <center>Email : </center></td>
					                        <td> <center><b><?php echo $mbr_email; ?></b> </center></td>
					                      </tr>
					                      <tr>
					                        <td> <center>Cawangan : </center></td>
					                        <td> <center><b><?php echo $mbr_branch; ?></b> </center></td>
					                      </tr> 
					                      <tr>
					                        <td> <center>Yuran Ahli : </center></td>
					                        <td> <center><b> 
					                        	<?php 
					                        if ($Fee_status != "Belum Dibayar" AND $Fee_amount != NULL AND $Fee_type == "Yuran Ahli") {
					                        	echo "<b><font color='green'>".strtoupper($Fee_status)."</font><b>"; 
					                        }else {
					                        	echo "<b><font color='red'> BELUM DIBAYAR </font><b>";
					                        }
					                        ?>
					                        	

					                        </b> </center></td>
					                      </tr>   
					                	</table>
					            	</center>
								</div>
								<br>
								<div class="container">
								  <button type="button" id="buttonstudy" class="btn btn-info form-control" data-toggle="collapse" data-target="#study">MAKLUMAT PENDIDIKAN</button>
								  <div id="study" class="collapse">
								   <?php include 'user_edu_list.php'; ?>
								  </div>
								</div>

								<br>

								<div class="container">
								  <button type="button" id="buttonjob" class="btn btn-info form-control" data-toggle="collapse" data-target="#job">MAKLUMAT PEKERJAAN</button>
								  <div id="job" class="collapse">
								   <?php include 'user_job_list.php'; ?>
								  </div>
								</div>

								<br>

								<div class="container">
								  <button type="button" id="buttonfamily" class="btn btn-info form-control" data-toggle="collapse" data-target="#family">MAKLUMAT KELUARGA</button>
								  <div id="family" class="collapse">
								   <?php include 'user_family_list.php'; ?>
								  </div>
								</div>

								<br>

								<div class="container">
								  <button type="button" id="buttonactivity" class="btn btn-info form-control" data-toggle="collapse" data-target="#activity">SENARAI AKTIVITI</button>
								  <div id="activity" class="collapse">
								   <?php include 'user_activity_list.php'; ?>
								  </div>
								</div>
				           
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
                url: "user_edu_info.php",
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