<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');


include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);


$pkg_id = $data['pkg_id'];
$booking_id = $data['booking_id'];
$pkg_booked_id = $data['pkg_booked_id'];
$pkg_name = $data['pkg_name'];
$pkg_cost = $data['pkg_cost'];
$qty_pkg    = $data['qty_pkg'];
$return_status  = $data['return_status'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "UPDATE `booked_packages` SET `return_amnt` = '$pkg_cost', `return_qty` = '$qty_pkg', `return_status`='$return_status' WHERE `booked_packages`.`id` = {$pkg_id};";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}
//id wala kaam
    $i= 1;
    while($i == 1){
    $e_num='CO'.'-'. mt_rand(1,9999).'-'.date('Y') ;
    $sqlu = "SELECT * FROM cashout where cashout_no = '$e_num' ";
    $chk = mysqli_query($conn, $sqlu) or die ("SQL Query Failed");

    if(mysqli_num_rows($chk) <= 0){
        $i = 0;
        }
    }
    $cashoutdata =$e_num;

    $hall_ShortCode ='';
    $splitName = explode(" ",$_SESSION['login_hall_name']);
     foreach ($splitName as $value) {
           $hall_ShortCode .=  substr($value,0,1);
       } 
      $bill_no = "HMS-".$hall_ShortCode. "-".(1000+$booking_id);
      
$sql2 = "INSERT INTO `cashout` (`cashout_no`, `bill_no`, `description`, `priority`, `amount`, `providby`, `status`,`hallid`,`userid`)
VALUES ('$cashoutdata','$bill_no','Package Return Amount From $pkg_name','3','$pkg_cost','Manager','1','$hallCode','$userCode');";

if (mysqli_query($conn, $sql2)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}

?>
