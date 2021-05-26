<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);


$Bok_id = $data['Bok_id'];
$adv_amnt = 0;
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "SELECT * FROM bookings WHERE booking_id ='$Bok_id' AND hall_code='$hallCode'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $adv_amnt =  $row["advanceAmount"];
    }
  } else {
    echo "0 results";
  }

$i= 1;
while($i == 1){
$e_num='CI'.'-'. mt_rand(1,9999).'-'.date('Y') ;
$sqlu = "SELECT * FROM cashin where cashin_no = '$e_num' ";
$chk = mysqli_query($conn, $sqlu) or die ("SQL Query Failed");

if(mysqli_num_rows($chk) <= 0){
    $i = 0;
    }
}
$cashindata =$e_num;

$hall_ShortCode ='';
    $splitName = explode(" ",$_SESSION['login_hall_name']);
     foreach ($splitName as $value) {
           $hall_ShortCode .=  substr($value,0,1);
       } 
      $bill_no = "HMS-".$hall_ShortCode. "-".(1000+$Bok_id);

$sql2 = "INSERT INTO cashin(`cashin_no`,`Description`,`price`,`recept_id`,`hall_id`)
VALUES ('$cashindata','Booking Advance', '$adv_amnt','$bill_no','$hallCode')";

if (mysqli_query($conn, $sql2)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));


} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
$sql3 = "UPDATE `bookings` SET `cashIn_Status` = '1' WHERE `booking_id` = '$Bok_id'";
$result = mysqli_query($conn,$sql3)
?>