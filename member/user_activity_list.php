
                <table style="width:100%"> 

                  <br>
                  
                  </table>

                  <br>

                  <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                      <tr>
                        <th><center>No.</center></th>
                        <th><center>Nama Aktiviti</center></th>
                        <th><center>Tarikh</center></th>
                        <th><center>Masa</center></th>
                        <th><center>Tempat</center></th>
                        <th><center>Jenis Aktiviti</center></th>
                        <th><center>Bayaran Aktiviti</center></th>
                        <th><center>Maklum Balas</center></th>
                      </tr>
                    </thead>
                    <tbody>


                      <?php 

                        date_default_timezone_set("Asia/Kuala_Lumpur");

                        $sql = "SELECT `event`.*,`member`.*,`naqib`.*,`activity`.* FROM `event` 
                         INNER JOIN  `member` ON `event`.`member_ic` = `member`.`mbr_ic`
                         INNER JOIN  `naqib` ON `event`.`naqib_ic` = `naqib`.`naqib_ic`
                         INNER  JOIN  `activity` ON `event`.`activity_id` = `activity`.`act_id`
                        WHERE `member_ic` = '$member_ic'";
                        $result = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
                        if (mysqli_num_rows($result)==0){
                                 echo "Data Tidak Ditemui";
                              }
                            else{
                              $today = date('Y-m-d');
                              $count = 1;
                              while($row = mysqli_fetch_assoc($result))
                                { 
                                  $act_date = $row['act_date'];
                                  $act_id = $row['act_id'];
                                  
                                ?>
                                   
                                   <tr>
                        <td><?php echo $count; ?></td>
                        <td><center><?php echo $row['act_name']; ?></center></td>
                        <td><center><?php echo $act_date ?></center></td>
                        <td><center><?php echo $row['act_time']; ?></center></td>
                        <td><center><?php echo $row['act_venue']; ?></center></td>
                        <td><center><?php echo $row['act_type']; ?></center></td>
                       
                        <td> 
                          <center><?php 
                           $result2 = $myConnection->query("SELECT * FROM `fees` WHERE `member_ic` = '$member_ic' AND `activity_id` = '$act_id'");
                           $row2 = $result2->fetch_assoc();
                           $Fee_activity_status = $row2['Fee_status'];
                                  if ($Fee_activity_status == NULL) {
                                    echo "<b><a href=''><font color='red'> BELUM DIBAYAR </font></a><b>";
                                  }else {
                                    echo "<b><a href=''><font color='green'>".strtoupper($Fee_activity_status)."</font></a><b>"; 
                                  }
                                  ?> </center>
                        </td>        
                        <td>
                          <?php 
                           $result3 = $myConnection->query("SELECT * FROM `fees` WHERE `member_ic` = '$member_ic' AND `activity_id` = '$act_id'");
                           $row3 = $result3->fetch_assoc();
                           $Fee_activity_status = $row3['Fee_status'];
                           $fees_activity_id = $row3['activity_id'];

                           $result4 = $myConnection->query("SELECT * FROM `feedback` WHERE `activity_id` = '$act_id'");
                           $row4 = $result4->fetch_assoc();
                           $feedback_activity = $row4['activity_id'];

                          if($today >= $act_date AND $Fee_activity_status == "Telah Dibayar" AND $feedback_activity == NULL) { ?>
                          <center><button class="btn btn-info" onclick="location.href='../activity/feedbackahli.php?act_id=<?php echo $row['act_id']; ?>';">Maklum Balas</button></center>
                          <?php } else if($today >= $act_date AND $Fee_activity_status == "Telah Dibayar" AND $feedback_activity != NULL) { ?>
                              <center><span class="glyphicon glyphicon-check"></span></center>
                          <?php } ?>
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
                        <th><center>No.</center></th>
                        <th><center>Nama Aktiviti</center></th>
                        <th><center>Tarikh</center></th>
                        <th><center>Masa</center></th>
                        <th><center>Tempat</center></th>
                        <th><center>Jenis Aktiviti</center></th>
                        <th><center>Bayaran Aktiviti</center></th>
                        <th><center>Maklum Balas</center></th>
                      </tr>
                    </tfoot>
                  </table>