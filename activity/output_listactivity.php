<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
          <p>
              <?php
                                     
                $sql = "SELECT * FROM `act_activity` WHERE `act_type` = '$act_type' ORDER BY `act_date` ASC";
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                if (mysqli_num_rows($result)==0){
                     echo "No result found";
                  } else {
            ?>
</p>
          <p>SENARAI AKTIVITI </p>
            <table  border="1" >
                <thead bgcolor="#57A0D2" width ="100%">
                  <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>
                    Aktiviti
                    </center></th>
                    <th scope="col"><center>
                    Tarikh
                    </center></th>
                    <th scope="col"><center>
                    Tempat
                    </center></th>
                    <th scope="col"><center>
                     Ahli
                    </center></th>
                    <th scope="col"><center>
                    Penerangan
                    </center></th>
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
                        <td><center><?php echo $row['act_type']; ?></center></td>
                        <td><center><?php echo $row['act_days']; ?></center></td>
                        <td><center><?php echo $row['event_venue']; ?></center></td>
                         <td><center><?php echo $row['member_name']; ?></center></td>
                        <td><center><td><center><button onclick="location.href='family_edit.php?family_ic=<?php echo $row['event_desc']; ?>';">Maklumat</button></center></td>
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