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
<title>REGISTER MEMBER</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>
<body>
	<div align="center">
	<h1><br>REGISTER MEMBER</h1></br>
	<a href="admin.php"> HOME </a> <br><br>
	<TABLE border="1" cellpadding="5" cellspacing="2">
		<form method="post" action="controller.php">
				<tr>
					<td>Name :</td>
					<td><input name="mbr_name" type="text" size="50" maxlength="50" required oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "60"></td>
				</tr>
				<tr>
					<td>NRIC :</td>
					<td><input name="mbr_ic" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required ></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input name="mbr_address" type="text" size="50" maxlength="50" oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "150" required></td>
				</tr>
				<tr>
					<td>Contact Number :</td><td>	
					<input name="mbr_phone" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required>
					</td>
				</tr>
				<tr>
					<td>Gender :</td><td>
					<select name="mbr_gender" required>
						<option value="">- Jantina -</option>
							<option value="Lelaki">Lelaki</option>
							<option value="Perempuan">Perempuan</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Email :</td><td>	
					<input name="mbr_email" type="email" size="50" oninput="maxLengthCheck(this)"
                     type = "text"
                     maxlength = "40" required>
					</td>
				</tr>
				<tr>
					<td>Date Of Birth :</td><td>	
					<input name="mbr_dob" type="date" size="50" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td>Branch :</td><td>	
					<input name="mbr_branch" type="text" size="50" maxlength="25" required>
					</td>
				</tr>
				<tr>
					<td>Password (default):</td><td>	
					<input type="password" value="wadah123" size="50" maxlength="50" disabled>
					</td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="reg_member" value="Register Member">
					</td>
				</tr>
			</form>
	</TABLE>
	
				</div>
</body>
</html>