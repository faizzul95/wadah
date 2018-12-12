<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register aktiviti member
if (isset($_POST['reg_aktiviti_ahli']))
{

    $act_name = mysqli_real_escape_string($myConnection, $_POST['act_name']);
    $act_type = mysqli_real_escape_string($myConnection, $_POST['act_type']);
    $act_description = mysqli_real_escape_string($myConnection, $_POST['act_description']);
    $act_date = mysqli_real_escape_string($myConnection, $_POST['act_date']);
    $act_time = mysqli_real_escape_string($myConnection, $_POST['act_time']);
    $act_venue = mysqli_real_escape_string($myConnection, $_POST['act_venue']);
    $act_category = "Ahli";
    $act_fee = mysqli_real_escape_string($myConnection, $_POST['act_fee']);
    $naqib_ic = mysqli_real_escape_string($myConnection, $_POST['naqib_ic']);
  

            $query_feeinfo = "INSERT INTO `activity` 
            (`act_name`,`act_type`,`act_description`,`act_date`,`act_time`,`act_venue`,`act_category`,`act_fee`,`naqib_ic`)
               VALUES 
            ('$act_name','$act_type','$act_description','$act_date','$act_time','$act_venue','$act_category','$act_fee','$naqib_ic')";
            $result = mysqli_query($myConnection, $query_feeinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'list_activity.php?result=SuccessfullyRegister';
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

// register aktiviti member
if (isset($_POST['reg_aktiviti_awam']))
{

    $act_name = mysqli_real_escape_string($myConnection, $_POST['act_name']);
    $act_description = mysqli_real_escape_string($myConnection, $_POST['act_description']);
    $act_date = mysqli_real_escape_string($myConnection, $_POST['act_date']);
    $act_time = mysqli_real_escape_string($myConnection, $_POST['act_time']);
    $act_venue = mysqli_real_escape_string($myConnection, $_POST['act_venue']);
    $act_category = "Awam";
    $act_fee = mysqli_real_escape_string($myConnection, $_POST['act_fee']);
    $speak_ic = mysqli_real_escape_string($myConnection, $_POST['speak_ic']);
  

            $query_feeinfo = "INSERT INTO `activity` 
            (`act_name`,`act_type`,`act_description`,`act_date`,`act_time`,`act_venue`,`act_category`,`act_fee`,`speak_ic`)
               VALUES 
            ('$act_name','$act_type','$act_description','$act_date','$act_time','$act_venue','$act_category','$act_fee','$speak_ic')";
            $result = mysqli_query($myConnection, $query_feeinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'list_activity.php?result=SuccessfullyRegister';
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
          // window.location.href = window.history.back();
          window.location = '../member/user.php?result=berjaya';
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

// assign sponsor
if (isset($_POST['assign_sponsor']))
{
  
    $sponsor_id = mysqli_real_escape_string($myConnection, $_POST['sponsor_id']);
    $act_id = mysqli_real_escape_string($myConnection, $_POST['act_id']);
    $sponsor_amount = mysqli_real_escape_string($myConnection, $_POST['sponsor_amount']);
    $sps_description = mysqli_real_escape_string($myConnection, $_POST['sps_description']);
    
            $query_expinfo = "INSERT INTO `act_sponsorship` 
            (`sponsor_id`,`act_id`,`sponsor_amount`,`sps_description`)
               VALUES 
            ('$sponsor_id','$act_id','$sponsor_amount','$sps_description')";
      
            $result = mysqli_query($myConnection, $query_expinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          // window.location.href = window.history.back();
          window.location = 'list_activity.php?result=berjaya';
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

// joint member activiti
if (isset($_POST['joinevent']))
{
  
    $member_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);
    $activity_id = mysqli_real_escape_string($myConnection, $_POST['act_id']);
    
     $check_ic = mysqli_query($myConnection, "SELECT * FROM `event` WHERE `member_ic` = '$member_ic' AND `activity_id` = '$activity_id'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Anda telah berdaftar dengan aktiviti ini')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{

         $join = "INSERT INTO `event` 
            (`member_ic`,`activity_id`)
               VALUES 
            ('$member_ic','$activity_id')";
      
            $result = mysqli_query($myConnection, $join) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Anda telah berjaya mendaftar aktiviti')
          window.location = '../member/user.php?result=berjaya';
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
}



?>

