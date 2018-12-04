<?php 

require ('../connection.php');
session_start();

$memberIC = $_GET['member_ic'];

$sql = mysqli_query($myConnection,"SELECT `member`.*,`education_info`.* FROM `member` 
INNER JOIN  `education_info` ON `member`.`mbr_ic` = `education_info`.`member_ic`
WHERE `mbr_ic` = '$memberIC'") or die (mysqli_error());
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

<h2>EDUCATION INFORMATION</h2>
<p>FATHER/MOTHER NAME : <?php echo strtoupper($name); ?><br>
  INDENTITY CARD NUMBER : <?php echo $ic; ?></p>

<div class="tab">
  <?php if ($last != NULL) { ?>
    <button class="tablinks" onclick="openCity(event, 'History')">History</button>
  <?php } ?>
  <button class="tablinks" onclick="openCity(event, 'Current')"><?php echo $level; ?> (current)</button>
</div>

<div id="History" class="tabcontent">
  <h3>History</h3>
  <p>History is the capital city of England.</p>
</div>

<div id="Current" class="tabcontent">
  <h3>Current</h3>
  <p>Current is the capital of France.</p> 
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
