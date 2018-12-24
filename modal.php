

<?php
session_start();
ob_start();
 include('db.php');


$ceflix = "Yearly
";
//var_dump("total of ".count(explode(",", $mp3))." single Mp3 messages");exit;


$arrayedMessages = explode(",", $ceflix);
$title = 'ceflixSubscription';
$amount = 5500;
$time = time();


foreach ($arrayedMessages as  $value) {

  $query = "INSERT INTO `products` (`id`,`title`,`unit`,`format`,`price`,`time`) VALUES ('','$title','','$ceflix','$amount','$time')";

  if(mysql_query($query))
  {
      echo "{$value} inserted successfully! <br/>";
  }else{
    echo mysql_error();
    exit;
  }
  # code...
}

echo "<br /><br /><h2>Price : {$amount}</h2>";
echo "string";
?>



