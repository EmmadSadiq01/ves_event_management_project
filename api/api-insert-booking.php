<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"), true);
$book_Date = $data['bokdate'];
$bookevent_Date = $data['beventdate'];
$book_Hijridate = $data['bhijtidate'];
$book_eventDay = $data['beventday'];
$bookperson_Name = $data['bpname'];
$bookperson_Address = $data['bpaddress'];
$bookperson_Contact = $data['bpcontact'];
$bookperson_Cnic = $data['bpcnic'];
$bookperson_Email = $data['bpemail'];
$book_eventshift = $data['beventshift'];
$book_Portion = $data['bportion'];
$book_amount = $data['bamount'];
$book_advance = $data['badvance'];
$book_totalamount = $data['btotal'];
$book_Guest = $data['bguest'];
$book_eventname = $data['beventname'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "INSERT INTO bookings(`bookingDate`, `eventDate`, `hijriDate`, `eventDay`, `personName`, `personAddress`, `personContact`, `personCinc`, `personEmail`, `eventShift`, `hallportion`, `bookingAmount`, `advanceAmount`, `totalPrice`, `totalGuest`, `eventName`,`userCode`,`hall_code`) 
VALUES ( '$book_Date', '$bookevent_Date', '$book_Hijridate', '$book_eventDay', '$bookperson_Name', '$bookperson_Address', '$bookperson_Contact', '$bookperson_Cnic', '$bookperson_Email', '$book_eventshift', '$book_Portion', '$book_amount', '$book_advance', '$book_totalamount', '$book_Guest', '$book_eventname','$userCode','$hallCode');";

if (mysqli_query($conn, $sql)) {

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
} else {
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}


?>
