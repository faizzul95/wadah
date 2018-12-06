<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MAINTENANCE ASSET</title>
<script type="text/javascript">
	<?php include '../js/input_restriction.js';?>
	<?php include '../connection.php';?>
</script>
</head>

<body>
	
	<div align="center">
	<h1><br>
	  PENYELENGGARAAN ASET</h1></br>
	<a href="../wadah"> HOME </a> <br><br>
	<form action="../member/controller.php" method="post">
		>
			<table border="1" cellpadding="5" cellspacing="2">
				<tr>
					<td colspan="2"><center><b>MAKLUMAT PENYELENGGARAAN ASET</b></center></td> 
				</tr>
				<tr>
					<td>Nama Penyelenggara :</td>
					<td>
                    <div class="col-md-4">
                                      <?php
                                            
                                            $query = $myConnection->query("SELECT * FROM vendor");
                                            $rowCount = $query->num_rows;
                                            ?>

                                      <div class="form-group">
                                        <select name="vendor_name" id="" class="form-control" required>
                                        <option value="">- Sila Pilih -</option>
                                          <?php
                                          if($rowCount > 0){
                                              while($row = $query->fetch_assoc()){ 
                                                  echo '<option value="'.$row['vendor_id'].'">'.strtoupper($row['vendor_name']).'</option>';
                                              }
                                          }else{
                                              echo '<option value="">Tiada Vendor yang berdaftar</option>';
                                          }
                                          ?>
                                      </select> 
                                      </div>
                                    </div>
                    
                    
                    
                    </td>
				</tr>		
                <tr>
					<td>Tahap penyelenggaraan:</td>
					<td>
					<select name="maintenance_status" required>
						<option value="Pilih">Pilih</option>
							<option value="100%">100%</option>
							<option value="80%">80%</option>
                          							<option value="60%">60%</option>
                                                    
                            							<option value="40%">40%</option>
                                                        							<option value="20%">20%</option>


  
                            
					</select>
					</td>
				</tr>
                <tr>
					<td>Kos Penyelenggaraan :</td>
					<td><input name="maintenance_cost" value="" type="text" size="50" maxlength="50"></td>
				</tr>
                <tr>
					<td>Tempat Penyelenggaraan :</td>
					<td><input name="asset_place" value="" type="text" size="50" maxlength="50"></td>
				</tr>
                <tr>
					<td>Tempoh Hari Penyelenggaraan :</td>
					<td>
						<select name="maintenance_days">
							<option value="" >Pilih</option>
							<option value="1" >1</option>
							<option value="2">2</option>
							<option value="3" >3</option>
							<option value="4">4</option>
                            <option value="5" >5</option>
							<option value="6">6</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Penerangan Penyelenggaraan:</td>
					<td><input name="maintenance_desc" type="date"  value="" size="50" maxlength="50">
					</td>
				</tr>
                	
				
				
			<!-- Register family occupation -->
				<!-- <tr>
					<td colspan="2"><center><b>OCCUPATION (Optional)</b></center></td> 
				</tr>
				<tr>
					<td>Company Name :</td>
					<td><input name="company_name" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Address :</td>
					<td><input name="company_address" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Phone :</td>
					<td><input name="company_phone" type="text" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Company Email :</td>
					<td><input name="company_email" type="email" size="50" maxlength="50"></td>
				</tr>
				<tr>
					<td>Position :</td><td>	
					<input name="company_position" type="text" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>Start Working :</td>
					<td><input name="company_start_date" type="date" size="50" maxlength="50">
					</td>
				</tr>
				<tr>
					<td>End Working :</td>
					<td><input name="company_end_date" type="date" size="50" maxlength="50">
					</td>
				</tr> -->
				<tr align="center">
					<td colspan="2">
						<input type="submit" name="asset" value="Selenggara Aset" class="btn btn-info">
					</td>
				</tr>
			</table>
		</form>
				</div>
	
</body>
</html>