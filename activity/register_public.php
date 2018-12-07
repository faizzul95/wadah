<?php
	session_start(); 
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DAFTAR AKTIVITI</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	<div align="center">
	<h1>DAFTAR MASYARAKAT</h1></br>
	<a href="../member/New folder/index.php">LAMAN UTAMA </a> <br><br>
	<form action="../activity/controller.php" method="post">

							    <TABLE border="1" cellpadding="5" cellspacing="2">
							      <tr>
							        <td colspan="2"><center>
							          <b>Masyarakat</b>
							        </center></td>
						          </tr>
							      
							      <tr>
							        <td>No.Kad Pengenalan:</td>
							        <td><input name="public_id" type="text" size="50" maxlength="50" required></td>
						          </tr>
							      <tr>
							        <td>Nama  :</td>
							        <td><input name="public_name" type="text" size="50" maxlength="50" required></td>
						          <tr>
							          <td>Alamat:</td>
							          <td><input name="public_add" type="text" size="50" maxlength="100" required></td>
						          </tr>
							      <tr>
							        <td> No. Telefon:</td>
							        <td><input name="naqib_name" type="text" size="50" maxlength="50"></td>
						          </tr>
							      <tr align="center">
							        <td colspan="2"><input type="submit" name="register_public" value="DAFTAR" class="btn btn-info"></td>
						          </tr>
						        </TABLE>
<p>&nbsp;</p>
							  </div>
					      </form>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<div class="post-meta"><span><i class="fa fa-clock-o"></i></span></div>
							<div class="blog-post-text"></div>
					      <form name="form2" method="post" action="">
					      </form>
						</div>
					</article>
				</div>
				<div class="col-md-4 sidebar-gutter"></div>
			</div>
			</div>
		</section>
		</div><!-- /.container -->

		<footer class="footer">
			<?php include '../footer.php'; ?>
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