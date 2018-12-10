<?php
   session_start(); 
   include ("../connection.php");
   // Turn off error reporting
   // if client using php 5 and below
   error_reporting(0);

   $member_ic = $_SESSION['memberIC'];
   $id = $_GET['member_ic'];

   $result = $myConnection->query("SELECT * FROM `member` WHERE `mbr_ic` = '$member_ic'"); 
   $row = $result->fetch_assoc();
   $mmbrName = $row['mbr_name'];
   $mmbrIC = $row['mbr_ic'];
   $profileimage = $row['mbr_profile_picture'];
   $mbr_address = $row['mbr_address'];
   $mbr_phone = $row['mbr_phone'];
   $mbr_branch = $row['mbr_branch'];
   $mbr_email = $row['mbr_email'];

   $sql = mysqli_query($myConnection,"SELECT `member`.*,`education_info`.* FROM `member` 
   INNER JOIN  `education_info` ON `member`.`mbr_ic` = `education_info`.`member_ic`
   WHERE `mbr_ic` = '$id'") or die (mysqli_error());
   $row=mysqli_fetch_array($sql);
   $edu_id = $row['edu_id'];
   $edu_name = $row['edu_name'];
   $edu_address = $row['edu_address'];
   $edu_phone = $row['edu_phone'];
   $edu_course = $row['edu_course'];
   $edu_level = $row['edu_level'];
   $edu_start_date = $row['edu_start_date'];
   $edu_end_date = $row['edu_end_date'];
   

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Wadah | Cetak</title>
</head>
<body onload="window.print();">
  <!-- <body> -->
    <div class="wrapper">
      <!-- Main content -->
      <section class="cetak">
        <center>
          <table border="1" style="width:80%" cellpadding="0" cellspacing="0">
            
            <tr>
              <td rowspan="7" width="20%"> <img title=" " alt=" " src="img/<?php echo $profileimage ?>" height="300px" width="300px" /></td>
              <td colspan="2" bgcolor="blue"> <center><b>MAKLUMAT PERIBADI</b></center></td>
            </tr>

             <tr>
              <td><center> Nama </center></td>
              <td> <center><?php echo $mmbrName; ?></center></td>
            </tr>

             <tr>
              <td><center> No Kad Pengenalan</center></td>
              <td><center><?php echo $mmbrIC; ?></center></td>
            </tr>

             <tr>
              <td><center> Alamat</center></td>
              <td> <center><?php echo $mbr_address; ?></center></td>
            </tr>

             <tr>
              <td><center> No Telefon</center></td>
              <td> <center><?php echo $mbr_phone; ?></center></td>
            </tr>

             <tr>
              <td><center> Email </center></td>
              <td> <center><?php echo $mbr_email; ?></center></td>
            </tr>

             <tr>
              <td><center> Cawangan</center></td>
              <td> <center><?php echo $mbr_branch; ?></center></td>
            </tr>
          </table>

          <br>




             <table border="1" style="width:80%" cellpadding="0" cellspacing="0">

            <tr>
              <td colspan="2"><center> MAKLUMAT PELAJARAN </center></td>
            </tr>
            
             <tr>
              <td><center> Nama Institusi </center></td>
              <td> <center><?php echo $edu_name; ?></center></td>
            </tr>

             <tr>
              <td><center> Alamat Institusi</center></td>
              <td><center><?php echo $edu_address; ?></center></td>
            </tr>

             <tr>
              <td><center> Alamat</center></td>
              <td> <center><?php echo $edu_phone; ?></center></td>
            </tr>

             <tr>
              <td><center> Kursus </center></td>
              <td> <center><?php echo $edu_course; ?></center></td>
            </tr>

             <tr>
              <td><center> Tahap Pendidikan</center></td>
              <td> <center><?php echo $edu_level; ?></center></td>
            </tr>

            <tr>
              <td><center> Tarikh Mula Belajar</center></td>
              <td> <center><?php echo $edu_start_date; ?></center></td>
            </tr>

             <tr>
              <td><center> Tarikh Tamat Belajar</center></td>
              <td> <center><?php echo $edu_end_date; ?></center></td>
            </tr>
          </table>


          <?php 

                 $id = $_GET['member_ic'];

                 $sql = mysqli_query($myConnection,"SELECT `member`.*,`education_info`.* FROM `member` 
                 INNER JOIN  `education_info` ON `member`.`mbr_ic` = `education_info`.`member_ic`
                 WHERE `mbr_ic` = '$id'");
                $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                var_dump($sql);die;

                while($row = mysqli_fetch_array($result))
                  { 
                     $edu_id = $row['edu_id'];
                     $edu_name = $row['edu_name'];
                     $edu_address = $row['edu_address'];
                     $edu_phone = $row['edu_phone'];
                     $edu_course = $row['edu_course'];
                     $edu_level = $row['edu_level'];
                     $edu_start_date = $row['edu_start_date'];
                     $edu_end_date = $row['edu_end_date'];

               ?>
                   <br>
                   <table border="1" style="width:80%" cellpadding="0" cellspacing="0">

                  <tr>
                    <td colspan="2"><center> MAKLUMAT PELAJARAN </center></td>
                  </tr>
                  
                   <tr>
                    <td><center> Nama Institusi </center></td>
                    <td> <center><?php echo $edu_name; ?></center></td>
                  </tr>

                   <tr>
                    <td><center> Alamat Institusi</center></td>
                    <td><center><?php echo $edu_address; ?></center></td>
                  </tr>

                   <tr>
                    <td><center> Alamat</center></td>
                    <td> <center><?php echo $edu_phone; ?></center></td>
                  </tr>

                   <tr>
                    <td><center> Kursus </center></td>
                    <td> <center><?php echo $edu_course; ?></center></td>
                  </tr>

                   <tr>
                    <td><center> Tahap Pendidikan</center></td>
                    <td> <center><?php echo $edu_level; ?></center></td>
                  </tr>

                  <tr>
                    <td><center> Tarikh Mula Belajar</center></td>
                    <td> <center><?php echo $edu_start_date; ?></center></td>
                  </tr>

                   <tr>
                    <td><center> Tarikh Tamat Belajar</center></td>
                    <td> <center><?php echo $edu_end_date; ?></center></td>
                  </tr>
                </table>
          <?php } ?>
         

        </center>
      </section>
    </div>
</body>
</html>
