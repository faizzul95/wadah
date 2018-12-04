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
<title>REGISTER OCCUPATION</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
</script>
</head>

<body>
	<div align="center">
	<h1><br>REGISTER OCCUPATION</h1></br>
	<a href="index.php"> HOME </a> <br><br>
	<form action="controller.php" method="post">
			<?php if (isset($member)) { ?>
				<input name="member_ic" type="text" value="<?php echo $member;?>" size="50" maxlength="50">
			<?php } else { ?>
				<input name="family_ic" type="text" value="<?php echo $family;?>" size="50" maxlength="50">
			<?php } ?>
			<TABLE border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center><b>OCCUPATION INFO</b></center></td> 
				</tr>
				<tr>
					<td>Company Name :</td>
					<td><input name="company_name" type="text" size="50" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Company Address :</td>
					<td><input name="company_address" type="text" size="50" maxlength="50" required></td>
				</tr>
				<tr>
					<td>Company Phone :</td>
					<td><input name="company_phone" type="text" size="50" onkeypress="return isNumeric(event)"
                         oninput="maxLengthCheck(this)"
                         type = "text"
                         maxlength = "12"
                         min = "1"
                         max = "12"></td>
				</tr>
				<tr>
					<td>Company Email :</td>
					<td><input name="company_email" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Position :</td><td>	
					<input name="company_position" type="text" size="50" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td>Start Working :</td>
					<td><input name="company_start_date" type="date" size="50" maxlength="50" required>
					</td>
				</tr>
				<tr>
					<td>End Working :</td>
					<td><input name="company_end_date" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="reg_job" value="Add Occupation" class="btn btn-info">
					</td>
				</tr>
			</TABLE>
		</form>
				</div>
	
</body>
</html>