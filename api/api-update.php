<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: PUT');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

include '../admin_class.php';

$data = json_decode(file_get_contents("php://input"),true);

$iq_id = $data['inqid'];
$inquery_Date = $data['idate'];
$inquery_Hijridate = $data['ihijtidate'];
$inquery_Name = $data['iname'];
$inquery_Address = $data['iaddress'];
$inquery_Contact = $data['icontact'];
$inquery_Cnic = $data['icnic'];
$inquery_Email = $data['iemail'];
$inquery_Portion = $data['iportion'];
$inquery_shift = $data['ishift'];
$inquery_Event = $data['ievent'];
$inquery_Cost = $data['icost'];
$inquery_Guest = $data['iguest'];
$hallCode = $_SESSION['login_hid'];
$ownerId = $_SESSION['login_uid'];

include "config.php";

$sql = "UPDATE inquery SET inquery_date= '$inquery_Date', hijridate= '$inquery_Hijridate', personName= '$inquery_Name', personAddress= '$inquery_Address', personContact= '$inquery_Contact', personCinc= '$inquery_Cnic', personEmail= '$inquery_Email', hallportion= '$inquery_Portion', hall_shift='$inquery_shift', event_name= '$inquery_Event', estimated_cost= '$inquery_Cost', totalGuest= '$inquery_Guest' WHERE iquery_id = '$iq_id'";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data Updated.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data Updated.', 'status' => false));
}

?>