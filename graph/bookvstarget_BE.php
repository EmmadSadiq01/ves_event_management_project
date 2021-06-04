
<?php
 include "../admin_class.php";
 include "../db_connect.php";
 $hallno = $_SESSION['login_hid'];
 $year = $_POST['year'];
 $sql = "SELECT bookings.eventDate, bookings.bookingAmount as 'bookamount', bookingtarget.target_price as 'targetamount' from bookings Right JOIN bookingtarget ON bookings.eventDate = bookingtarget.target_date WHERE bookings.hall_code = '$hallno' AND bookingtarget.hall_code = '$hallno' AND bookings.eventShift='evening' AND bookings.hallportion='b' AND bookingtarget.selectShift='evening' AND bookingtarget.selectHall='b' GROUP BY bookings.eventDate, bookingtarget.target_date HAVING bookings.eventDate like '%".$year."-__%' AND bookingtarget.target_date like '%".$year."-__%'";
 $result = mysqli_query($conn, $sql) or die ("SQL Query Failed");
 
 if(mysqli_num_rows($result) > 0){
 
     $outputs = mysqli_fetch_all($result,MYSQLI_ASSOC);
     // echo json_encode($output);
     foreach($outputs as $row)
      {
       $output[] = array(
        'month'   => $row["eventDate"],
        'booking'  => $row["bookamount"],
        'target'  => $row["targetamount"]
       );
      }
      echo json_encode($output);
 }
 else{
     echo json_encode(array('message' => 'No Record Found.', 'status' => false));
 }
 ?>