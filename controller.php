<?php 
include_once("connection.php");

//log in user
if(isset($_POST['memberlog']))   
{
   
     $username=mysqli_real_escape_string($myConnection, $_POST['usr_username']);
     $password = mysqli_real_escape_string($myConnection, $_POST['usr_password']);
    
     $sql = "SELECT * FROM `user` WHERE `usr_username` = '$username' AND `usr_password` = '$password'";
     $res = mysqli_query($myConnection,$sql) or die(mysqli_error($myConnection));
     $row = mysqli_fetch_array($res);


     if (mysqli_num_rows($res)==0) { 

           echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Wrong Username or Password, Please Try Again')
          window.location = 'login.php?page=LoginFail';
          </SCRIPT>");
         
     }
     else { 
              
        session_start();
        $_SESSION['memberIC'] = $row['usr_username'];
        $_SESSION['UserID'] = $row['user_id'];
        $_SESSION['role'] = $row['usr_role'];

       echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.location = 'member/user.php?page=$id';
          </SCRIPT>");
     }

}


?>













