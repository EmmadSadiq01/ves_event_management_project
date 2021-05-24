<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);


$pkg_id = $data['pkg_id'];
$pkg_name = $data['pkg_name'];
$pkg_cost = $data['pkg_cost'];
$booking_id = $data['booking_id'];
$qty_pkg    = $data['qty_pkg'];
$pkg_desc    = $data['pkg_desc'];
$included = $data['included'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "INSERT INTO `booked_packages` (`pkg_id`, `pkg_name`, `pkg_cost`,`qty_pkg`,`pkg_desc`, `booking_id`,`hall_code`,`included`,`userCode`) VALUES ('$pkg_id', '$pkg_name', '$pkg_cost','$qty_pkg','$pkg_desc', '$booking_id','$hallCode','$included','$userCode')";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
}
else{
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
$cashindata =$e_num;


$sql2 = "INSERT INTO cashin(`cashin_no`,`Description`,`price`,`recept_id`,`hall_id`)
VALUES ('$cashindata','Package $pkg_name', '$pkg_cost','$booking_id','$hallCode')";

if (mysqli_query($conn, $sql2)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
?>