<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
            <?php
                                     
                $sql = "SELECT * FROM `occupation_info` WHERE `member_ic` = '$member_ic' ORDER BY `company_end_date` DESC";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  }else{
            ?>
            <table border="1">
                <thead  bgcolor="#57A0D2">
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Company Name</center></th>
                    <th scope="col"><center>Company Address</center></th>
                    <th scope="col"><center>Company Phone</center></th>
                    <th scope="col"><center>Company Email</center></th>
                    <th scope="col"><center>Position</center></th>
                    <th colspan="2" scope="col"><center>Work</center></th>
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
                        <td><center><?php echo $row['company_name']; ?></center></td>
                        <td><center><?php echo $row['company_address']; ?></center></td>
                        <td><center><?php echo $row['company_phone']; ?></center></td>
                        <td><center><?php echo $row['company_email']; ?></center></td>
                        <td><center><?php echo $row['company_position']; ?></center></td>
                        <td colspan="2"><center><?php echo $row['company_start_date']; ?> - <?php echo $row['company_end_date']; ?></center></td>
                        <td><center>
                            <button onclick="location.href='occupation_update.php?occupation_id=<?php echo $row['occupation_id']; ?>';">Update</button>
                            <form method="post" action="controller.php">
                              <input type="hidden" name="delete_id" value="<?php echo $row['occupation_id']; ?>">
                              <input type="submit" name="delete_occupation" value="Delete">
                            </form>
                          </center></td>
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