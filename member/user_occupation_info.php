<?php 

require ('../connection.php');
session_start();

$id = $_GET['famIC'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Admin | Senarai Pekerjaan Keluarga</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/jquery.bxslider.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <script>
        function checkDeleteMem(){
             return confirm('Padam Pekerjaan Keluarga ?');
         }
      </script>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <?php include '../member/style/navigation.php'; ?>
    </nav>

    <div class="container">
    <section>
      <div class="row">
        <div class="col-md-12">
          <article class="blog-post">
            <div class="blog-post-image">
              <a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
            </div>
            <div class="blog-post-body">
              <div class="blog-post-text">
                <br><nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><span class="glyphicon glyphicon-home"></span> &nbsp; <a href="user.php">Profil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Senarai Pekerjaan Keluarga</li>
                  </ol>
                </nav><br><br>
                <div class="container">
                <section>
                 
                         <table style="width:100%"> 
                          <tr>
                            <td width="70%">
                            
                          </td>
                          <td>
                            <form method="post" action="user_occupation_info.php?result=search">
                            <table>
                              <tr>
                                <td width="88%">
                                  <input type="text" name="search" class="form-control" size="90" autocomplete="off" required>
                                </td>
                                <td>
                                  <button type="submit" class="btn btn-primary pull-right">
                                  <span class="glyphicon glyphicon-search"></span> 
                                </button>
                                </td>
                              </tr>
                            </table>
                              </form> 
                            </td>
                          </tr>   
                        </table>

                        <br>

                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Syarikat</th>
                        <th>Alamat Syarikat</th>
                        <th>No Telefon</th>
                        <th>Jawatan </th>
                        <th>Email Syarikat</th>
                        <th>Tarikh Mula Bekerja</th>
                        <th>Tarikh Berhenti Bekerja</th>
                        <th>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php 
                           if (isset($_POST['search'])) {
                              $search = $_POST['search'];
                              $sql="SELECT * FROM `occupation_info` WHERE  `company_name` LIKE '%" . $search . "%'"; 
                              
                            }else{
                               $sql = "SELECT * FROM `occupation_info` WHERE `family_ic` = '$id'";
                            }
             
                            $result = mysqli_query($myConnection, $sql) or die(mysqli_error($myConnection));

                            if (mysqli_num_rows($result)==0){
                                 echo "Data Tidak Ditemui";
                              }
                            else{
                              $count = 1;
                               while($row = mysqli_fetch_assoc($result))
                                  { 
                                    $occupation_id = $row['occupation_id'];
                                ?>
                                   
                                   <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['company_name']; ?></td>
                                <td><?php echo $row['company_address']; ?></td>
                                <td><?php echo $row['company_phone']; ?></td>
                                <td><?php echo $row['company_position']; ?></td>
                                <td><?php echo $row['company_email']; ?></td>
                                <td><?php echo $row['company_start_date']; ?></td>
                                <td><?php echo $row['company_end_date']; ?></td>
                                <td>
                                  <button class="btn btn-primary" onclick="location.href='user_job_edit.php?jobID=<?php echo $occupation_id; ?>';">
                                    <span class="glyphicon glyphicon-edit"></span>
                                  </button>
                                   <form onsubmit="return checkDeleteMem(this);" method="post" action="controller.php?edu_id=<?php echo $occupation_id; ?>">
                                          <input type="hidden" name="occupation_id" value="<?php echo $occupation_id; ?>">
                                          <button name="deletejob" class="btn btn-danger">
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
                        <th>Nama Syarikat</th>
                        <th>Alamat Syarikat</th>
                        <th>No Telefon</th>
                        <th>Jawatan </th>
                        <th>Email Syarikat</th>
                        <th>Tarikh Mula Bekerja</th>
                        <th>Tarikh Berhenti Bekerja</th>
                        <th>Tindakan</th>
                      </tr>
                    </tfoot>
                  </table>
                </section>
              </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
    </div><!-- /.container -->

    <footer class="footer">
      <?php include '../style/footer.php'; ?>
    </footer>

    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.bxslider.js"></script>
    <script src="../js/mooz.scripts.min.js"></script>
  </body>
</html>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h2 class="modal-title" id="exampleModalLabel"><center><font color="white">MAKLUMAT PENDIDIKAN</font></center></center></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
            <input type="submit" class="btn btn-secondary" name="" data-dismiss="modal" onClick="window.location.reload()" value="Tutup">
            <input type="submit" class="btn btn-primary" name="updatestudy" value="Kemaskini">
    </div>
    </div>
  </div>
</div>
