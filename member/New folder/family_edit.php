<?php
	session_start(); 
	require ('../connection.php');
    $familyIc = $_GET['family_ic'];

    $sql = "SELECT * FROM `family` WHERE `family_ic` = '$familyIc'";
            $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
   
    while($row = mysqli_fetch_assoc($result))
    { 

    	$name = $row['family_name'];
    	$ic = $row['family_ic'];
    	$add = $row['family_address'];
    	$phone = $row['family_phone'];
    	$gender = $row['family_gender'];
    	$email = $row['family_email'];
    	$dob = $row['family_dob'];
    	$rel = $row['family_relation'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>UPDATE FAMILY</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	
	<div align="center">
	<h1><br>UPDATE FAMILY</h1></br>
	<a href="Index.php"> HOME </a> <br><br>
	<form action="controller.php" method="post">
			<TABLE border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td>Family Name :</td>
					<td><input name="family_name" value="<?php echo $name; ?>" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Family NRIC :</td>
					<td><input name="family_ic" value="<?php echo $ic; ?>" type="text" size="50" maxlength="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required ></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input name="family_address" value="<?php echo $add; ?>" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Contact Number :</td>
					<td><input name="family_phone" value="<?php echo $phone; ?>" type="text" size="50" onkeypress="return isNumeric(event)"
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
						<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
							<option value="Lelaki">Lelaki</option>
							<option value="Perempuan">Perempuan</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><input name="family_email" value="<?php echo $email; ?>" type="text" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Date Of Birth :</td>
					<td><input name="family_dob" value="<?php echo $dob; ?>" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Status :</td>
					<td>
						<select name="family_relation">
							<option value="<?php echo $rel; ?>" ><?php echo $rel; ?></option>
							<option value="Father" >FATHER</option>
							<option value="Mother">MOTHER</option>
							<option value="Son" >SON</option>
							<option value="Daughter">DAUGHTER</option>
                            <option value="Husband" >HUSBAND</option>
							<option value="Wife">WIFE</option>
						</select>
					</td>
				</tr>
				
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="update_family" value="Update" class="btn btn-info">
					</td>
				</tr>
		</TABLE>
	</form>
				</div>

				<?php
                  }
                  ?>
	
</body>
</html>