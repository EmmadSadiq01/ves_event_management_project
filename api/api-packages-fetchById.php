<?php
header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents("php://input"),true);
$booking_id = $data['booking_id'];

include "config.php";

$sql = "select * from packages ORDER BY `packages`.`package_name` ASC";
$result = mysqli_query($conn, $sql) or die ("SQL Query Failed");

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
?>