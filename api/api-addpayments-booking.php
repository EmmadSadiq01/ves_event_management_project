<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"), true);
$balBookId = $data['balBookId'];
$balPaymentDate = $data['balPaymentDate'];
$balPayment = $data['balPayment'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "INSERT INTO `bookingpay` (`booking_no`,`partial_payments`, `payment_date`,`hallCode`,`userCode`) VALUES ('$balBookId','$balPayment', '$balPaymentDate','$hallCode','$userCode')";
if (mysqli_query($conn, $sql)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}

//id wala kaam
$i= 1;
while($i == 1){
$e_num='CI'.'-'. mt_rand(1,9999).'-'.date('Y') ;
$sqlu = "SELECT * FROM cashin where cashin_no = '$e_num' ";
$chk = mysqli_query($conn, $sqlu) or die ("SQL Query Failed");

if(mysqli_num_rows($chk) <= 0){
    $i = 0;
    }
}
$cashindata = $e_num;


$sql2 = "INSERT INTO cashin(`cashin_no`,`Description`,`price`,`recept_id`,`hall_id`)
VALUES ('$cashindata','Booking Partial Payment', '$balPayment','$balBookId','$hallCode');";

if (mysqli_query($conn, $sql2)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
?>