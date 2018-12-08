<?php 
// Turn off error reporting
error_reporting(0);

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
    $mbr_profile_picture = "user.png";

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
        (`mbr_name`,`mbr_ic`,`mbr_address`,`mbr_gender`,`mbr_phone`,`mbr_dob`,`mbr_email`,`mbr_branch`,`mbr_profile_picture`)
         VALUES 
        ('$mbr_name','$mbr_ic','$mbr_address','$mbr_gender','$mbr_phone','$mbr_dob','$mbr_email','$mbr_branch','$mbr_profile_picture' )";
      $result2 = mysqli_query($myConnection, $query_member) or die(mysqli_error($myConnection));

	    if($result2)
	    {
          // mail function
           $title = "WADAH";
           $message = "Assalamualaikum, ".$mbr_name."\nPermohonan anda telah berjaya. Sila Layaran Laman Web http://localhost/wadah/login.php?page=logmasuk \n\n 
           Berikut adalah maklumat log masuk
           \n No. Kad Pengenalan : ".$mbr_ic.
            "\nKata Laluan : ".$usr_password.
          "\n\nNote : This is an auto generated email, Please do not reply to this email";
          
           $to = $mbr_email;
           $subject = "PENDAFTARAN WADAH";

           mail($to, $subject, $message);
	   
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'admin.php?result=SuccessfullyRegister';
          </SCRIPT>");
	    }
	    else
	    { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Ahli Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
	    }
	}
}


//delete member
if (isset($_POST['deletemem'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['mbr_ic']);

        $sql= "DELETE FROM `member` WHERE `mbr_ic` = '$id' ";
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