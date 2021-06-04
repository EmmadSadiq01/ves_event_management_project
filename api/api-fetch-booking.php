<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"),true);
$eventDate = $data['eventDate'];
include '../admin_class.php';
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];
include "config.php";

$sql = "select * from bookings where eventDate = '$eventDate' AND hall_code={$hallCode}";
$result = mysqli_query($conn, $sql) or die ("SQL Query Failed");

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
?>