<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register aktiviti
if (isset($_POST['register_aktiviti']))
{
 
    $act_id = mysqli_real_escape_string($myConnection, $_POST['act_id']);
    $act_type = mysqli_real_escape_string($myConnection, $_POST['act_type']);
    $act_topic = mysqli_real_escape_string($myConnection, $_POST['act_topic']);
    $act_venue = mysqli_real_escape_string($myConnection, $_POST['act_venue']);
    $act_time = mysqli_real_escape_string($myConnection, $_POST['act_time']);
    $naqib_name = mysqli_real_escape_string($myConnection, $_POST['naqib_name']);
	

            $query_feeinfo = "INSERT INTO `activity` 
            (`act_id`,`act_type`,`act_topic`,`act_venue`,`act_time`,`naqib_name`)
               VALUES 
            ('$act_id','$act_type','$act_topic','$act_venue','$act_time','$naqib_name')";
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

            $query_feeinfo = "INSERT INTO `naqib` 
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

            $query_expinfo = "INSERT INTO `speak` 
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
    

            $query_expinfo = "INSERT INTO `public` 
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

// register penceramah
if (isset($_POST['register_penceramah']))
{
 
    $speak_id = mysqli_real_escape_string($myConnection, $_POST['speak_id']);
    $speak_name = mysqli_real_escape_string($myConnection, $_POST['speak_name']);
    $speak_position = mysqli_real_escape_string($myConnection, $_POST['speak_position']);
    $speak_phone = mysqli_real_escape_string($myConnection, $_POST['speak_phone']);
    $speak_mail = mysqli_real_escape_string($myConnection, $_POST['speak_mail']);

            $query_expinfo = "INSERT INTO `speak` 
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
// feebackahli
if (isset($_POST['feedbackahli']))
{
 
    $radio = mysqli_real_escape_string($myConnection, $_POST['radio']);
    $radio1 = mysqli_real_escape_string($myConnection, $_POST['radio1']);
	$radio2 = mysqli_real_escape_string($myConnection, $_POST['radio2']);
    $radio3 = mysqli_real_escape_string($myConnection, $_POST['radio3']);
	$radio4 = mysqli_real_escape_string($myConnection, $_POST['radio4']);
    $radio5 = mysqli_real_escape_string($myConnection, $_POST['radio5']);
	$radio6 = mysqli_real_escape_string($myConnection, $_POST['radio6']);
    $radio7 = mysqli_real_escape_string($myConnection, $_POST['radio7']);
    $radio8 = mysqli_real_escape_string($myConnection, $_POST['radio8']);
	$radio9 = mysqli_real_escape_string($myConnection, $_POST['radio9']);
    
            $query_expinfo = "INSERT INTO `feedback` 
            (`radio`,`radio1`,`radio2`,`radio3`,`radio4`,`radio5`,`radio6`,`radio7`,`radio8`,`radio9`)
               VALUES 
            ('$radio','$radio1','$radio2','$radio3','$radio4','$radio5','$radio6','$radio7','$radio8','$radio9')";
			
            $result = mysqli_query($myConnection, $query_expinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'feedback_output.php?result=SuccessfullyRegister';
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

//delete member
if (isset($_POST['deleteactivity'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['public_id']);

        $sql= "DELETE FROM `public` WHERE `public_id` = '$id' ";
        $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));
        if (!$result)
          {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Tidak Berjaya')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
          else
          {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Berjaya Dipadam')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
       
   }

}

//delete member ahli
if (isset($_POST['deleteactivityahli'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['act_id']);

        $sql= "DELETE FROM `activity` WHERE `act_id` = '$id' ";
        $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));
        if (!$result)
          {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Tidak Berjaya')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
          else
          {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Berjaya Dipadam')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
       
   }

}


?>

