<!--php
	session_start(); 

	if(!isset($_SESSION['asset_id'])) // If session is not set then redirect to home
    {
       header("Location:../logout.php");  
    }
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER ASSET</title>

</head>

<body>
	
	<div align="center">
	<h1><br>
	  DAFTAR ASET</h1></br>
	<a href="../asset/user_asset_reg.php"> HOME </a> <br><br>
	<form action="../asset/controller.php" method="post">
		
			<table border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center><b>MAKLUMAT ASET</b></center></td> 
				</tr>
				<tr>
					<td>Jenis Aset :</td>
					<td><input name="asset_type" value="" type="text" size="50" maxlength="50"></td>
				</tr>		
                <tr>
					<td>Status Aset:</td>
					<td>
					<select name="asset_status" required>
						<option value="">- Pilih -</option>
							<option value="Sangat Bagus">Sangat Bagus</option>
							<option value="Bagus">Bagus</option>
                            <option value="Sederhana">Sederhana</option>
                            <option value="Tidak Memuaskan">Tidak Memuaskan</option>
                            <option value="Sangat Tidak Memuaskan">Sangat Tidak Memuaskan</option>
					</select>
					</td>
				</tr>
                <tr>
					<td>Kuantiti Aset :</td>
					<td>
						<select name="asset_quantity">
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
					<td>Lokasi Aset :</td>
					<td><input name="asset_place" value="" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Penerangan Aset :</td>
					<td><input name="asset_desc" value="" type="text" size="50" maxlength="50">
					</td>
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
						<input type="submit" name="register_asset" value="Tambah Aset" class="btn btn-info">
					</td>
				</tr>
			</table>
		</form>
				</div>
	
</body>
</html>