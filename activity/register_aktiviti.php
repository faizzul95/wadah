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
	<h1>DAFTAR AKTIVITI</h1></br>
	<a href="../member/New folder/index.php">LAMAN UTAMA </a> <br><br>
	<form action="../activity/controller.php" method="post">
	  <TABLE border="1" cellpadding="5" cellspacing="2">
		  <tr>
					<td colspan="2"><center>
					  <b>AKTIVITI</b>
				  </center></td> 
				</tr>
				<tr>
					<td>Aktiviti :</td>
					<td><select name="act_type" required>
					  <option value="">- Jenis Aktiviti -</option>
					  <option valuea="Muktamar">Muktamar</option>
					  <option value="Tamrin">Tamrin</option>
					  <option value="Usrah">Usrah</option>
					  <option value="Rehleh">Rehleh</option>
					  <
				    </select></td>
				</tr>
				<tr>
					<td>Topik  :</td>
					<td><input name="act_topic" type="text" size="50" maxlength="50" required></td>
				</tr>
                    <tr>
					<td>Tempat  :</td>
					<td><input name="act_venue" type="text" size="50" maxlength="50" required></td>
				<tr>
					<td> Tarikh/Masa:</td>
					<td><input name="act_date" type="date" size="50" maxlength="50" required> / <input name="act_time" type="time" size="50" maxlength="50" required></td>
				</tr>
                			<tr>
					<td> Nama Penceramah/Naqib :</td>
					<td><input name="naqib_name" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="register_aktiviti" value="DAFTAR" class="btn btn-info">
					</td>
				</tr>
			</TABLE>
		</form>
				</div>
	
</body>
</html>