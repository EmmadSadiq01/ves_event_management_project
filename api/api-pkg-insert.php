<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');


include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);


$pkgName = $data['pkgName'];
$pkgAmnt = $data['pkgAmnt'];
$return_price = $data['return_price'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "INSERT INTO `packages` (`package_name`, `pkg_cost`, `return_price`,`hall_id`) VALUES ('$pkgName', '$pkgAmnt','$return_price', '$hallCode')";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
    
}
else{
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}

?>
