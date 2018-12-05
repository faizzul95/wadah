<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register sponsorship
if (isset($_POST['register_sps']))
{
 
    // register sponsorship
    $sps_id = mysqli_real_escape_string($myConnection, $_POST['Sps_id']);
    $sps_name = mysqli_real_escape_string($myConnection, $_POST['Sps_name']);
    $sps_add = mysqli_real_escape_string($myConnection, $_POST['Sps_add']);
    $sps_phoneNo = mysqli_real_escape_string($myConnection, $_POST['Sps_phoneNo']);
    $sps_email = mysqli_real_escape_string($myConnection, $_POST['Sps_email']);
	$sps_type = mysqli_real_escape_string($myConnection, $_POST['Sps_type']);

            $query_feeinfo = "INSERT INTO `sponsors` 
            (`Sps_id`,`Sps_name`,`Sps_add`,`Sps_phoneNo`,`Sps_email`,`Sps_type`)
               VALUES 
            ('$sps_id','$sps_name','$sps_add','$sps_phoneNo,'$sps_email','$sps_type')";
            $result = mysqli_query($myConnection, $query_spsinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Successfully Registered')
          window.location = 'list_sps.php?result=SuccessfullyRegister';
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
		
// register fees
if (isset($_POST['register_fees']))
{
 
    $Fee_id = mysqli_real_escape_string($myConnection, $_POST['Fee_id']);
    $Fee_amount = mysqli_real_escape_string($myConnection, $_POST['Fee_amount']);
    $Fee_status = mysqli_real_escape_string($myConnection, $_POST['Fee_status']);
    $Fee_date = mysqli_real_escape_string($myConnection, $_POST['Fee_date']);
    $Fee_type = mysqli_real_escape_string($myConnection, $_POST['Fee_type']);

            $query_feeinfo = "INSERT INTO `fees` 
            (`Fee_id`,`Fee_amount`,`Fee_status`,`Fee_date`,`Fee_type`)
               VALUES 
            ('$Fee_id','$Fee_amount','$Fee_status','$Fee_date','$Fee_type')";
			
            $result = mysqli_query($myConnection, $query_feeinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'list_fee.php?result=SuccessfullyRegister';
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
