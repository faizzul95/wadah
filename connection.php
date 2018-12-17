<?php

$myConnection = new mysqli("localhost","root","","wadah");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>