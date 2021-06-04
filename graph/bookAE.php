
<?php
 

include "../db_connect.php";
$year = $_POST['year'];
$sql = "SELECT eventDate, sum(bookingAmount) as 'sumBooking' from bookings WHERE bookings.hallportion='a' AND bookings.eventShift='evening' GROUP BY eventDate HAVING eventDate like '%".$year."___%'";
$result = mysqli_query($conn, $sql) or die ("SQL Query Failed");

if(mysqli_num_rows($result) > 0){

    $outputs = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // echo json_encode($output);
    foreach($outputs as $row)
     {
      $output[] = array(
       'month'   => $row["eventDate"],
       'booking'  => $row["sumBooking"]
      );
     }
     echo json_encode($output);
}
else{
    echo json_encode(array('message' => 'No Record Found.', 'status' => false));
}
?>