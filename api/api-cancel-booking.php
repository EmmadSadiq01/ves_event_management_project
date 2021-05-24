<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: PUT');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization, X-Requestd-With');

$data = json_decode(file_get_contents("php://input"),true);

$bok_id = $data['bokid'];

include "config.php";

$sql = "UPDATE bookings SET status = 'deactivate' WHERE booking_id = '$bok_id'";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data Updated.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data Updated.', 'status' => false));
}

?>