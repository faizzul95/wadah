<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../favicon.ico">
		<title>Wadah | Aktiviti</title>
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
			<?php include '../style/navigation.php'; ?>
		</nav>

		<div class="container">
		<header>
			<a href="../index.php"><img src="../images/logo.jpg" width="50%" height="50%"></a>
		</header>
		<section>
			<div class="row">
				<div class="col-md-8">
					<article class="blog-post">
						<div class="blog-post-image">
							<a href="../post.html"><img src="../images/750x500-5.jpg" alt=""></a>
							<h1 align="center">AKTIVITI AHLI</h1>
                            <div align="center"><br>
                              <br>
                            </div>
                            <form action="../member/controller.php" method="post">
                              <div align="center">
                                <input name="mbr_ic" type="hidden" value="<?php echo $_SESSION["memberIC"];?>" >
                                <table border="1" cellpadding="5" cellspacing="2">
                                  <tr>
                                    <td colspan="2"><center>
                                      <b>Aktiviti</b>
                                    </center></td>
                                  </tr>
                                  <tr>
                                    <td width="38">Aktiviti :</td>
                                    <td width="279"><select name="type" required>
                                      <option value="">- Jenis Aktiviti -</option>
                                      <option valuea="Muktamar">Muktamar</option>
                                      <option value="Tamrin">Tamrin</option>
                                      <option value="Usrah">Usrah</option>
                                      <option value="Rehleh">Rehleh</option>
                                      <
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td>Tarikh :</td>
                                    <td><input id="event_date" type="date" value="2011-01-13"/></td>
                                  </tr>
                                  <!-- Register family occupation -->
                                  <!-- <tr>
					<td colspan="2"><center><b>OCCUPATION (Optional)</b></center></td> 
				</tr>
				<tr>
					<td>Company Name :</td>
					<td><input name="company_name" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Address :</td>
					<td><input name="company_address" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Phone :</td>
					<td><input name="company_phone" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Email :</td>
					<td><input name="company_email" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Position :</td><td>	
					<input name="company_position" type="text" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Start Working :</td>
					<td><input name="company_start_date" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>End Working :</td>
					<td><input name="company_end_date" type="date" size="50" maxlength="50">
					</td>
				</tr> -->
                                  <tr align="center">
                                    <td height="79" colspan="2"><input type="submit" name="cari_aktiviti" value="Cari" class="btn btn-info"></td>
                                  </tr>
                                </table>
                              </div>
                            </form>
				  </div></article>
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