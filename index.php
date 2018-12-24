<?php
session_start();
ob_start();
 include('db.php');

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="device-width, inital-scale=1"/>
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
    <Title>PRODUCTS</title>   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <link href="style/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

<!--     <link rel="stylesheet" href="style2.css"> -->
  <!-- Our Website CSS Styles -->
  <link rel="stylesheet" href="css/icons.min.css" type="text/css">
  <link rel="stylesheet" href="css/main.css" type="text/css">
  <link rel="stylesheet" href="css/responsive.css" type="text/css">

  <!-- Color Scheme -->
  <link rel="stylesheet" href="css/color-schemes/color.css" type="text/css" title="color3">
  <link rel="alternate stylesheet" href="css/color-schemes/color1.css" title="color1">
  <link rel="alternate stylesheet" href="css/color-schemes/color2.css" title="color2">
  <link rel="alternate stylesheet" href="css/color-schemes/color4.css" title="color4">
  <link rel="alternate stylesheet" href="/color-schemes/color5.css" title="color5">
</head>
<body id="body" style="background-color: #272c33;margin-bottom: 0px; margin-top: 20px ">
   

   <?php



if(isset($_GET['currency'])){
    $currency = $_GET['currency'];
    switch ($currency) {
    case 'USD':
      $audioUnit = 3;
      $videoUnit = 6;
      $symbol = "$";
      break;

      case 'NGN':
      $audioUnit = 200;
      $videoUnit = 400;
      $symbol ="₦";
      break;
    
    default:
      $audioUnit = 200;
      $videoUnit = 400;
      $symbol ="₦";
      # code...
      break;
    }
}else{
      $audioUnit = 200;
      $videoUnit = 400;
      $symbol ="₦";
}




    ?>
     <div class="container">
     <form action="process.php" method="POST" id="form"> 
     <h1 class="brand"><center><span> </span></center></h1>
     <div class="wrapper animated bounceInLeft">
       <div class="Web-Design" style="background-color: #535353;">      
         <center><img src="LIVESTREAM.app" style="padding-right: "></center><br><br><br>

         <p style="color:#b33a3a; font-size:20px"></p><div style="width: 100%;color:#272c33;font-size: 20px; text-align: center;  height: 30%;border: 3px dotted #272c33; background-color: #c0c0c0">Amount:<br /><span class="amountbox"></span></div>
         
      </div>
      
       <div class="contact"style="background-color: #c0c0c0;">
     <?php 
       if (isset( $_SESSION['alert'])){
         echo  $_SESSION['alert']; 
         unset( $_SESSION['alert']);
       }

       if (isset( $_SESSION['form_values'])){
         $val = $_SESSION['form_values']; 
         unset( $_SESSION['form_values']);
       }
      ?>
        <h3 style="color:#b33a3a;"> Kindly fill in your details:</h3><hr><br>
          <!-- <div class="alert">Your message has been submitted</div>  -->    
           <!-- Form> Valdation-->

       
        <div class="formarea">
          <div class="form-group">
          
          Name:<br>
                <input class="brd-rd5" type="text" class="form-control" name="name" value="<?php echo isset($val['name']) ? $val['name'] : ''; ?>"  required="required" style="width: 100%; height: 50px"/>
             
                  <span class="help-block">
                   <p></p>
                 </span>                         
                </div>
               <div class="form-group">
          Email Adrress:<br>
                <input class="brd-rd5" type="email" class="form-control" name="email" value="<?php echo isset($val['email']) ? $val['email'] : ''; ?>"  required="required" style="width: 100%; height: 50px; overflow: hidden" />
              
                  <span class="help-block">
                   <p></p>
                 </span>                         
                </div>
                 <div class="form-group">
          Phone No:<br>
                <input class="brd-rd5" type="text" class="form-control" name="phone" value="<?php echo isset($val['phone']) ? $val['phone'] : ''; ?>" required="required" style="width: 100%; height: 50px; overflow: hidden" />
              
                  <span class="help-block">
                   <p></p>
                 </span>                         
                </div>
               <div class="form-group">
          Church Name:<br>
                <input class="brd-rd5" type="text" class="form-control" name="church" value="<?php echo isset($val['church']) ? $val['church'] : ''; ?>"  required="required" style="width: 100%; height: 50px"/>
              
                  <span class="help-block">
                   <p></p>
                 </span>  
                </div>  <br> <hr>                    
              </div>
		          <h5 style="color:#b33a3a;font-weight: bold">Select Message Format:</h5>
              
                <button type="button" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#flipFlop"style="background-color: #535353; border: none"required>
                Audio Messages
                </button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-md"  data-toggle="modal" data-target="#flipUp"style="background-color: #535353; border: none"required>
                Video Messages
                </button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#flipOn"style="background-color: #535353; border: none" required>
                Ceflix Tunes
                </button>

                <!-- MP3 modal -->
                <br>
                                
               <!--  <input type="checkbox" name="services[]" value="mp3" />&nbsp;MP3 Messages<br /><br>
                 <input type="checkbox" name="services[]" value="mp4" />&nbsp;MP4 Messages<br /><br>

                <input type="checkbox" name="services[]" value="ceflixTunes" />&nbsp;Ceflix Tunes<br /><br>

                <input type="checkbox" name="services[]" value="ceflicImages" />&nbsp;Ceflix Images<br /> -->
                <br>
                       
            <p class="full"style="background-color:#272c33">
              <button type="submit" name="submit" id="submit" value="submit" class="btn btn-danger">Submit</button>
            </p>
         
        </div>


 

           <?php
           // MP3 MODAL
             $query = "SELECT * FROM `products` WHERE `format`= 'Audio' ORDER BY `id`ASC";
            ?> 
            <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="modalLabel" style="">Audio Messages</h4>
              </div>
              <div class="modal-body">
               

  <div class="col-md-4">

   <div class="" style="">      
       <br>

         <p></p><div style="width: 100%;color:#fff;font-size: 20px; text-align: center;  height: 200px;border: 3px dotted #fff; background-color: #535353">Amount:<br /><span class="amountbox"></span></div>
         
      </div>
</div>

<div class="col-md-8"style="background-color:#c0c0c0 ">
<div style="max-height:400px; overflow: scroll;overflow-x:hidden;">
  <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
       <th scope="col">Select</th>
       <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Format</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php
  if ($query_run = mysql_query($query)) {
                  
   while($query_row = mysql_fetch_assoc($query_run)){
       $title = $query_row['title'];
       $format = $query_row['format'];
       $price = $query_row['price']; 
       $id = $query_row['id'];
       $unit = $query_row['unit'];
?>

    <tr>
    <th scope="row"><input class="product_list" type="checkbox" name="services[]" amount="<?= (int)$unit * $audioUnit; ?>" value=" <?= $query_row['id'] ?>" /> <br></th>
      <td style="font-size: 13px;  "><?php echo $id; ?></td>
      <td style="font-size: 15px"><?php echo $title; ?></td>
      <td style="font-size: 13px;"><?php echo $format; ?></td>
      <td style="font-size: 13px;  "><?php echo $symbol.(int)$unit * $audioUnit; ?></td>
    </tr>   
 <?php


 }

 }
 ?>
</tbody>
</table>
</div>
</div>               
 <br>
</div>
 <div class="modal-footer" style="border-top: none !important;">
<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 20px">Close</button>
</div>
 </div>
</div>
</div> 



<!-- MP4 modal -->       
   <?php
           // MP4 MODAL
             $query = "SELECT * FROM `products` WHERE `format`= 'Video' ORDER BY `id`ASC";
            ?> 
            <div class="modal fade" id="flipUp" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="modalLabel" style="">Video Messages</h4>
              </div>
              <div class="modal-body">
               

  <div class="col-md-4">

   <div class="" style="">      
       <br>

         <p></p><div style="width: 100%;color:#fff;font-size: 20px; text-align: center;  height: 200px;border: 3px dotted #fff; background-color: #535353">Amount:<br /><span class="amountbox"></span></div>
         
      </div>
</div>

<div class="col-md-8"style="background-color:#c0c0c0 ">
<div style="max-height:400px; overflow: scroll;overflow-x:hidden;">
  <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Select</th>
       <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Format</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
<?php
  if ($query_run = mysql_query($query)) {
                  
   while($query_row = mysql_fetch_assoc($query_run)){
       $title = $query_row['title'];
       $format = $query_row['format'];
       $price = $query_row['price']; 
       $id = $query_row['id']; 
?>

    <tr>
   <th scope="row"><input class="product_list" type="checkbox" name="services[]" amount="<?= (int)$unit * $videoUnit; ?>" value=" <?= $query_row['id'] ?>" /> <br></th>
      <td style="font-size: 13px;  "><?php echo $id; ?></td>
      <td style="font-size: 15px"><?php echo $title; ?></td>
      <td style="font-size: 13px;"><?php echo $format; ?></td>
      <td style="font-size: 13px;"><?php echo $symbol.(int)$unit * $videoUnit; ?></td>
    </tr>   
 <?php

 }

 }
 ?>
</tbody>
</table>
</div>
</div>               
 <br>
</div>
 <div class="modal-footer" style="border-top: none !important;">
<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 20px">Close</button>
</div>
 </div>
</div>
</div> 


<!-- Ceflix Tunes --> <!-- Ceflix Tunes --><!-- Ceflix Tunes --><!-- Ceflix Tunes --><!-- Ceflix Tunes -->       
       
         <?php
           // Celix MODAL

             $query = "SELECT 'ceflixSubscription', `price`, FROM `products`  ORDER BY `id`";
            ?> 
  
            <div class="modal fade" id="flipOn" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="modalLabel" style="">Subscribe to ceflix tunes & enjoy unlimited music, your way</h4>
              </div>


     <div class="modal-body"> 
       <div class="col-md-4">
              
           <p></p><div style="width: 100%;color:#fff;font-size: 20px; text-align: center;margin-top: 0px;  height:150px;border: 3px dotted #fff; background-color: #535353">Amount:<br /><span class="amountbox"></span></div>      
    </div><br>
    <div class="col-md-8"style="background-color:#c0c0c0 ">
<div style="max-height:400px; overflow: scroll;overflow-x:hidden;">
  <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Select</th>
       <!-- <th scope="col">Id</th> -->
      <th scope="col">Subscription Plan</th>
      <th scope="col">price</th>
      
    </tr>
  </thead>
  <tbody>
<?php
  if ($query_run = mysql_query($query)) {
                  
   while($query_row = mysql_fetch_assoc($query_run)){
      
       $ceflixSubscription = $query_row['ceflixSubscription'];
       $price = $query_row['price']; 
       // $id = $query_row['id']; 
?>

    <tr>
    <th scope="row"><input class="product_list" type="checkbox" name="services[]" amount="<?= $query_row['price'] ?>" value=" <?= $query_row['id'] ?>" /> <br></th>
     <!--  <td style="font-size: 13px;  "><?php echo $id; ?></td> -->
      <td style="font-size: 13px;"><?php echo $ceflixSubscription; ?></td>
      <td style="font-size: 13px;  "><?php echo $price; ?></td>
    </tr>   
 <?php

 }

 }
 ?>
</tbody>
</table>
</div>
</div>               
 <br>
</div>
 <div class="modal-footer" style="border-top: none !important;">
<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-top: 20px">Close</button>
</div>
 </div>
</div>
</div>
 </form>
</div> 



      
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<!-- Bootstrap JS -->

<!-- Initialize Bootstrap functionality -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
          
 <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
 <script src="main.js"></script>

 <script>
 function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
 //set  initial cart amount to 0
 var amount = 0;

    $(".product_list").click(function (){

     var product_amount = parseInt($(this).attr("amount"));
      //fetch the amount of the selected producted stored in an attribute of input
     if($(this).is(':checked')){

      //add the current price of the selected product to previous total price
      amount = amount + product_amount
     

      
    }else{
           amount = amount - product_amount
      //Display total amount in Amount Box

    }
    //Display total amount in Amount Box
      $(".amountbox").html("<?php echo $symbol?>"+numberWithCommas(amount))
 });

    var form = $('#form');
    $('#submit').click(function(e){
      
      if(amount == 0){
        e.preventDefault();
      }
    });

 </script>
 <body>
</html>





