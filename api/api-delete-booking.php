<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: DELETE');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

$data = json_decode(file_get_contents("php://input"),true);

$bok_id = $data['bokid'];

include "config.php";

$sql = "DELETE from bookings where booking_id = {$bok_id}";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Booking Data Deleted.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Booking Data Deleted.', 'status' => false));
}
?>