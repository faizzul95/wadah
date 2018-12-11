<?php 

require ('../connection.php');
session_start();

$memberIC = $_GET['member_ic'];

$id = $_GET['famIC'];

$sql = mysqli_query($myConnection,"SELECT `family`.*,`education_info`.* FROM `member` 
INNER JOIN  `education_info` ON `member`.`mbr_ic` = `education_info`.`member_ic`
WHERE `mbr_ic` = '$id'") or die (mysqli_error());
$row=mysqli_fetch_array($sql);

$name = $row['mbr_name'];
$ic = $row['mbr_ic'];
$last = $row['edu_end_date'];
$level = $row['edu_level'];

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
<title>Admin | Education</title>
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
    $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$id' AND `edu_end_date` != 'Semasa'";
    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
      if (mysqli_num_rows($result)!=0){ ?>
              <button class="tablinks" onclick="openCity(event, 'History')">Senarai Pendidikan</button>
  <?php } ?>
  <?php
    $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$id' AND `edu_end_date` = 'Semasa'";
    $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
      if (mysqli_num_rows($result)!=0){ ?>
              <button class="tablinks" onclick="openCity(event, 'Current')">Pendidikan Semasa</button>
  <?php } ?>
      
    

</div>

<div id="History" class="tabcontent">

   <?php 
         $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$id' AND `edu_end_date` != 'Semasa'";
         $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
         
          while($row = mysqli_fetch_assoc($result))
          { 
            $edu_name = $row['edu_name'];
            $edu_address = $row['edu_address'];
            $edu_phone = $row['edu_phone'];
            $edu_course = $row['edu_course'];
            $edu_start_date = $row['edu_start_date'];
            $edu_end_date = $row['edu_end_date'];
            $edu_level = $row['edu_level'];
      ?>
  <h3><?php echo $edu_level; ?></h3>
  <div class="table-responsive-xl">
            <table class="table">
              <tr>
                <td> Nama Institusi :  </td>
                <td> <?php echo $edu_name; ?> </td>
              </tr>
              <tr>
                <td> Alamat Institusi :  </td>
                <td> <?php echo $edu_address; ?> </td>
              </tr>
              <tr>
                <td> No Telefon Institusi :  </td>
                <td> <?php if ($row['edu_phone'] == 0) {
                         echo "";
                        } else echo $row['edu_phone']; 
                   ?> 
                 </td>
              </tr>
              <tr>
                <td> Kursus :  </td>
                <td> <?php echo $edu_course; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Mula Belajar :  </td>
                <td> <?php echo $edu_start_date; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Graduasi :  </td>
                <td> <?php echo $edu_end_date; ?> </td>
              </tr>
            </table>
    </div>
  <?php } ?>
</div>

<div id="Current" class="tabcontent">
   <?php 
         $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$id' AND `edu_end_date` = 'Semasa'";
         $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
         
          while($row = mysqli_fetch_assoc($result))
          { 
            $edu_name = $row['edu_name'];
            $edu_address = $row['edu_address'];
            $edu_phone = $row['edu_phone'];
            $edu_course = $row['edu_course'];
            $edu_start_date = $row['edu_start_date'];
            $edu_end_date = $row['edu_end_date'];
            $edu_level = $row['edu_level'];
      ?>
      <h3><?php echo $edu_level; ?></h3>
          <div class="table-responsive-xl">
            <table class="table">
              <tr>
                <td> Nama Institusi :  </td>
                <td> <?php echo $edu_name; ?> </td>
              </tr>
              <tr>
                <td> Alamat Institusi :  </td>
                <td> <?php echo $edu_address; ?> </td>
              </tr>
              <tr>
                <td> No Telefon Institusi :  </td>
                <td> <?php if ($row['edu_phone'] == 0) {
                         echo "";
                        } else echo $row['edu_phone']; 
                   ?> 
                 </td>
              </tr>
              <tr>
                <td> Kursus :  </td>
                <td> <?php echo $edu_course; ?> </td>
              </tr>
              <tr>
                <td> Tarikh Mula Belajar :  </td>
                <td> <?php echo $edu_start_date; ?> </td>
              </tr>
            </table>
          </div>
    <?php } ?>
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


