<?php 

require ('../connection.php');
session_start();

$id = $_GET['id'];

$sql = mysqli_query($myConnection,"SELECT `act_sponsorship`.*,`activity`.*,`sponsors`.* FROM `act_sponsorship` 
INNER JOIN  `sponsors` ON `act_sponsorship`.`sponsor_id` = `sponsors`.`Sps_id`
INNER JOIN  `activity` ON `act_sponsorship`.`act_id` = `activity`.`act_id`
WHERE `act_sponsorship`.`act_id` = '$id'") or die (mysqli_error($myConnection));
$row=mysqli_fetch_array($sql);

$name = $row['act_name'];
$Sps_name = $row['Sps_name'];
$sponsor_amount = $row['sponsor_amount'];
$sps_description = $row['sps_description'];

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

<script type="text/javascript">
  function clickButton1(){
             document.getElementById("btn1").click();
         }
</script>
</head>
<body onLoad="clickButton1()">

<!-- <h2>MAKLUMAT PENDIDIKAN</h2> -->
<p>NAMA AKTIVITI : <b><?php echo strtoupper($name); ?></b><br>

   <?php 
         
         $sql = mysqli_query($myConnection,"SELECT `act_sponsorship`.*,`activity`.*,`sponsors`.* FROM `act_sponsorship` 
          INNER JOIN  `sponsors` ON `act_sponsorship`.`sponsor_id` = `sponsors`.`Sps_id`
          INNER JOIN  `activity` ON `act_sponsorship`.`act_id` = `activity`.`act_id`
          WHERE `act_sponsorship`.`act_id` = '$id'") or die (mysqli_error());
         // $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));
         
          while($row = mysqli_fetch_assoc($sql))
          { 
            $name = $row['act_name'];
            $Sps_name = $row['Sps_name'];
            $sponsor_amount = $row['sponsor_amount'];
            $sps_description = $row['sps_description'];
      ?>
  <h3>NAMA PENAJA : <b><?php echo strtoupper($Sps_name); ?></h3>
  <div class="table-responsive-xl">
            <table class="table">
              <tr>
                <td> Nilai Tajaan :  </td>
                <td> <?php echo $sponsor_amount; ?> </td>
              </tr>
              <tr>
                <td> Penerangan Penaja :  </td>
                <td> <?php echo $sps_description; ?> </td>
              </tr>
            </table>
    </div>
  <?php } ?>
 
</body>
</html> 
