<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
          <?php
                                     
                $sql = "SELECT * FROM `family` WHERE `member_ic` = '$member_ic' ORDER BY `family_dob` ASC";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  } else {
            ?>
            <table  border="1" >
                <thead bgcolor="#57A0D2" width ="100%">
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Family Name</center></th>
                    <th scope="col"><center>Family IC</center></th>
                    <th scope="col"><center>Family Phone</center></th>
                    <th scope="col"><center>Family Relation</center></th>
                    <th scope="col"><center>Occupation</center></th>
                    <th scope="col"><center>Education</center></th>
                    <th scope="col"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                                         
                  <?php
                                     
                $count = 1;
                while($row = mysqli_fetch_assoc($result))
                 { 
                  ?>
                      <tr>
                        <th scope="row"><center><?php echo $count; ?></center></th>
                        <td><center><?php echo $row['family_name']; ?></center></td>
                        <td><center><?php echo $row['family_ic']; ?></center></td>
                        <td><center><?php echo $row['family_phone']; ?></center></td>
                        <td><center><?php echo $row['family_relation']; ?></center></td>
                        <td><center><button onclick="location.href='occupation_registration.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
                        <td><center><button onclick="location.href='list_education.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
                        <td><center><button onclick="location.href='family_edit.php?family_ic=<?php echo $row['family_ic']; ?>';">Edit</button></center></td>
                      </tr>
                    <?php
                    $count++;
                  }
                  ?>

                <?php } ?>

                  </tbody>
                </table>

</body>
</html>