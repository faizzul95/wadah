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
          window.alert('Berjaya Didaftarkan')
          window.location = 'asset_list.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal, Sila Cuba Lagi')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}
//update asset
if (isset($_POST['update_asset']))
{
    // update asset
     $asset_type = mysqli_real_escape_string($myConnection, $_POST['asset_type']);
    $asset_status = mysqli_real_escape_string($myConnection, $_POST['asset_status']);
    $asset_quantity = mysqli_real_escape_string($myConnection, $_POST['asset_quantity']);
    $asset_place = mysqli_real_escape_string($myConnection, $_POST['asset_place']);
    $asset_desc = mysqli_real_escape_string($myConnection, $_POST['asset_desc']);

     $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);

         $query_assetinfo = "UPDATE `asset` SET 
        `asset_type` = '$asset_type', 
        `asset_status` = '$asset_status', 
        `asset_quantity` = '$asset_quantity',
        `asset_place` = '$asset_place', 
        `asset_desc` = '$asset_desc', 
        WHERE `asset_id` = '$asset_id'";

        $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));

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
          window.alert('Pendaftaran Aset tidak berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}
		//delete asset
		if (isset($_POST['delete_asset'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['asset_id']);

        $sql= "DELETE FROM asset WHERE asset_id = '$id' ";
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
if (isset($_POST['update_maintenance']))
{
    // update maintenance
     $vendor_id = mysqli_real_escape_string($myConnection, $_POST['vendor_id']);
    $maintenance_status = mysqli_real_escape_string($myConnection, $_POST['maintenance_status']);
    $maintenance_cost = mysqli_real_escape_string($myConnection, $_POST['maintenance_cost']);
    $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);
    $maintenance_days = mysqli_real_escape_string($myConnection, $_POST['maintenance_days']);
	$maintenance_desc = mysqli_real_escape_string($myConnection, $_POST['maintenance_desc']);

     $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);

         $query_assetinfo = "UPDATE `maintenance` SET 
        `vendor_id` = '$vendor_id', 
        `maintenance_status` = '$maintenance_status', 
        `maintenance_cost` = '$maintenance_cost',
        `asset_id` = '$asset_id', 
        `maintenance_days` = '$maintenance_days',
		`maintenance_desc` = '$maintenance_desc', 
        WHERE `maintenance_id` = '$maintenance_id'";

        $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));

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
          window.alert('Pendaftaran penyelenggaraan tidak berjaya')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}
		//delete maintenance
		if (isset($_POST['delete_maintenance'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['maintenance_id']);

        $sql= "DELETE FROM maintenance WHERE maintenance_id = '$id' ";
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
// rent asset
if (isset($_POST['rent_asset']))
{
 
    $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);
    $rent_availability = mysqli_real_escape_string($myConnection, $_POST['rent_availability']);
    $rent_days = mysqli_real_escape_string($myConnection, $_POST['rent_days']);
    $rent_startdate = mysqli_real_escape_string($myConnection, $_POST['rent_startdate']);
    $rent_finishdate = mysqli_real_escape_string($myConnection, $_POST['rent_finishdate']);
	$rent_companyname = mysqli_real_escape_string($myConnection, $_POST['rent_companyname']);


            $query_rentinfo = "INSERT INTO `rent` 
            (`asset_id`,`rent_availability`,`rent_days`,`rent_startdate`,`rent_finishdate`,`rent_companyname`)
               VALUES 
            ('$asset_id','$rent_availability','$rent_days','$rent_startdate','$rent_finishdate','$rent_companyname')";
			
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
if (isset($_POST['update_maintenance']))
{
    // update rent
    $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);
    $rent_availability = mysqli_real_escape_string($myConnection, $_POST['rent_availability']);
    $rent_days = mysqli_real_escape_string($myConnection, $_POST['rent_days']);
    $rent_startdate = mysqli_real_escape_string($myConnection, $_POST['rent_startdate']);
    $rent_finishdate = mysqli_real_escape_string($myConnection, $_POST['rent_finishdate']);
	$rent_companyname = mysqli_real_escape_string($myConnection, $_POST['rent_companyname']);

     $rent_id = mysqli_real_escape_string($myConnection, $_POST['rent_id']);

         $query_assetinfo = "UPDATE `rent` SET 
        `asset_id` = '$asset_id', 
        `rent_availability` = '$rent_availability', 
        `rent_days` = '$rent_days',
        `rent_startdate` = '$rent_startdate', 
        `rent_finishdate` = '$rent_finishdate', 
		`rent_companyname` = '$rent_companyname',
        WHERE `rent_id` = '$rent_id'";

        $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));

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
		//delete rent
		if (isset($_POST['delete_rent'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['rent_id']);

        $sql= "DELETE FROM rent WHERE rent_id = '$id' ";
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
		// register vendor
if (isset($_POST['register_vendor']))
{
 
    // register vendor
    $vendor_name = mysqli_real_escape_string($myConnection, $_POST['vendor_name']);
    $vendo_address = mysqli_real_escape_string($myConnection, $_POST['vendor_address']);
    $vendor_phone = mysqli_real_escape_string($myConnection, $_POST['vendor_phone']);
    $vendor_desc = mysqli_real_escape_string($myConnection, $_POST['vendor_desc']);
	

            $query_assetinfo = "INSERT INTO `vendor` 
            (`vendor_name`,`vendor_address`,`vendor_phone`,`vendor_desc`)
               VALUES 
            ('$vendor_name','$vendor_address','$vendor_phone','$vendor_desc')";
            $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));
        
        if($result)
        {
       
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Berjaya Didaftarkan')
          window.location = 'vendor_list.php?result=SuccessfullyRegister';
          </SCRIPT>");
        }
        else
        { 
          echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Gagal, Sila Cuba Lagi')
          window.location.href = window.history.back();
          </SCRIPT>");
        }
}
if (isset($_POST['update_vendor']))
{
    // update vendor
    $vendor_name = mysqli_real_escape_string($myConnection, $_POST['vendor_name']);
    $vendo_address = mysqli_real_escape_string($myConnection, $_POST['vendor_address']);
    $vendor_phone = mysqli_real_escape_string($myConnection, $_POST['vendor_phone']);
    $vendor_desc = mysqli_real_escape_string($myConnection, $_POST['vendor_desc']);
	
     $asset_id = mysqli_real_escape_string($myConnection, $_POST['asset_id']);

         $query_assetinfo = "UPDATE `vendor` SET 
        `vendor_name` = '$vendor_name', 
        `vendor_address` = '$vendor_address', 
        `vendor_phone` = '$vendor_phone',
        `vendor_desc` = '$vendor_desc',  
        WHERE `vendor_id` = '$vendor_id'";

        $result = mysqli_query($myConnection, $query_assetinfo) or die(mysqli_error($myConnection));

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
		
		if (isset($_POST['delete_vendor'])){
   {

        $id=mysqli_real_escape_string($myConnection, $_POST['vendor_id']);

        $sql= "DELETE FROM vendor WHERE vendor_id = '$id' ";
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
		
?>
