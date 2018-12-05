<?php 

require ('../connection.php');
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Home</title>
	<script type="text/javascript">
		<?php include '../js/input_restriction.js';?>
	</script>
</head>
<body>

<button onclick="location.href='../logout.php';">Logout</button><br>
<h1>LIST OF ALL MEMBERS</h1>
            <table border="1">
                <thead>
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Name</center></th>
                    <th scope="col"><center>IC Number</center></th>
                    <th scope="col"><center>Phone Number</center></th>
                    <th scope="col"><center>Branch</center></th>
                    <th scope="col"><center>Children Info</center></th>
                    <th scope="col"><center>Education Info</center></th>
                    <th scope="col"><center>Occupation Info</center></th>
                    <th scope="col"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                                         
                  <?php
                                     
                $sql = "SELECT * FROM `member`";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

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
	                        <td><center><?php echo $row['mbr_name']; ?></center></td>
	                        <td><center><?php echo $row['mbr_ic']; ?></center></td>
	                        <td><center><?php echo $row['mbr_phone']; ?></center></td>
	                        <td><center><?php echo $row['mbr_branch']; ?></center></td>
	                        <td><center><button onclick="location.href='occupation_registration.php?mbr_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='list_education.php?mbr_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='family_edit.php?mbr_ic=<?php echo $row['mbr_ic']; ?>';">Detail</button></center></td>
	                        <td><center><button onclick="location.href='family_edit.php?mbr_ic=<?php echo $row['mbr_ic']; ?>';">Edit</button></center></td>
	                      </tr>
	                    <?php
	                    $count++;
	                  }
	                 } echo "<small>Shows ".$count." to ".$count." entries</small";
                  ?>

                  </tbody>
                </table>
</body>
</html>