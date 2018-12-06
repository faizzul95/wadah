<?php
	session_start(); 
	$member_ic = $_SESSION['memberIC'];
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
    }
    elseif ($_GET['family_ic']) {
     $family = $_GET['family_ic'];
    }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER EDUCATION</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	<div align="center">
	<h1>DAFTAR AKTIVITI</h1></br>
	<a href="../member/New folder/index.php">LAMAN UTAMA </a> <br><br>
	<form action="../member/New folder/controller.php" method="post">
	  <TABLE border="1" cellpadding="5" cellspacing="2">
		  <tr>
					<td colspan="2"><center>
					  <b>AKTIVITI</b>
				  </center></td> 
				</tr>
				<tr>
					<td>Aktiviti :</td>
					<td><select name="type" required>
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
					<td><!-- #BeginDate format:Am1m -->
December 5, 2018  22:40
  <!-- #EndDate --></td>
				</tr>
                			<tr>
					<td> Nama Penceramah/Naqib :</td>
					<td><input name="naqib_name" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="reg_edu" value="DAFTAR" class="btn btn-info">
					</td>
				</tr>
			</TABLE>
		</form>
				</div>
	
</body>
</html>