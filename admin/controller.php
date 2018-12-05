<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register member
if (isset($_POST['reg_member']))
{

    // register member info
    $mbr_name = mysqli_real_escape_string($myConnection, $_POST['mbr_name']);
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['mbr_ic']);
    $mbr_address = mysqli_real_escape_string($myConnection, $_POST['mbr_address']);
    $mbr_gender = mysqli_real_escape_string($myConnection, $_POST['mbr_gender']);
    $mbr_phone = mysqli_real_escape_string($myConnection, $_POST['mbr_phone']);
    $mbr_email = mysqli_real_escape_string($myConnection, $_POST['mbr_email']);
    $mbr_dob = mysqli_real_escape_string($myConnection, $_POST['mbr_dob']);
    $mbr_branch = mysqli_real_escape_string($myConnection, $_POST['mbr_branch']);
    $usr_password = "wadah123";
    $usr_role = "member";
    // $date = mysqli_real_escape_string($myConnection, date('Y-m-d'));
    $check_ic = mysqli_query($myConnection, "SELECT * FROM `user` WHERE `usr_username` = '$mbr_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Failed to register, Member already exist')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{
    
	    $query = "INSERT INTO `user` 
        (`usr_username`,`usr_password`,`usr_role`)
	       VALUES 
        ('$mbr_ic','$usr_password','$usr_role')";
	    $result = mysqli_query($myConnection, $query) or die(mysqli_error($myConnection));

      $query_member = "INSERT INTO `member` 
        (`mbr_name`,`mbr_ic`,`mbr_address`,`mbr_gender`,`mbr_phone`,`mbr_dob`,`mbr_email`,`mbr_branch`)
         VALUES 
        ('$mbr_name','$mbr_ic','$mbr_address','$mbr_gender','$mbr_phone','$mbr_dob','$mbr_email','$mbr_branch')";
      $result2 = mysqli_query($myConnection, $query_member) or die(mysqli_error($myConnection));

	    if($result2)
	    {
          // mail function
           $title = "WADAH";
           $message = "Hi, ".$mbr_name."\nPermohonan anda telah berjaya. Sila Layaran Laman Web
           \nUsername : ".$mbr_ic.
                      "\Kata Laluan : ".$usr_password.
                      "\n\nNote : This e-mail is generated electronically. Please do not reply to this email ";
          
           $to = $mbr_email;
           $subject = "PENDAFTARAN WADAH";

           mail($to, $subject, $message);
	   
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Successfully Registered')
          window.location = 'admin.php?result=SuccessfullyRegister';
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
}

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
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['mbr_ic']);

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
if (isset($_POST['delete_occupation'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['delete_id']);

        $sql= "DELETE FROM occupation_info WHERE occupation_id = '$id' ";
        $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));
        if (!$result)
          {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Failed')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
          else
          {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Deleted')
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
if (isset($_POST['delete_edu'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['delete_id']);

        $sql= "DELETE FROM education_info WHERE edu_id = '$id' ";
        $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));
        if (!$result)
          {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Failed')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
          else
          {
             echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Deleted')
              window.location.href = window.history.back();
              </SCRIPT>");
          }
       
   }
} 

?>