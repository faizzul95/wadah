<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
        <?php
                                     
                $sql = "SELECT * FROM `maintenance`";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  }else{
          ?>
            <table border="1">
                <thead bgcolor="#57A0D2">
                  <tr>
                    <th scope="col"><center>#</center></th>
                    <th scope="col"><center>Id Penyelenggaraan</center></th>
                    <th scope="col"><center>Tahap Penyelenggaraan</center></th>
                    <th scope="col"><center>Kos Penyelenggaraan</center></th>
                    <th scope="col"><center>Tempat Penyelenggaraan</center></th>
                    <th scope="col"><center>Tempoh Hari Penyelenggaraan</center></th>
                    <th colspan="2" scope="col"><center>Penerangan Penyelenggaraan</center></th>
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
                        <td><center><?php echo $row['maintenance_id']; ?></center></td>
                        <td><center><?php echo $row['maintenance_status']; ?></center></td>
                        <td><center><?php echo $row['maintenance_cost']; ?></center></td>
                        <td><center><?php echo $row['asset_place']; ?></center></td>
                        <td><center><?php echo $row['asset_desc']; ?></center></td>
                        <td colspan="2"><center><?php echo $row['edu_start_date']; ?> - <?php echo $row['edu_end_date']; ?></center></td>
                        <td><center>
                            <button onclick="location.href='asset_update.php?edu_id=<?php echo $row['asset_id']; ?>';">Update</button>
                            <form method="post" action="../member/controller.php">
                              <input type="hidden" name="delete_id" value="<?php echo $row['edu_id']; ?>">
                              <input type="submit" name="delete_asset" value="Delete">
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