<?php
	session_start(); 
	$member_ic = $_SESSION['memberIC'];
	if(isset($_GET['member_ic'])) 
    {
      $member = $_GET['member_ic'];
    }
    elseif ($_GET['family_ic']) {
     $family = $_GET['family_ic'];
    }

?>