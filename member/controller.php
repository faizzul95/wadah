<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_POST['update_member']))
{    

  $mbr_id=mysqli_real_escape_string($myConnection, $_POST['mbr_id']);
  $mbr_name = mysqli_real_escape_string($myConnection, $_POST['mbr_name']);
  $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['mbr_ic']);
  $mbr_address = mysqli_real_escape_string($myConnection, $_POST['mbr_address']);
  $mbr_gender = mysqli_real_escape_string($myConnection, $_POST['mbr_gender']);
  $mbr_phone = mysqli_real_escape_string($myConnection, $_POST['mbr_phone']);
  $mbr_email = mysqli_real_escape_string($myConnection, $_POST['mbr_email']);
  $mbr_dob = mysqli_real_escape_string($myConnection, $_POST['mbr_dob']);
  $mbr_branch = mysqli_real_escape_string($myConnection, $_POST['mbr_branch']);

  $file = $_FILES['image_upload']['tmp_name'];

  if($file == NULL) {

  $sql = "UPDATE `member` SET `mbr_name` = '$mbr_name', `mbr_ic` = '$mbr_ic', `mbr_address` = '$mbr_address', `mbr_gender` = '$mbr_gender', `mbr_phone` = '$mbr_phone', `mbr_dob` = '$mbr_dob', `mbr_email` = '$mbr_email', `mbr_branch` = '$mbr_branch' WHERE `mbr_id` = '$mbr_id'";
  $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));

  echo ("<SCRIPT LANGUAGE='JavaScript'>
         window.alert('Berjaya Dikemaskini')
        window.location = 'user.php?result=SuccessfullyRegister';
        </SCRIPT>");

  } // end if
  else {

  $folder="../member/img/";
  $image_name = addslashes(rand(100,100000)."-".date("Y.m.d")."-".$_FILES['image_upload']['name']);
  $image_size = getimagesize($_FILES['image_upload']['tmp_name']);//to get size of image
  $image_type = $image_size['mime'];//to get the type of image
  // Maximum image width 
  $max_width = "4500"; 
  // Maximum image height 
  $max_height = "4500"; 

  list($width, $height, $type, $attr) = getimagesize($file);

  $file_type = $_FILES['image_upload']['type']; //returns the mimetype 
  $allowed = array("image/jpeg", "image/jpg", "image/png"); 

    if($width>$max_width || $height>$max_height) 
      { 
        echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Gambar Melebihi Had Dibenarkan. Maksima resolusi dibenarkan hanya 2500 x 2500.')
              window.location.href = window.history.back();
              </SCRIPT>");
      }  
  else
  {
    if(!in_array($file_type, $allowed) || !$image_size > 4100) 
      { 
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Hanya gambar format jpg dan png dibenarkan atau gambar tidak melebihi had 2MB.')
            window.location.href = window.history.back();
            </SCRIPT>");

      }
      else
      {
        if(move_uploaded_file($file,$folder.$image_name))
          {
            $sql = "UPDATE `member` SET `mbr_name` = '$mbr_name', `mbr_ic` = '$mbr_ic', `mbr_address` = '$mbr_address', `mbr_gender` = '$mbr_gender', `mbr_phone` = '$mbr_phone', `mbr_dob` = '$mbr_dob', `mbr_email` = '$mbr_email', `mbr_branch` = '$mbr_branch', `mbr_profile_picture` = '$image_name'  WHERE `mbr_id` = '$mbr_id'";

              $result = mysqli_query($myConnection, $sql) or die (mysqli_error($myConnection));

                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Berjaya Dikemaskini')
                window.location = 'user.php?result=SuccessfullyRegister';
                </SCRIPT>");
          }
          else
          {
            
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Masalah ketika memuat naik gambar')
            window.location.href = window.history.back();
            </SCRIPT>");

          }
        }
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
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);

    // // register family occupation
    // $company_name = mysqli_real_escape_string($myConnection, $_POST['company_name']);
    // $company_address = mysqli_real_escape_string($myConnection, $_POST['company_address']);
    // $company_phone = mysqli_real_escape_string($myConnection, $_POST['company_phone']);
    // $company_position = mysqli_real_escape_string($myConnection, $_POST['company_position']);
    // $company_email = mysqli_real_escape_string($myConnection, $_POST['company_email']);
    // $company_start_date = mysqli_real_escape_string($myConnection, $_POST['company_start_date']);
    // $company_end_date = mysqli_real_escape_string($myConnection, $_POST['company_end_date']);

    $check_ic = mysqli_query($myConnection, "SELECT * FROM `family` WHERE `family_ic` = '$family_ic'");
    if(mysqli_num_rows($check_ic) > 0){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Pendaftaran Tidak Berjaya, IC Keluarga Telah didaftarkan')
        window.location.href = window.history.back();
            </SCRIPT>");
    }else{
    
        $query_faminfo = "INSERT INTO `family` 
        (`family_name`,`family_ic`,`family_address`,`family_gender`, `family_phone`,`family_dob`,`family_email`,`family_relation`,`member_ic`)
           VALUES 
        ('$family_name','$family_ic','$family_address','$family_gender','$family_phone','$family_dob','$family_email','$family_relation','$mbr_ic')";
        $result = mysqli_query($myConnection, $query_faminfo) or die(mysqli_error($myConnection));

        // if($company_name != NULL && $company_start_date != NULL && $company_end_date != NULL){
        //     $query_occuinfo = "INSERT INTO `occupation_info` 
        //     (`family_ic`,`company_name`,`company_address`, `company_phone`,`company_position`,`company_email`,`company_start_date`,`company_end_date`)
        //        VALUES 
        //     ('$family_ic','$company_name','$company_address','$company_phone','$company_position','$company_email','$company_start_date','$company_end_date')";
        //     $result2 = mysqli_query($myConnection, $query_occuinfo) or die(mysqli_error($myConnection));
        // }

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
          window.alert('Pendaftaran keluarga tidak berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
    }
}

// update family
if (isset($_POST['update_family']))
{
    // update family info
    $family_name = mysqli_real_escape_string($myConnection, $_POST['family_name']);
    $new_family_ic = mysqli_real_escape_string($myConnection, $_POST['new_family_ic']);
    $family_address = mysqli_real_escape_string($myConnection, $_POST['family_address']);
    $family_gender = mysqli_real_escape_string($myConnection, $_POST['family_gender']);
    $family_phone = mysqli_real_escape_string($myConnection, $_POST['family_phone']);
    $family_dob = mysqli_real_escape_string($myConnection, $_POST['family_dob']);
    $family_email = mysqli_real_escape_string($myConnection, $_POST['family_email']);
    $family_relation = mysqli_real_escape_string($myConnection, $_POST['family_relation']);
    $mbr_ic = mysqli_real_escape_string($myConnection, $_POST['member_ic']);

     $family_ic = mysqli_real_escape_string($myConnection, $_POST['family_ic']);

         $query_faminfo = "UPDATE `family` SET 
        `family_name` = '$family_name', 
        `family_ic` = '$new_family_ic', 
        `family_address` = '$family_address',
        `family_gender` = '$family_gender', 
        `family_phone` = '$family_phone', 
        `family_dob` = '$family_dob', 
        `family_email` = '$family_email',
        `family_relation` = '$family_relation' 
        WHERE `family_ic` = '$family_ic'";

        $result = mysqli_query($myConnection, $query_faminfo) or die(mysqli_error($myConnection));

        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Dikemaskini')
          window.location = 'user.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Pendaftaran keluarga tidak berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}

// Update occupation
if (isset($_POST['update_job']))
{

    $occupation_id = mysqli_real_escape_string($myConnection, $_POST['occupation_id']); 

    $company_name = mysqli_real_escape_string($myConnection, $_POST['company_name']);
    $company_address = mysqli_real_escape_string($myConnection, $_POST['company_address']);
    $company_phone = mysqli_real_escape_string($myConnection, $_POST['company_phone']);
    $company_position = mysqli_real_escape_string($myConnection, $_POST['company_position']);
    $company_email = mysqli_real_escape_string($myConnection, $_POST['company_email']);
    $company_start_date = mysqli_real_escape_string($myConnection,  $_POST["company_start_date"]);
    $company_end_date = mysqli_real_escape_string($myConnection,  $_POST["company_end_date"]);

    // if ($company_end_date == "01/01/1970") {
    //     $company_end_date = "Sekarang";
    // }

    $query_eduinfo = "UPDATE `occupation_info` SET 
        `company_name` = '$company_name', 
        `company_address` = '$company_address', 
        `company_phone` = '$company_phone',
        `company_position` = '$company_position', 
        `company_email` = '$company_email', 
        `company_start_date` = '$company_start_date', 
        `company_end_date` = '$company_end_date' WHERE `occupation_id` = '$occupation_id'";

        $result = mysqli_query($myConnection, $query_eduinfo) or die(mysqli_error($myConnection));

        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Dikemaskini')
          window.location = 'user.php?result=SuccessfullyUpdate';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Tidak Berjaya')
          // window.location.href = window.history.back();
          </SCRIPT>");
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
    $company_name = mysqli_real_escape_string($myConnection, $_POST['company_name']);
    $company_address = mysqli_real_escape_string($myConnection, $_POST['company_address']);
    $company_phone = mysqli_real_escape_string($myConnection, $_POST['company_phone']);
    $company_position = mysqli_real_escape_string($myConnection, $_POST['company_position']);
    $company_email = mysqli_real_escape_string($myConnection, $_POST['company_email']);
    $company_start_date = mysqli_real_escape_string($myConnection,  $_POST["company_start_date"]);
    $company_end_date = mysqli_real_escape_string($myConnection,  $_POST["company_end_date"]);
    // $company_end_date = mysqli_real_escape_string($myConnection,  strtotime($_POST["company_end_date"]));
    var_dump($company_end_date);die;

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

         var_dump($query_occuinfo);die;
        
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
          window.alert('Pekerjaan Tidak Berjaya Didaftar')
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
        $edu_end_date = "Sekarang";
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
          window.alert('Berjaya Didaftar')
          window.location = 'user.php?result=SuccessfullyRegister';
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

// update education
if (isset($_POST['update_edu']))
{

    $edu_id = mysqli_real_escape_string($myConnection, $_POST['edu_id']);

    // register occupation
    $edu_name = mysqli_real_escape_string($myConnection, $_POST['edu_name']);
    $edu_address = mysqli_real_escape_string($myConnection, $_POST['edu_address']);
    $edu_phone = mysqli_real_escape_string($myConnection, $_POST['edu_phone']);
    $edu_course = mysqli_real_escape_string($myConnection, $_POST['edu_course']);
    $edu_level = mysqli_real_escape_string($myConnection, $_POST['edu_level']);
    $edu_start_date = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["edu_start_date"])));
    $edu_end_date  = mysqli_real_escape_string($myConnection,  date('d/m/Y',strtotime($_POST["edu_end_date"])));

    if ($edu_end_date == "01/01/1970") {
        $edu_end_date = "Sekarang";
    }


        $query_eduinfo = "UPDATE `education_info` SET 
        `edu_name` = '$edu_name', 
        `edu_address` = '$edu_address', 
        `edu_phone` = '$edu_phone',
        `edu_course` = '$edu_course', 
        `edu_level` = '$edu_level', 
        `edu_start_date` = '$edu_start_date', 
        `edu_end_date` = '$edu_end_date' WHERE `edu_id` = '$edu_id'";

        $result = mysqli_query($myConnection, $query_eduinfo) or die(mysqli_error($myConnection));
        
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Kemaskini Berjaya')
          window.location = 'user.php?result=SuccessfullyRegister';
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

//delete occupation
if (isset($_POST['deletefamily'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['family_ic']);

        $sql= "DELETE FROM `family` WHERE `family_ic` = '$id' ";
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