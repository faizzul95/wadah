<?php
	session_start(); 
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DAFTAR NAQIB</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	<div align="center">
	<h1>DAFTAR NAQIB/NAQIBAH</h1></br>
	<a href="../member/New folder/index.php">LAMAN UTAMA </a> <br><br>
	<form action="../activity/controller.php" method="post">
	  <TABLE border="1" cellpadding="5" cellspacing="2">
		  <tr>
					<td colspan="2"><center>
					  <b>NAQIB/NAQIBAH</b>
				  </center></td> 
				</tr>
				<tr>
					<td>Naqib/Naqibah IC :</td>
					<td><input name="naqib_id" type="text" size="50" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Nama  :</td>
					<td><input name="naqib_name" type="text" size="50" maxlength="50" required></td>
				</tr>
                    <tr>
					<td>No. Telefon  :</td>
					<td><input name="naqib_phone" type="text" size="50" maxlength="50" required></td>
				<tr>
					<td>Emel :</td>
					<td><input name="naqib_mail" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="register_naqib" value="DAFTAR" class="btn btn-info">
					</td>
				</tr>
			</TABLE>
		</form>
				</div>
	
</body>
</html>