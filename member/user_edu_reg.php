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
	<h1><br>REGISTER EDUCATION</h1></br>
	<a href="user.php"> HOME </a> <br><br>
	<form action="controller.php" method="post">
			<?php if (isset($member)) { ?>
				<input name="member_ic" type="text" value="<?php echo $member;?>" size="50" maxlength="50">
			<?php } else { ?>
				<input name="family_ic" type="text" value="<?php echo $family;?>" size="50" maxlength="50">
			<?php } ?>
			<TABLE border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center><b>EDUCATION INFO</b></center></td> 
				</tr>
				<tr>
					<td>Name :</td>
					<td><input name="edu_name" type="text" size="50" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><input name="edu_address" type="text" size="50" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Phone :</td>
					<td><input name="edu_phone" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12" required></td>
				</tr>
				<tr>
					<td>Company Email :</td>
					<td><input name="edu_course" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Level :</td><td>
					<select name="edu_level" required>
						<option name="">-Select-</option>
						<option name="PMR">PMR</option>
						<option name="SPM">SPM</option>
						<option name="Diploma">Diploma</option>
						<option name="Ijazah">Ijazah</option>
					</select>
					</td>
				</tr>
				<tr>
					<td>Start Study :</td>
					<td><input name="edu_start_date" type="date" size="50" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td>Graduation:</td>
					<td><input name="edu_end_date" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="reg_edu" value="Add Education" class="btn btn-info">
					</td>
				</tr>
			</TABLE>
		</form>
				</div>
	
</body>
</html>