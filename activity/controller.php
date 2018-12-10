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
    
//delete activity
if (isset($_POST['deleteactivity'])){
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

// feedbackahli
if (isset($_POST['feedbackahli']))
{
  
    $member_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);
    $activity_id = mysqli_real_escape_string($myConnection, $_POST['act_id']);
    $radio = mysqli_real_escape_string($myConnection, $_POST['q1']);
    $radio1 = mysqli_real_escape_string($myConnection, $_POST['q2']);
  $radio2 = mysqli_real_escape_string($myConnection, $_POST['q3']);
    $radio3 = mysqli_real_escape_string($myConnection, $_POST['q4']);
  $radio4 = mysqli_real_escape_string($myConnection, $_POST['q5']);
    $radio5 = mysqli_real_escape_string($myConnection, $_POST['q6']);
  $radio6 = mysqli_real_escape_string($myConnection, $_POST['q7']);
    $radio7 = mysqli_real_escape_string($myConnection, $_POST['q8']);
    $radio8 = mysqli_real_escape_string($myConnection, $_POST['q9']);
  $radio9 = mysqli_real_escape_string($myConnection, $_POST['q10']);
    
            $query_expinfo = "INSERT INTO `feedback` 
            (`member_ic`,`activity_id`,`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`)
               VALUES 
            ('$member_ic','$activity_id','$radio','$radio1','$radio2','$radio3','$radio4','$radio5','$radio6','$radio7','$radio8','$radio9')";
      
            $result = mysqli_query($myConnection, $query_expinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Terima kasih kerana memberi maklum balas')
          window.location.href = window.history.back();
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

