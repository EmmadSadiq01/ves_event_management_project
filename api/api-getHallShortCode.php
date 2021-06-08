<?php

session_start();
header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');

include "config.php";
$hall_ShortCode ='';
$splitName = explode(" ",$_SESSION['login_hall_name']);
 foreach ($splitName as $value) {
       $hall_ShortCode .=  substr($value,0,1);
   } 
//   $bill_no = "HMS-".$hall_ShortCode. "-".(1000+$booking_id);
  echo json_encode($hall_ShortCode);
?>