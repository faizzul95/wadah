<?php
	session_start(); 

	if(!isset($_SESSION['member_id'])) // If session is not set then redirect to home
    {
       header("Location:../logout.php");  
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTER FAMILY</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	
	<div align="center">
	<h1><br>REGISTER FAMILY</h1></br>
	<a href="Index.php"> HOME </a> <br><br>
	<form action="controller.php" method="post">
		<input name="mbr_ic" type="hidden" value="<?php echo $_SESSION["memberIC"];?>" >
			<table border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center><b>FAMILY INFORMATION</b></center></td> 
				</tr>
				<tr>
					<td>Family Name :</td>
					<td><input name="family_name" value="" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Family NRIC :</td>
					<td><input name="family_ic" value="" type="text" size="50" maxlength="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required ></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input name="family_address" value="" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Contact Number :</td>
					<td><input name="family_phone" value="" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12">
					</td>
				</tr>
				<tr>
					<td>Gender :</td><td>
					<select name="family_gender" required>
						<option value="">- Jantina -</option>
							<option value="Lelaki">Lelaki</option>
							<option value="Perempuan">Perempuan</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><input name="family_email" value="" type="text" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Date Of Birth :</td>
					<td><input name="family_dob" value="" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Status :</td>
					<td>
						<select name="family_relation">
							<option value="" >Select</option>
							<option value="Father" >FATHER</option>
							<option value="Mother">MOTHER</option>
							<option value="Son" >SON</option>
							<option value="Daughter">DAUGHTER</option>
                            <option value="Husband" >HUSBAND</option>
							<option value="Wife">WIFE</option>
						</select>
					</td>
				</tr>
			<!-- Register family occupation -->
				<tr>
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
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="reg_family" value="Add Family" class="btn btn-info">
					</td>
				</tr>
			</table>
		</form>
				</div>
	
</body>
</html>