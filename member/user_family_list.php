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

                         <?php 
                          $sql = "SELECT * FROM `family` WHERE `member_ic` = '$mmbrIC'";
                             $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
                             $row = mysqli_fetch_array($res);

                             if (mysqli_num_rows($res)!=0) { ?>
                              <input type="submit" name="login" value="Daftar Pendidikan" onclick="location.href='family_edu_reg.php?member_ic=<?php echo $member_ic; ?>';" class="btn btn-success pull-right">&nbsp; &nbsp;
                              <input type="submit" name="login" value="Daftar Pekerjaan" onclick="location.href='family_job_reg.php?member_ic=<?php echo $member_ic; ?>';" class="btn btn-success pull-right"> &nbsp; &nbsp;
                          <?php }?>
                        </td>
                    </tr> 
                  </table>

                  <br>

                  <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No Kad Pengenalan</th>
                        <th>Nombor Telefon</th>
                        <th>Alamat</th>
                        <th>Tarikh Lahir</th>
                        <th>Hubungan Keluarga</th>
                        <th>Email</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
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
                                  $family_ic = $row['family_ic'];
                                ?>
                          <tr>

                        <td><?php echo $count; ?></td>
                        <td><center><?php echo $row['family_name']; ?></center></td>
                        <td><center><?php echo $row['family_ic']; ?></center></td>
                        <td><center><?php echo $row['family_phone']; ?></center></td>
                        <td><center><?php echo $row['family_address']; ?></center></td>
                        <td><center><?php echo $row['family_dob']; ?></center></td>
                        <td><center><?php echo $row['family_relation']; ?></center></td>
                        <td><center><?php echo $row['family_email']; ?></center></td>
                        <td><center> <?php 
                          $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$family_ic'";
                             $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
                             $row = mysqli_fetch_array($res);

                             if (mysqli_num_rows($res)!=0) { ?>
                          <button class="btn btn-info" onclick="location.href='user_edu_info.php?famIC=<?php echo $row['family_ic']; ?>';">Lihat</button>
                             <?php }else{ ?>
                               <center> - Tiada Maklumat - </center>
                        <?php } ?></center></td>
                        <td>
                          <center>
                            <?php 
                          $sql = "SELECT * FROM `education_info` WHERE `family_ic` = '$family_ic'";
                             $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
                             $row = mysqli_fetch_array($res);

                             if (mysqli_num_rows($res)!=0) { ?>
                          <button class="btn btn-info" onclick="location.href='user_edu_info.php?famIC=<?php echo $row['family_ic']; ?>';">Lihat</button>
                             <?php }else{ ?>
                               <center> - Tiada Maklumat - </center>
                        <?php } ?>
                          </center>
                        </td>

                       <!--  <td>
                          <button class="btn btn-primary" onclick="location.href='user_family_edit.php?family_ic=<?php echo $family_ic; ?>';">Kemaskini</button><br>
                          <form method="post" action="controller.php?family_ic=<?php echo $family_ic; ?>">
                              <input type="text" name="family_ic" value="<?php echo $family_ic; ?>">
                              <input type="submit" name="deletefamily" onclick='return checkDeleteFamily()' class="btn btn-danger" value="Padam">
                          </form>
                        </td>
 -->
                        <td>
                            <button class="btn btn-primary" onclick="location.href='user_family_edit.php?family_ic=<?php echo $family_ic; ?>';">
                              <span class="glyphicon glyphicon-edit"></span>
                            </button>
                             <form onsubmit="return checkDeleteFamily(this);" method="post" action="controller.php?family_ic=<?php echo $family_ic; ?>">
                                    <input type="hidden" name="family_ic" value="<?php echo $family_ic; ?>">
                                    <button name="deletefamily" class="btn btn-danger">
                                      <span class="glyphicon glyphicon-trash"></span> 
                                    </button>
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
                        <th>Nama</th>
                        <th>No Kad Pengenalan</th>
                        <th>Nombor Telefon</th>
                        <th>Alamat</th>
                        <th>Tarikh Lahir</th>
                        <th>Hubungan Keluarga</th>
                        <th>Email</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Tindakan</th>
                      </tr>
                    </tfoot>
                  </table>