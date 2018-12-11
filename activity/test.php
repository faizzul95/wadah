<?php

	session_start();

require ('../connection.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>TEST FILE</title>
</head>
<body>

<?php 


for($i=1; $i<=10; $i++)
{
	for($j=1; $j<=5; $j++)
	{
		$sql = "SELECT count(*) as val FROM `feedback` WHERE `q{$i}` = '$j'";
        $sql_rec = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
        $row = mysqli_fetch_array($sql_rec);
        $arr[$i][$j] = $row['val'];
        $total[$i] += $row['val'];
	}
}

for($i=1; $i<=10; $i++)
{
	echo "Question {$i}";
	for($j=1; $j<=5; $j++)
	{
		$result = ($arr[$i][$j] / $total[$i]) * 100;
		// echo "$arr[$i][$j] %";

		 echo '<pre>';
     		echo $result." %";
     	 echo '</pre>';
	}
}


?>
<div class="progress md-progress">
    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress md-progress">
    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress md-progress">
    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress md-progress">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</body>
</html>