              <!--   <table style="width:100%"> 
                          <tr bgcolor="#5097A4">
                            <td colspan="8"> <center><b>MAKLUMAT KELUARGA</b></center></td>
                          </tr>  
                </table> -->
                <table style="width:100%"> 

                  <br>

                    <tr>  
                       <td colspan="8">
                        <input type="submit" name="login" value="Daftar Keluarga" onclick="location.href='user_family_reg.php?member_ic=<?php echo $member_ic; ?>';" class="btn btn-primary pull-right">
                        </td>
                    </tr> 
                  </table>

                  <br>

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Nombor IC</th>
                        <th>Nombor Telefon</th>
                        <th>Hubungan Keluarga</th>
                        <th>Pekerjaan</th>
                        <th>Pelajaran</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php 

                            $sql = "SELECT * FROM `family` WHERE `member_ic` = '$member_ic' ORDER BY `family_dob` ASC";
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
                        <td><center><?php echo $row['family_name']; ?></center></td>
                        <td><center><?php echo $row['family_ic']; ?></center></td>
                        <td><center><?php echo $row['family_phone']; ?></center></td>
                        <td><center><?php echo $row['family_relation']; ?></center></td>
                        <td><center><button onclick="location.href='occupation_registration.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
                        <td><center><button onclick="location.href='list_education.php?family_ic=<?php echo $row['family_ic']; ?>';">Detail</button></center></td>
                        <td><center><button onclick="location.href='family_edit.php?family_ic=<?php echo $row['family_ic']; ?>';">Edit</button></center></td>

                        <td><button class="btn btn-primary" onclick="location.href='member_edit.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Kemaskini</button><br><button class="btn btn-danger" onclick="location.href='member_delete.php?member_ic=<?php echo $row['mbr_ic']; ?>';">Buang</button></td>
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
                        <th>Nama</th>
                        <th>Nombor IC</th>
                        <th>Nombor Telefon</th>
                        <th>Hubungan Keluarga</th>
                        <th>Pekerjaan</th>
                        <th>Pelajaran</th>
                        <th>Tindakan</th>
                      </tr>
                    </tfoot>
                  </table>