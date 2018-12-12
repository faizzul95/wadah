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

    // first payment as a member
    $Fee_amount = mysqli_real_escape_string($myConnection, $_POST['Fee_amount']);
    
    if ($Fee_amount != NULL) {
      $Fee_status = "Telah Dibayar";
      $Fee_date = mysqli_real_escape_string($myConnection, $_POST['Fee_date']);
      $Fee_type = mysqli_real_escape_string($myConnection, $_POST['Fee_type']);
    }else{
      $Fee_status = "Belum Dibayar";
      $Fee_date = NULL;
      $Fee_type = "Yuran Ahli";
    }
    
    // $date = mysqli_real_escape_string($myConnection, date('Y-m-d'));
    $check_ic = mysqli_query($myConnection, "SELECT * FROM `user` WHERE `usr_username` = '$mbr_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pendaftaran tidak berjaya, No KP telah berdaftar')
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

      if ($Fee_amount == "") {
        $query3 = "INSERT INTO `fees` 
          (`member_ic`,`Fee_status`,`Fee_type`)
           VALUES 
          ('$mbr_ic','$Fee_status','$Fee_type')";
        $result3 = mysqli_query($myConnection, $query3) or die(mysqli_error($myConnection));
      }else{
        $query3 = "INSERT INTO `fees` 
          (`member_ic`,`Fee_status`,`Fee_type`,`Fee_date`,`Fee_amount`)
           VALUES 
          ('$mbr_ic','$Fee_status','$Fee_type', '$Fee_date','$Fee_amount')";
        $result3 = mysqli_query($myConnection, $query3) or die(mysqli_error($myConnection));
      }

	    if($result3)
	    {
          // mail function
           $title = "WADAH";
           $message = "Assalamualaikum, ".$mbr_name."\n\nPermohonan anda telah berjaya. Sila Layaran Laman Web http://localhost/wadah/login.php?page=logmasuk \n
           Berikut adalah maklumat log masuk
           \n No. Kad Pengenalan : ".$mbr_ic.
            "\nKata Laluan : ".$usr_password.
          "\n\nNote : This is an auto generated email, Please do not reply to this email";
          
           $to = $mbr_email;
           $subject = "PENDAFTARAN WADAH";

           mail($to, $subject, $message);
	   
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'list_member.php?result=SuccessfullyRegister';
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

// update member
if (isset($_POST['update_member']))
{

    $mbr_name = mysqli_real_escape_string($myConnection, $_POST['mbr_name']);
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['mbr_ic']);
    $mbr_address = mysqli_real_escape_string($myConnection, $_POST['mbr_address']);
    $mbr_gender = mysqli_real_escape_string($myConnection, $_POST['mbr_gender']);
    $mbr_phone = mysqli_real_escape_string($myConnection, $_POST['mbr_phone']);
    $mbr_email = mysqli_real_escape_string($myConnection, $_POST['mbr_email']);
    $mbr_dob = mysqli_real_escape_string($myConnection, $_POST['mbr_dob']);
    $mbr_branch = mysqli_real_escape_string($myConnection, $_POST['mbr_branch']);

        $query_unaqib = "UPDATE `member` SET 
        `mbr_name` = '$mbr_name', 
        `mbr_ic` = '$mbr_ic', 
        `mbr_address` = '$mbr_address',
        `mbr_phone` = '$mbr_phone', 
        `mbr_email` = '$mbr_email', 
        `mbr_dob` = '$mbr_dob', 
        `mbr_branch` = '$mbr_branch' WHERE `mbr_ic` = '$mbr_ic'";

        $result = mysqli_query($myConnection, $query_unaqib) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Berjaya')
          window.location = 'list_member.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
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


// register naqib
if (isset($_POST['reg_naqib']))
{

    $naqib_name = mysqli_real_escape_string($myConnection, $_POST['naqib_name']);
    $naqib_ic = mysqli_real_escape_string($myConnection, $_POST['naqib_ic']);
    $naqib_phone = mysqli_real_escape_string($myConnection, $_POST['naqib_phone']);
    $naqib_address = mysqli_real_escape_string($myConnection, $_POST['naqib_address']);
    $naqib_mail = mysqli_real_escape_string($myConnection, $_POST['naqib_mail']);
    $naqib_branch = mysqli_real_escape_string($myConnection, $_POST['naqib_branch']);
    $naqib_category = mysqli_real_escape_string($myConnection, $_POST['naqib_category']);


    $check_ic = mysqli_query($myConnection, "SELECT * FROM `naqib` WHERE `naqib_ic` = '$naqib_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pendaftaran tidak berjaya, Naqib telah didaftarkan')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{
    
      $query_member = "INSERT INTO `naqib` 
        (`naqib_name`,`naqib_ic`,`naqib_category`,`naqib_phone`,`naqib_address`,`naqib_mail`,`naqib_branch`)
         VALUES 
        ('$naqib_name','$naqib_ic','$naqib_category','$naqib_phone','$naqib_address','$naqib_mail','$naqib_branch')";
      $result2 = mysqli_query($myConnection, $query_member) or die(mysqli_error($myConnection));

      if($result2)
      {
     
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'list_naqib.php?result=SuccessfullyRegister';
          </SCRIPT>");
      }
      else
      { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Naqib Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
      }
  }
}



// update naqib
if (isset($_POST['kemaskini_naqib']))
{

    $naqib_name = mysqli_real_escape_string($myConnection, $_POST['naqib_name']);
    $naqib_ic = mysqli_real_escape_string($myConnection, $_POST['naqib_ic']);
    $naqib_phone = mysqli_real_escape_string($myConnection, $_POST['naqib_phone']);
    $naqib_address = mysqli_real_escape_string($myConnection, $_POST['naqib_address']);
    $naqib_mail = mysqli_real_escape_string($myConnection, $_POST['naqib_mail']);
    $naqib_branch = mysqli_real_escape_string($myConnection, $_POST['naqib_branch']);
    $naqib_category = mysqli_real_escape_string($myConnection, $_POST['naqib_category']);

        $query_unaqib = "UPDATE `naqib` SET 
        `naqib_name` = '$naqib_name', 
        `naqib_ic` = '$naqib_ic', 
        `naqib_phone` = '$naqib_phone',
        `naqib_address` = '$naqib_address', 
        `naqib_mail` = '$naqib_mail', 
        `naqib_branch` = '$naqib_branch', 
        `naqib_category` = '$naqib_category' WHERE `naqib_ic` = '$naqib_ic'";

        $result = mysqli_query($myConnection, $query_unaqib) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Berjaya')
          window.location = 'list_naqib.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}

// update speaker
if (isset($_POST['update_speaker']))
{

    $speak_ic = mysqli_real_escape_string($myConnection, $_POST['speak_ic']);
    $speak_name = mysqli_real_escape_string($myConnection, $_POST['speak_name']);
    $speak_address = mysqli_real_escape_string($myConnection, $_POST['speak_address']);
    $speak_phone = mysqli_real_escape_string($myConnection, $_POST['speak_phone']);
    $speak_gender = mysqli_real_escape_string($myConnection, $_POST['speak_gender']);
    $speak_mail = mysqli_real_escape_string($myConnection, $_POST['speak_mail']);

        $query_eduinfo = "UPDATE `speaker` SET 
        `speak_ic` = '$speak_ic', 
        `speak_name` = '$speak_name', 
        `speak_address` = '$speak_address',
        `speak_phone` = '$speak_phone', 
        `speak_gender` = '$speak_gender', 
        `speak_mail` = '$speak_mail' WHERE `speak_ic` = '$speak_ic'";

        $result = mysqli_query($myConnection, $query_eduinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Berjaya')
          window.location = 'list_speaker.php?result=Successfullyupdate';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }

}





// register speaker
if (isset($_POST['reg_speaker']))
{

    $speak_ic = mysqli_real_escape_string($myConnection, $_POST['speak_ic']);
    $speak_name = mysqli_real_escape_string($myConnection, $_POST['speak_name']);
    $speak_address = mysqli_real_escape_string($myConnection, $_POST['speak_address']);
    $speak_phone = mysqli_real_escape_string($myConnection, $_POST['speak_phone']);
    $speak_gender = mysqli_real_escape_string($myConnection, $_POST['speak_gender']);
    $speak_mail = mysqli_real_escape_string($myConnection, $_POST['speak_mail']);


    $check_ic = mysqli_query($myConnection, "SELECT * FROM `speaker` WHERE `speak_ic` = '$speak_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pendaftaran tidak berjaya, Penceramah telah didaftarkan')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{
    
      $query_member = "INSERT INTO `speaker` 
        (`speak_ic`,`speak_name`,`speak_address`,`speak_phone`,`speak_gender`,`speak_mail`)
         VALUES 
        ('$speak_ic','$speak_name','$speak_address','$speak_phone','$speak_gender','$speak_mail')";
      $result2 = mysqli_query($myConnection, $query_member) or die(mysqli_error($myConnection));

      if($result2)
      {
     
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftar')
          window.location = 'list_speaker.php?result=SuccessfullyRegister';
          </SCRIPT>");
      }
      else
      { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran Naqib Tidak Berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
      }
  }
}

//delete naqib
if (isset($_POST['deletenaqib'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['naqib_ic']);

        $sql= "DELETE FROM `naqib` WHERE `naqib_ic` = '$id' ";
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

//delete speaker
if (isset($_POST['deletespeaker'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['speak_ic']);

        $sql= "DELETE FROM `speaker` WHERE `speak_ic` = '$id' ";
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