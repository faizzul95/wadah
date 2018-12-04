<?php
	require ('../connection.php');
  session_start(); 
  $member_ic = $_SESSION['memberIC'];

 $result = $myConnection->query("SELECT * FROM `member` WHERE `mbr_ic` = '$member_ic'"); 
 $row = $result->fetch_assoc();
 $mmbrName = $row['mbr_name'];
 $mmbrIC = $row['mbr_ic'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>User | Home</title>
</head>
<body>
	<div align="center">
		Selamat Datang. <?php echo strtoupper($mmbrName); ?> ( <?php echo $mmbrIC; ?> ) &nbsp;
		<button onclick="location.href='../logout.php';">Logout</button> <br><br>

		<table border="1" width ="50%">
			<tr bgcolor="#5097A4">
				<td colspan="2"> <center><b>PERSONAL INFORMATION</b></center></td>
			</tr>
			<tr>
				<td width="70%" > Education : </td>
				<td> <button class="btn btn-default pull-right" onclick="location.href='user_edu_reg.php?member_ic=<?php echo $member_ic; ?>';">Register</button> </td>
				<!-- <td> <button onclick="location.href='user_edu_view.php?member_ic=<?php echo $member_ic; ?>';">View</button> </td> -->
			</tr>
			<tr>
				<td colspan="2"><?php include 'user_edu_list.php'; ?></center></td>
			</tr>
			<tr>
				<td>Occupation (Optional) : </td>
				<td> <button onclick="location.href='user_job_reg.php?member_ic=<?php echo $member_ic; ?>';">Register</button> </td>
				<!-- <td> <button onclick="location.href='user_job_view.php?member_ic=<?php echo $member_ic; ?>';">View</button> </td> -->
			</tr>
			<tr>
				<td colspan="2"><?php include 'user_job_list.php'; ?></center></td>
			</tr>
			<tr>
				<td colspan="2" width ="100%" bgcolor="#5097A4"> <center><b>FAMILY INFORMATION</b></center></td>
			</tr>
			<tr>
				<td> Register family : </td>
				<td> <button onclick="location.href='user_family_reg.php?member_ic=<?php echo $member_ic; ?>';">Register</button> </td>
				<!-- <td> <button onclick="location.href='user_family_view.php?member_ic=<?php echo $member_ic; ?>';">View</button> </td> -->
			</tr>
			<tr>
				<td colspan="2"><?php include 'user_family_list.php'; ?></center></td>
			</tr>
		</table>
	</div>
</body>
</html>