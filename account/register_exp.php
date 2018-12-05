<?php
	session_start(); 

	// if(!isset($_SESSION['member_id'])) // If session is not set then redirect to home
 //    {
 //       header("Location:logout.php");  
 //    }
   if($_SESSION['role'] != "admin") // if not admin redirect to home
    {
       echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Anda tidak mempunyai akses ke menu Admin.')
          window.location = 'logout.php';
          </SCRIPT>");  
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pendaftaran Pembelanjaan</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>
<body>
	<div align="center">
	<h1><br>
	PENDAFTARAN PEMBELANJAAN</h1>
	</br>
	<a href="admin.php"> LAMAN UTAMA</a> <br><br>
	<TABLE border="1" cellpadding="5" cellspacing="2">
		<form method="post" action="controller.php">
				<tr>
					<td>Nama :</td>
					<td><input name="mbr_name" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "60"></td>
				</tr>
				<tr>
					<td height="46">Tarikh :</td>
					<td><input name="date" type="date" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required ></td>
				</tr>
				<tr>
					<td>Jenis :</td>
					<td><input name="exp_type" type="text" size="50" maxlength="50" oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "150" required></td>
				</tr>
				<tr>
					<td>Baki :</td><td>	
					<input name="exp_outstanding" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required>
					</td>
				
				<tr>
					<td>Penerangan :</td><td>	
					<input name="exp_desc" type="txt" size="100" oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "40" required>
					</td>
				</tr>
				
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="" value="Daftar Pembelanjaan">
					</td>
				</tr>
			</form>
	</TABLE>
	
				</div>
</body>
</html>