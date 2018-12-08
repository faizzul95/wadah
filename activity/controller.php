<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register aktiviti
if (isset($_POST['register_aktiviti']))
{
 
    
    $act_type = mysqli_real_escape_string($myConnection, $_POST['act_type']);
    $act_topic = mysqli_real_escape_string($myConnection, $_POST['act_topic']);
    $act_venue = mysqli_real_escape_string($myConnection, $_POST['act_venue']);
    $act_time = mysqli_real_escape_string($myConnection, $_POST['act_time']);
    $naqib_name = mysqli_real_escape_string($myConnection, $_POST['naqib_name']);
	

            $query_feeinfo = "INSERT INTO `activity` 
            (`act_type`,`act_topic`,`act_venue`,`act_time`,`naqib_name`)
               VALUES 
            ('$act_type','$act_topic','$act_venue','$act_time','$naqib_name')";
            $result = mysqli_query($myConnection, $query_feeinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'register_activity_ouput.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}
		
// register naqib
if (isset($_POST['register_naqib']))
{
 
    $naqib_id = mysqli_real_escape_string($myConnection, $_POST['naqib_id']);
    $naqib_name = mysqli_real_escape_string($myConnection, $_POST['naqib_name']);
    $naqib_phone = mysqli_real_escape_string($myConnection, $_POST['naqib_phone']);
    $naqib_mail = mysqli_real_escape_string($myConnection, $_POST['naqib_mail']);

            $query_feeinfo = "INSERT INTO `act_naqib` 
            (`naqib_id`,`naqib_name`,`naqib_phone`,`naqib_mail`)
               VALUES 
            ('$naqib_id','$naqib_name','$naqib_phone','$naqib_mail')";
			
            $result = mysqli_query($myConnection, $query_feeinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'register_naqib_output.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}
// register penceramah
if (isset($_POST['register_penceramah']))
{
 
    $speak_id = mysqli_real_escape_string($myConnection, $_POST['speak_id']);
    $speak_name = mysqli_real_escape_string($myConnection, $_POST['speak_name']);
    $speak_position = mysqli_real_escape_string($myConnection, $_POST['speak_position']);
    $speak_phone = mysqli_real_escape_string($myConnection, $_POST['speak_phone']);
    $speak_mail = mysqli_real_escape_string($myConnection, $_POST['speak_mail']);

            $query_expinfo = "INSERT INTO `act_speak` 
            (`speak_id`,`speak_name`,`speak_position`,`speak_phone`,`speak_mail`)
               VALUES 
            ('$speak_id','$speak_name','$speak_position','$speak_phone','$speak_mail')";
			
            $result = mysqli_query($myConnection, $query_expinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'register_penceramah_output.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}


// register public
if (isset($_POST['register_public']))
{
 
    $public_id = mysqli_real_escape_string($myConnection, $_POST['public_id']);
    $public_name = mysqli_real_escape_string($myConnection, $_POST['public_name']);
    $public_add = mysqli_real_escape_string($myConnection, $_POST['public_add']);
    $public_phone = mysqli_real_escape_string($myConnection, $_POST['public_phone']);
    

            $query_expinfo = "INSERT INTO `act_public` 
            (`public_id`,`public_name`,`public_add`,`public_phone`)
               VALUES 
            ('$public_id','$public_name','$public_add','$public_phone')";
			
            $result = mysqli_query($myConnection, $query_expinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'register_public_output.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}
?>

