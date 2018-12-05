
                  <br>

                    <tr>  
                       <td colspan="8">
                        <input type="submit" name="login" value="Daftar Pekerjaan" onclick="location.href='user_job_reg.php?member_ic=<?php echo $member_ic; ?>';" class="btn btn-primary pull-right">
                        </td>
                    </tr> 
                  </table>

                  <br><br> <br>

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Syarikat</th>
                        <th>Alamat Syarikat</th>
                        <th>Nombor Telefon</th>
                        <th>Email</th>
                        <th>Jawatan</th>
                        <th colspan="2">Tempoh Pekerjaan</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php 

                           $sql = "SELECT * FROM `occupation_info` WHERE `member_ic` = '$member_ic' ORDER BY `company_end_date` DESC";
                        $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                            if (mysqli_num_rows($result)==0){
                                 echo "Data Tidak Ditemui";
                              }
                            else{
                              $count = 1;
                              while($row = mysqli_fetch_assoc($result))
                               { 
                                ?>
                                   
                                   <tr>
                        <td><?php echo $count; ?></td>
                        <td><center><?php echo $row['company_name']; ?></center></td>
                        <td><center><?php echo $row['company_address']; ?></center></td>
                        <td><center><?php echo $row['company_phone']; ?></center></td>
                        <td><center><?php echo $row['company_email']; ?></center></td>
                        <td><center><?php echo $row['company_position']; ?></center></td>
                        <td colspan="2"><center><?php echo $row['company_start_date']; ?> - <?php echo $row['company_end_date']; ?></center></td>

                        <td><button class="btn btn-primary" onclick="location.href='user_job_edit.php?jobID=<?php echo $row['occupation_id']; ?>';">Kemaskini</button><br>
                          <form method="post" action="controller.php?jobID=<?php echo $row["occupation_id"]; ?>">
                                  <input type="hidden" name="occupation_id" value="<?php echo $row["occupation_id"]; ?>">
                                  <input type="submit" name="deletejob" onclick='return checkDeleteJob()' class="btn btn-danger" value="Padam">
                            </form></td>
                      </tr>

                                  <?php
                                  $count++;
                                }
                               } 
                                ?>

                    </tbody>
                    <tfoot>
                      <tr>
                         <th>No.</th>
                        <th>Nama Syarikat</th>
                        <th>Alamat Syarikat</th>
                        <th>Nombor Telefon</th>
                        <th>Email</th>
                        <th>Jawatan</th>
                        <th colspan="2">Tempoh Pekerjaan</th>
                        <th>Tindakan</th>
                      </tr>
                    </tfoot>
                  </table>