<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>
<div align="center"><br>
  <br>
  <br>
  <br>
  <br>
  <table border="1">
    <thead>
      <tr>
        <th scope="col"><center>
          No.
        </center></th>
        <th scope="col"><center>
          Aktiviti
        </center></th>
        <th scope="col"><center>
          Topik
        </center></th>
        <th scope="col"><center>
          Tempat
        </center></th>
        <th scope="col"><center>
          Tarikh/Masa
        </center></th>
        <th scope="col"><center>
          Nama Penceramah/NAqib
        </center></th>
        </tr>
      </thead>
    <tbody>
      
      <?php
                                     
                $sql = "SELECT * FROM `family` WHERE `mbr_ic` = '$member_ic' ORDER BY `family_dob` ASC";
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
        <td><center><?php echo $row['family_name']; ?></center></td>
        <td><center><?php echo $row['family_ic']; ?></center></td>
        <td><center><?php echo $row['family_phone']; ?></center></td>
        <td><center><?php echo $row['family_relation']; ?></center></td>
        <td><center><button onclick="location.href='occupation_registration.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
        </tr>
      <?php
                    $count++;
                  }
                  ?>
      
      </tbody>
    </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<footer class="footer">
			<?php include '../style/footer.php'; ?>
		</footer>

</body>
</html>