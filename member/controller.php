<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");


// register family
if (isset($_POST['reg_family']))
{
    // register family info
    $family_name = mysqli_real_escape_string($myConnection, $_POST['family_name']);
    $family_ic = mysqli_real_escape_string($myConnection, $_POST['family_ic']);
    $family_address = mysqli_real_escape_string($myConnection, $_POST['family_address']);
    $family_gender = mysqli_real_escape_string($myConnection, $_POST['family_gender']);
    $family_phone = mysqli_real_escape_string($myConnection, $_POST['family_phone']);
    $family_dob = mysqli_real_escape_string($myConnection, $_POST['family_dob']);
    $family_email = mysqli_real_escape_string($myConnection, $_POST['family_email']);
    $family_relation = mysqli_real_escape_string($myConnection, $_POST['family_relation']);
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);

    // register family occupation
    $company_name = mysqli_real_escape_string($myConnection, $_POST['company_name']);
    $company_address = mysqli_real_escape_string($myConnection, $_POST['company_address']);
    $company_phone = mysqli_real_escape_string($myConnection, $_POST['company_phone']);
    $company_position = mysqli_real_escape_string($myConnection, $_POST['company_position']);
    $company_email = mysqli_real_escape_string($myConnection, $_POST['company_email']);
    $company_start_date = mysqli_real_escape_string($myConnection, $_POST['company_start_date']);
    $company_end_date = mysqli_real_escape_string($myConnection, $_POST['company_end_date']);

    $check_ic = mysqli_query($myConnection, "SELECT * FROM `family` WHERE `family_ic` = '$family_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to register, Family already exist')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{
    
        $query_faminfo = "INSERT INTO `family` 
        (`family_name`,`family_ic`,`family_address`,`family_gender`, `family_phone`,`family_dob`,`family_email`,`family_relation`,`member_ic`)
           VALUES 
        ('$family_name','$family_ic','$family_address','$family_gender','$family_phone','$family_dob','$family_email','$family_relation','$mbr_ic')";
        $result = mysqli_query($myConnection, $query_faminfo) or die(mysqli_error($myConnection));

        if($company_name != NULL && $company_start_date != NULL && $company_end_date != NULL){
            $query_occuinfo = "INSERT INTO `occupation_info` 
            (`family_ic`,`company_name`,`company_address`, `company_phone`,`company_position`,`company_email`,`company_start_date`,`company_end_date`)
               VALUES 
            ('$family_ic','$company_name','$company_address','$company_phone','$company_position','$company_email','$company_start_date','$company_end_date')";
            $result2 = mysqli_query($myConnection, $query_occuinfo) or die(mysqli_error($myConnection));
        }

        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'user.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran tidak berjaya, Sila cuba sekali lagi')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
    }
}

// register occupation
if (isset($_POST['reg_job']))
{
    // register family info
    if(isset($_POST['family_ic'])){
        $family_ic = mysqli_real_escape_string($myConnection, $_POST['family_ic']);
    }

    if(isset($_POST['member_ic'])){
        $member_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);
    }
    // register occupation
    $company_name = mysqli_real_escape_string($myConnection, $_POST['company_name']);
    $company_address = mysqli_real_escape_string($myConnection, $_POST['company_address']);
    $company_phone = mysqli_real_escape_string($myConnection, $_POST['company_phone']);
    $company_position = mysqli_real_escape_string($myConnection, $_POST['company_position']);
    $company_email = mysqli_real_escape_string($myConnection, $_POST['company_email']);
    $company_start_date = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["company_start_date"])));
    $company_end_date = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["company_end_date"])));

    if ($company_end_date == "01/01/1970") {
        $company_end_date = "Current";
    }

        if(isset($_POST['family_ic'])){
            $query_occuinfo = "INSERT INTO `occupation_info` 
            (`family_ic`,`company_name`,`company_address`, `company_phone`,`company_position`,`company_email`,`company_start_date`,`company_end_date`)
               VALUES 
            ('$family_ic','$company_name','$company_address','$company_phone','$company_position','$company_email','$company_start_date','$company_end_date')";
            $result = mysqli_query($myConnection, $query_occuinfo) or die(mysqli_error($myConnection));
        }else {
            $query_occuinfo = "INSERT INTO `occupation_info` 
            (`member_ic`,`company_name`,`company_address`, `company_phone`,`company_position`,`company_email`,`company_start_date`,`company_end_date`)
               VALUES 
            ('$member_ic','$company_name','$company_address','$company_phone','$company_position','$company_email','$company_start_date','$company_end_date')";
            $result = mysqli_query($myConnection, $query_occuinfo) or die(mysqli_error($myConnection));
        }
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'user.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Fail, Please Try Again')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}

//delete occupation
if (isset($_POST['deletejob'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['occupation_id']);

        $sql= "DELETE FROM occupation_info WHERE occupation_id = '$id' ";
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
              window.alert('Berjaya dipadam')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
       
   }
} 


// register education
if (isset($_POST['reg_edu']))
{
    // register family info
    if(isset($_POST['family_ic'])){
        $family_ic = mysqli_real_escape_string($myConnection, $_POST['family_ic']);
    }

    if(isset($_POST['member_ic'])){
        $member_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);
    }
    // register occupation
    $edu_name = mysqli_real_escape_string($myConnection, $_POST['edu_name']);
    $edu_address = mysqli_real_escape_string($myConnection, $_POST['edu_address']);
    $edu_phone = mysqli_real_escape_string($myConnection, $_POST['edu_phone']);
    $edu_course = mysqli_real_escape_string($myConnection, $_POST['edu_course']);
    $edu_level = mysqli_real_escape_string($myConnection, $_POST['edu_level']);
    $edu_start_date = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["edu_start_date"])));
    $edu_end_date  = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["edu_end_date"])));

    if ($edu_end_date == "01/01/1970") {
        $edu_end_date = "Current";
    }

        if(isset($_POST['family_ic'])){
            $query_eduinfo = "INSERT INTO `education_info` 
            (`family_ic`,`edu_name`,`edu_address`, `edu_phone`,`edu_course`,`edu_level`,`edu_start_date`,`edu_end_date`)
               VALUES 
            ('$family_ic','$edu_name','$edu_address','$edu_phone','$edu_course','$edu_level','$edu_start_date','$edu_end_date')";
            $result = mysqli_query($myConnection, $query_eduinfo) or die(mysqli_error($myConnection));
        }else {
            $query_eduinfo = "INSERT INTO `education_info` 
            (`member_ic`,`edu_name`,`edu_address`, `edu_phone`,`edu_course`,`edu_level`,`edu_start_date`,`edu_end_date`)
               VALUES 
            ('$member_ic','$edu_name','$edu_address','$edu_phone','$edu_course','$edu_level','$edu_start_date','$edu_end_date')";
            $result = mysqli_query($myConnection, $query_eduinfo) or die(mysqli_error($myConnection));
        }
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Successfully Registered')
          window.location = 'user.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Fail, Please Try Again')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}

//delete occupation
if (isset($_POST['deleteedu'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['edu_id']);

        $sql= "DELETE FROM `education_info` WHERE `edu_id` = '$id' ";
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