<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
            <table border="1">
                <thead>
                  <tr>
                    <th scope="col"><center>#</center></th>
                    <th scope="col"><center>Name</center></th>
                    <th scope="col"><center>Address</center></th>
                    <th scope="col"><center>Phone</center></th>
                    <th scope="col"><center>Course</center></th>
                    <th scope="col"><center>Level</center></th>
                    <th colspan="2" scope="col"><center>Work</center></th>
                    <th scope="col"><center>Action</center></th>
                  </tr>
                </thead>
                <tbody>
                                         
                  <?php
                                     
                $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$member_ic' ORDER BY `edu_end_date` DESC";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  }
                $count = 1;
                while($row = mysqli_fetch_assoc($result))
                 {  
                  
                  ?>
                      <tr>
                        <th scope="row"><center><?php echo $count; ?></center></th>
                        <td><center><?php echo $row['edu_name']; ?></center></td>
                        <td><center><?php echo $row['edu_address']; ?></center></td>
                        <td><center><?php echo $row['edu_phone']; ?></center></td>
                        <td><center><?php echo $row['edu_course']; ?></center></td>
                        <td><center><?php echo $row['edu_level']; ?></center></td>
                        <td colspan="2"><center><?php echo $row['edu_start_date']; ?> - <?php echo $row['edu_end_date']; ?></center></td>
                        <td><center>
                            <button onclick="location.href='occupation_update.php?edu_id=<?php echo $row['edu_id']; ?>';">Update</button>
                            <form method="post" action="controller.php">
                              <input type="hidden" name="delete_id" value="<?php echo $row['edu_id']; ?>">
                              <input type="submit" name="delete_edu" value="Delete">
                            </form>
                          </center></td>
                      </tr>
                    <?php
                    $count++;
                  }
                  ?>

                  </tbody>
                </table>

</body>
</html>