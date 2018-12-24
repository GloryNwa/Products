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
   $ceflix_tunes = $_POST['ceflixTunes'];
   $time     = time();

if(!empty( $name )&&!empty($email)&&!empty( $phone )&&!empty( $church)&&!empty( $services)&&!empty( $ceflix_tunes) ){
  // implode to store and display values of individual checked checkbox.
    // $services = implode(",", $_POST['services']);

    $query = "INSERT INTO `products_order` VALUES('','".mysql_real_escape_string($name )."','".mysql_real_escape_string($email )."','".mysql_real_escape_string($phone )."','".mysql_real_escape_string($church)."','".mysql_real_escape_string(implode(",",$services))."','".mysql_real_escape_string(implode(",",$ceflix_tunes))."','$time')";

     if($query_run = mysql_query($query)){

          $_SESSION['alert'] ='<div style="background-color:#228B22; color:#fff; text-align:center; font-size:17px; height: 50px">Request submitted successfully, we will get back to you as soon as possible. Thank you!</div>';
          header('Location:index.php');exit;

     }else{
         // $_SESSION['alert'] ='<div style="background-color:#CA3433; color:#fff; text-align:center; font-size:17px; height: 50px">Message could not be submitted at this time, try again later !</div>';
         // header('Location:index.php');
        echo mysql_error();
   
       }
     }else{
          $_SESSION['alert'] ='<div style="background-color:#CA3433; color:#fff; text-align:center; font-size:17px; height: 50px">No mressage format has been selected. Select message format and try again later !</div>';
          $_SESSION['form_values'] = $_POST;

          header('Location:index.php');
     }
   }

?>
