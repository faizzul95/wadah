<?php 

require ('../connection.php');
session_start();

$id = $_GET['id'];

$sql = mysqli_query($myConnection,"SELECT `family`.*,`occupation_info`.* FROM `family` 
INNER JOIN  `occupation_info` ON `family`.`family_ic` = `occupation_info`.`family_ic`
WHERE `family`.`family_ic` = '$id'") or die (mysqli_error($myConnection));
$row=mysqli_fetch_array($sql);

$name = $row['family_name'];
$ic = $row['family_ic'];
$last = $row['company_end_date'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<title>Admin | Occupation</title>
  <script type="text/javascript">
    <?php include '../js/input_restriction.js';?>
  </script>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</head>
<body>

<!-- <h2>MAKLUMAT PENDIDIKAN</h2> -->
<p>NAMA : <b><?php echo strtoupper($name); ?></b><br>
  NO KAD PENGENALAN : <b><?php echo $ic; ?></b></p>

<div class="tab">
  <?php
    $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$id' AND `company_end_date` != 'Semasa'";
    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
      if (mysqli_num_rows($result)!=0){ ?>
              <button class="tablinks" onclick="openCity(event, 'History')">Senarai Pekerjaan</button>
  <?php } ?>
  <?php
    $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$id' AND `company_end_date` = 'Semasa'";
    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
      if (mysqli_num_rows($result)!=0){ ?>
              <button class="tablinks" onclick="openCity(event, 'Current')">Pekerjaan Semasa</button>
  <?php } ?>

</div>

<div id="History" class="tabcontent">

   <?php 
         $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$id' AND `company_end_date` != 'Semasa'";
         $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
         
          $count = 1;
          while($row = mysqli_fetch_assoc($result))
          { 
            $company_name = $row['company_name'];
            $company_address = $row['company_address'];
            $company_phone = $row['company_phone'];
            $company_position = $row['company_position'];
            $company_email = $row['company_email'];
            $company_start_date = $row['company_start_date'];
            $company_end_date = $row['company_end_date'];
      ?>
  <h3><?php echo "Pekerjaan ".$count; ?></h3>
  <div class="table-responsive-xl">
            <table class="table">
              <tr>
                <td> Nama Syarikat :  </td>
                <td> <?php echo $company_name; ?> </td>
              </tr>
              <tr>
                <td> Alamat Syarikat :  </td>
                <td> <?php echo $company_address; ?> </td>
              </tr>
              <tr>
                <td> No Telefon Syarikat :  </td>
                <td> <?php if ($row['company_phone'] == 0) {
                         echo "";
                        } else echo $row['company_phone']; 
                   ?> 
                 </td>
              </tr>
              <tr>
                <td> Jawatan / Posisi :  </td>
                <td> <?php echo $company_position; ?> </td>
              </tr>
              <tr>
                <td> Email Pekerjaan :  </td>
                <td> <?php echo $company_email; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Mula Bekerja :  </td>
                <td> <?php echo $company_start_date; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Berhenti Kerja :  </td>
                <td> <?php echo $company_end_date; ?> </td>
              </tr>
            </table>
    </div>
  <?php } ?>
</div>

<div id="Current" class="tabcontent">
   <?php 
         $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$id' AND `company_end_date` = 'Semasa'";
         $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
          $count = 1;
          while($row = mysqli_fetch_assoc($result))
          { 
            $company_name = $row['company_name'];
            $company_address = $row['company_address'];
            $company_phone = $row['company_phone'];
            $company_position = $row['company_position'];
            $company_email = $row['company_email'];
            $company_start_date = $row['company_start_date'];
            $company_end_date = $row['company_end_date'];
      ?>
      <h3><?php //echo $edu_level; ?></h3>
          <div class="table-responsive-xl">
            <table class="table">
              <tr>
                <td> Nama Syarikat :  </td>
                <td> <?php echo $company_name; ?> </td>
              </tr>
              <tr>
                <td> Alamat Syarikat :  </td>
                <td> <?php echo $company_address; ?> </td>
              </tr>
              <tr>
                <td> No Telefon Syarikat :  </td>
                <td> <?php if ($row['company_phone'] == 0) {
                         echo "";
                        } else echo $row['company_phone']; 
                   ?> 
                 </td>
              </tr>
              <tr>
                <td> Jawatan / Posisi :  </td>
                <td> <?php echo $company_position; ?> </td>
              </tr>
              <tr>
                <td> Email Pekerjaan :  </td>
                <td> <?php echo $company_email; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Mula Bekerja :  </td>
                <td> <?php echo $company_start_date; ?> </td>
              </tr>
            </table>
          </div>
    <?php $count++; } ?>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
 
</body>
</html> 
