<?php
session_start();
ob_start();
 include('db.php');



if(isset($_POST['submit'])){//PHP script that submit index form
   $name     = $_POST['name'];
   $email    = $_POST['email'];
   $phone    = $_POST['phone'];
   $church   = $_POST['church'];
   $services = $_POST['services'];
   $comments = $_POST['comments'];

if(!empty( $name )&&!empty($email)&&!empty( $phone )&&!empty( $church)&&!empty( $services )&&!empty($comments)){
  // implode to store and display values of individual checked checkbox.
    $services = implode(",", $_POST['services']);



          header('Location:index.php');exit;
        $_SESSION['alert'] ='<div style="background-color:#228B22; color:#fff; text-align:center; font-size:17px; height: 50px">message submitted successfully !</div>';
     $query = "INSERT INTO `imm_form` VALUES('','".mysql_real_escape_string($name )."','".mysql_real_escape_string($email )."','".mysql_real_escape_string($phone )."','".mysql_real_escape_string($church)."','".mysql_real_escape_string($services)."','".mysql_real_escape_string($comments)."',now())";
if($query_run = mysql_query($query)){
   

}else{
       $_SESSION['alert'] ='<div style="background-color:#CA3433; color:#fff; text-align:center; font-size:17px; height: 50px">message could not be submitted at this time, try again later !</div>';
         header('Location:index.php');
   
   }
  }
}

?>

4x