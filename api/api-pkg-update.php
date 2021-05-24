<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');


include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);

$packages_id = $data['packages_id'];
$package_name = $data['package_name'];
$pkg_cost = $data['pkg_cost'];
$return_price = $data['return_price'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "UPDATE packages SET package_name='$package_name', pkg_cost='$pkg_cost', pkg_cost='$pkg_cost', return_price='$return_price' WHERE packages_id='$packages_id' AND hall_id='$hallCode'";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
