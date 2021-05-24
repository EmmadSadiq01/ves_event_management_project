<?php

header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: *');
header ('Access-Control-Allow-Methods: DELETE');
header ('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Access-Control-Allow-Methods, Authorization, X-Requestd-With');

$data = json_decode(file_get_contents("php://input"),true);

$iq_id = $data['inqid'];

include "config.php";

$sql = "DELETE from inquery where iquery_id = {$iq_id}";

if(mysqli_query($conn, $sql)){

    echo json_encode(array('message' => 'Data Deleted.', 'status' => false));
}
else{
    echo json_encode(array('message' => 'No Data Deleted.', 'status' => false));
}
?>