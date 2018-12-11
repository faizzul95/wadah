<p>&nbsp;</p>
<p>&nbsp;</p>
<?php 
require ('../connection.php');
date_default_timezone_set("Asia/Kuala_Lumpur");

// register asset
if (isset($_POST['register_asset']))
{
 
    // register asset
    $asset_type = mysqli_real_escape_string($myConnection, $_POST['asset_type']);
    $asset_status = mysqli_real_escape_string($myConnection, $_POST['asset_status']);
    $asset_quantity = mysqli_real_escape_string($myConnection, $_POST['asset_quantity']);
    $asset_place = mysqli_real_escape_string($myConnection, $_POST['asset_place']);
    $asset_desc = mysqli_real_escape_string($myConnection, $_POST['asset_desc']);
	

            $query_assetinfo = "INSERT INTO `asset` 
            (`asset_type`,`asset_status`,`asset_quantity`,`asset_place`,`asset_desc`)
               VALUES 
            ('$asset_type','$asset_status','$asset_quantity','$asset_place','$asset_desc')";
            $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Successfully Registered')
          window.location = 'asset_list.php?result=SuccessfullyRegister';
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
		
// maintenance asset
if (isset($_POST['maintenance_asset']))
{
 
    $vendor_id = mysqli_real_escape_string($myConnection, $_POST['vendor_id']);
    $maintenance_status = mysqli_real_escape_string($myConnection, $_POST['maintenance_status']);
    $maintenance_cost = mysqli_real_escape_string($myConnection, $_POST['maintenance_cost']);
    $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);
    $maintenance_days = mysqli_real_escape_string($myConnection, $_POST['maintenance_days']);
	$maintenance_desc = mysqli_real_escape_string($myConnection, $_POST['maintenance_desc']);


            $query_maintenanceinfo = "INSERT INTO `maintenance` 
            (`vendor_id`,`maintenance_status`,`maintenance_cost`,`asset_id`,`maintenance_days`,`maintenance_desc`)
               VALUES 
            ('$vendor_id','$maintenance_status','$maintenance_cost','$asset_id','$maintenance_days','$maintenance_desc')";
			
            $result = mysqli_query($myConnection, $query_maintenanceinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'maintenance_list.php?result=SuccessfullyRegister';
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
// rent asset
if (isset($_POST['rent_asset']))
{
 
    $asset_type = mysqli_real_escape_string($myConnection, $_POST['asset_type']);
    $rent_availability = mysqli_real_escape_string($myConnection, $_POST['rent_availability']);
    $rent_days = mysqli_real_escape_string($myConnection, $_POST['rent_days']);
    $rent_startdate = mysqli_real_escape_string($myConnection, $_POST['rent_startdate']);
    $rent_finishdate = mysqli_real_escape_string($myConnection, $_POST['rent_finishdate']);
	$asset_place = mysqli_real_escape_string($myConnection, $_POST['asset_place']);


            $query_rentinfo = "INSERT INTO `rent` 
            (`asset_type`,`asset_availability`,`rent_days`,`rent_startdate`,`rent_finishdate`,`asset_place`)
               VALUES 
            ('$asset_type','$asset_availability','$rent_days','$rent_startdate','$rent_finishdate'`asset_place`)";
			
            $result = mysqli_query($myConnection, $query_rentinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya')
          window.location = 'rent_list.php?result=SuccessfullyRegister';
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
