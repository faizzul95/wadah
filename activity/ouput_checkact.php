<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
            <p> NAMA : <?php echo strtoupper($name); ?><br>
ALAMAT : <?php echo $ic; ?></p>
            <p>&nbsp;</p>
            <table border="1">
                <thead>
                  <tr>
                    <th width="24" scope="col"><center>
                    No
                    </center></th>
                    <th width="260" scope="col"><center>
                    Aktiviti
                    </center></th>
                    <th width="93" scope="col"><center>
                      Tarikh
                    </center></th>
                    <th width="192" scope="col"><center>
                    Penerangan
                    </center></th>
                  </tr>
                </thead>
                <tbody>
                                         
                  <?php
                                     
                $sql = "SELECT * FROM `act_activity` WHERE `member_name` = '$member_name' ORDER BY `member_add` DESC";
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
                        <td><center><?php echo $row['act_type']; ?></center></td>
                        <td><center><?php echo $row['act_date']; ?></center></td>
                        <td><center><?php echo $row['event_venue']; ?></center></td>
                      </tr>
                    <?php
                    $count++;
                  }
                  ?>

                  </tbody>
                </table>

</body>
</html>