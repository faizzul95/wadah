<?php 

require ('../connection.php');
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

$memberIC = $_GET['member_ic'];

$sql = "SELECT `member`.*,`family`.* FROM `member` 
INNER JOIN  `family` ON `member`.`mbr_ic` = `family`.`member_ic`
WHERE `member_ic` = '$memberIC'";
$result = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
while($row = mysqli_fetch_assoc($result))
  { 
      $name = $row['mbr_name'];
      $ic = $row['mbr_ic'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Children</title>
	<script type="text/javascript">
		<?php include '../js/input_restriction.js';?>
	</script>
</head>
<body>

<button onclick="location.href='../logout.php';">Logout</button><br>
<button onclick="location.href='admin.php';">Back To Home</button>
<h1>LIST OF CHILDREN</h1>

<p>FATHER/MOTHER NAME : <?php echo strtoupper($name); ?><br>
  INDENTITY CARD NUMBER : <?php echo $ic; ?></p>

            <table border="1">
                <thead>
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Name</center></th>
                    <th scope="col"><center>IC Number</center></th>
                    <th scope="col"><center>Phone Number</center></th>
                    <th scope="col"><center>Date Of Birth</center></th>
                    <th scope="col"><center>Address</center></th>
                    <th scope="col"><center>Gender</center></th>
                    <th scope="col"><center>Email</center></th>
                    <th scope="col"><center>Relation</center></th>
                    <th scope="col"><center>Education Info</center></th>
                    <th scope="col"><center>Occupation Info</center></th>
                    <th scope="col"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                                         
                  <?php
                                     
                $sql = "SELECT * FROM `family` WHERE `member_ic` = '$memberIC'";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
                // var_dump($sql);die;
                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  }
                else{
	                $count = 1;
	                while($row = mysqli_fetch_assoc($result))
	                 { 
	                  ?>
	                      <tr>
	                        <th scope="row"><center><?php echo $count; ?></center></th>
	                        <td><center><?php echo $row['family_name']; ?></center></td>
	                        <td><center><?php echo $row['family_ic']; ?></center></td>
	                        <td><center><?php echo $row['family_phone']; ?></center></td>
	                        <td><center><?php echo $row['family_dob']; ?></center></td>
                          <td><center><?php echo $row['family_address']; ?></center></td>
                          <td><center><?php echo $row['family_gender']; ?></center></td>
                          <td><center><?php echo $row['family_email']; ?></center></td>
                          <td><center><?php echo $row['family_relation']; ?></center></td>
                          
	                        <td><center><button onclick="location.href='occupation_registration.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='list_education.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='family_edit.php?family_ic=<?php echo $row['family_ic']; ?>';">Update</button></center></td>
	                      </tr>
	                    <?php
	                    $count++;
	                  }
	                 } echo "<small>Shows ".$count." to ".$count." entries</small";
                  ?>

                  </tbody>
                </table>



<?php } ?>
</body>
</html>