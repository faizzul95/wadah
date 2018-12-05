
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER ASSET</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>

</head>

<body>
	
	<div align="center">
	<h1><br>
	  DAFTAR SEWAAN ASET</h1></br>
	<a href="../member/Index.php"> HOME </a> <br><br>
	<form action="../member/controller.php" method="post">
		<input name="mbr_ic" type="hidden" value="<?php echo $_SESSION["memberIC"];?>" >
			<table border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center>
					<b>MAKLUMAT SEWAAN ASET</b>
				  </center></td> 
				</tr>
				<tr>
					<td>Jenis Aset :</td>
					<td><input name="asset_type" value="" type="text" size="50" maxlength="50"></td>
				</tr>		
                <tr>
					<td>Status Aset:</td>
					<td>
					<select name="asset_availability" required>
						<option value="">- Status -</option>
							<option value="ya">ya</option>
							<option value="tidak">tidak</option>
					</select>
					</td>
				</tr>
                <tr>
					<td>Bilangan Hari Sewaan :</td>
					<td>
						<select name="rent_days">
							<option value="" >Pilih</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3" >3</option>
							<option value="4">4</option>
                            <option value="5" >5</option>
							<option value="6">6</option>
						</select>
					</td>
				</tr>
                <tr>
					<td>Tarikh Mula Sewaan :</td>
					<td><style type="text/css">
@import url("../../../phpMyAdmin/libraries/css/clndr.css");
</style>
					</td>
				</tr>
                <tr>
					<td>Tarikh Akhir Sewaan :</td>
					<td><style type="text/css">
@import url("../../../phpMyAdmin/libraries/css/clndr.css");
</style>
					</td>
				</tr>
				
                <tr>
					<td>Syarikat Sewaan :</td>
					<td><input name="asset_place" value="" type="text" size="50" maxlength="50"></td>
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
					<td colspan="2">
						<input type="submit" name="asset" value="Tambah Aset" class="btn btn-info">
					</td>
				</tr>
			</table>
		</form>
				</div>
	
</body>
</html>