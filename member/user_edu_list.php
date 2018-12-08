
                        <br>

                        <table style="width:100%"> 
                        <tr>  
                           <td colspan="8">
                            <input type="submit" name="login" value="Daftar Institusi" onclick="location.href='user_edu_reg.php?member_ic=<?php echo $member_ic; ?>';" class="btn btn-primary pull-right">
                          </td>
                      </tr> 
                        </table>

                      <br>
                  <div class="table-responsive-sm">
                    <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Institusi</th>
                          <th>Alamat Institusi</th>
                          <th>Nombor Telefon</th>
                          <th>Kursus</th>
                          <th>Tahap Pengajian</th>
                          <th colspan="2">Tarikh</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php 

                             $sql = "SELECT * FROM `education_info` WHERE `member_ic` = '$member_ic' ORDER BY `edu_end_date` DESC";
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
                          <td><center><?php echo $row['edu_name']; ?></center></td>
                          <td><center><?php echo $row['edu_address']; ?></center></td>
                          <td><center><?php echo $row['edu_phone']; ?></center></td>
                          <td><center><?php echo $row['edu_course']; ?></center></td>
                          <td><center><?php echo $row['edu_level']; ?></center></td>
                          <td colspan="2"><center><?php echo $row['edu_start_date']; ?> - <?php echo $row['edu_end_date']; ?></center></td>
                          <td><button class="btn btn-primary" onclick="location.href='user_edu_edit.php?eduID=<?php echo $row["edu_id"]; ?>';">Kemaskini</button><br>

                             <form method="post" action="controller.php?eduID=<?php echo $row["edu_id"]; ?>">
                                    <input type="hidden" name="edu_id" value="<?php echo $row["edu_id"]; ?>">
                                    <input type="submit" name="deleteedu" onclick='return checkDeleteEdu()' class="btn btn-danger" value="Padam">
                              </form>
                          </td>
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
                          <th>Nama Institusi</th>
                          <th>Alamat Institusi</th>
                          <th>Nombor Telefon</th>
                          <th>Kursus</th>
                          <th>Tahap Pengajian</th>
                          <th colspan="2">Tarikh</th>
                          <th>Tindakan</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>