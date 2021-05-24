<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: PUT');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);

$bok_id = $data['bokid'];
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
$ownerId = $_SESSION['login_uid'];

include "config.php";

$sql = "UPDATE bookings SET bookingDate = '$book_Date', eventDate = '$bookevent_Date' , hijriDate = '$book_Hijridate', eventDay = '$book_eventDay', personName = '$bookperson_Name', personAddress = '$bookperson_Address', personContact = '$bookperson_Contact', personCinc = '$bookperson_Cnic', personEmail = '$bookperson_Email', eventShift = '$book_eventshift',hallportion = '$book_Portion',bookingAmount = '$book_amount', advanceAmount = '$book_advance', totalPrice = '$book_totalamount', totalGuest = '$book_Guest', eventName = '$book_eventname' WHERE booking_id = '$bok_id'";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data Updated.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data Updated.', 'status' => false));
}

?>