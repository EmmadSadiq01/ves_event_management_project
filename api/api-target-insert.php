<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);

$targetPrice = $data['targetPrice'];
$targetDate = $data['targetDate'];
$hallCode = $_SESSION['login_hid'];
$ownerId = $_SESSION['login_uid'];
$targetHall = $data['targetHall'];
$targetshift = $data['targetshift'];

include "config.php";

$sql = "INSERT INTO `bookingtarget` (`target_date`, `target_price`, `owner_id`, `hall_code`,`selectHall`,`selectShift`)
VALUES ('$targetDate', '$targetPrice', '$ownerId','$hallCode','$targetHall','$targetshift')";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
?>