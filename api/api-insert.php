<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: POST');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';


$data = json_decode(file_get_contents("php://input"),true);

$inquery_Date = $data['idate'];
$inquery_Hijridate = $data['ihijtidate'];
$inquery_Name = $data['iname'];
$inquery_Address = $data['iaddress'];
$inquery_Contact = $data['icontact'];
$inquery_Cnic = $data['icnic'];
$inquery_Email = $data['iemail'];
$inquery_Portion = $data['iportion'];
$inquery_shit = $data['ishift'];
$inquery_Event = $data['ievent'];
$inquery_Cost = $data['icost'];
$inquery_Guest = $data['iguest'];
$remarks = $data['remarks'];
$hallCode = $_SESSION['login_hid'];
$userCode = $_SESSION['login_uid'];

include "config.php";

$sql = "INSERT INTO inquery (inquery_date, hijridate, personName, personAddress, personContact, personCinc, personEmail, hallportion,hall_shift, event_name, estimated_cost, totalGuest,userCode,hall_code,remarks ) 
VALUES ('$inquery_Date','$inquery_Hijridate', '$inquery_Name', '$inquery_Address','$inquery_Contact','$inquery_Cnic','$inquery_Email', '$inquery_Portion','$inquery_shit','$inquery_Event', '$inquery_Cost', '$inquery_Guest','$userCode','$hallCode','$remarks')";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data insert.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data insert.', 'status' => false));
}

?>