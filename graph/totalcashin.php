
<?php
 include "../db_connect.php";
 include "../admin_class.php";
 $year = $_POST['year'];
 $hallid = $_SESSION['login_hid'];
 $sql = "SELECT 'Cashin' as 'name', sum(cashin.price) as 'amount' from cashin where hall_id = '$hallid' AND cashin.created_at Like '%".$year."-__%'";
 $result = mysqli_query($conn, $sql) or die ("SQL Query Failed");
 
 if(mysqli_num_rows($result) > 0){
 
     $outputs = mysqli_fetch_all($result,MYSQLI_ASSOC);
     // echo json_encode($output);
     foreach($outputs as $row)
      {
       $output[] = array(
        'name'   => $row["name"],
        'amount'  => $row["amount"]
       );
      }
      echo json_encode($output);
 }
 else{
     echo json_encode(array('message' => 'No Record Found.', 'status' => false));
 }
 ?>