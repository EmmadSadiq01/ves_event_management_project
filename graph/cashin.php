
<?php
 include "../db_connect.php";
 include "../admin_class.php";
 $year = $_POST['year'];
 $hallid = $_SESSION['login_hid'];
 $sql = "SELECT * from(SELECT '$year' as 'month', sum(cashin.price) as 'cashinamount' from cashin WHERE hall_id = '$hallid' AND cashin.created_at Like '%".$year."-__%')A
 Cross JOIN(SELECT sum(cashout.amount) as 'cashoutamount' from cashout where cashout.status =1 AND hallid = '$hallid' AND cashout.created_at Like '%".$year."-__%')B";
 $result = mysqli_query($conn, $sql) or die ("SQL Query Failed");
 
 if(mysqli_num_rows($result) > 0){
 
     $outputs = mysqli_fetch_all($result,MYSQLI_ASSOC);
     // echo json_encode($output);
     foreach($outputs as $row)
      {
       $output[] = array(
        'month'   => $row["month"],
        'cashinamount'   => $row["cashinamount"],
        'cashoutamount'  => $row["cashoutamount"]
       );
      }
      echo json_encode($output);
 }
 else{
     echo json_encode(array('message' => 'No Record Found.', 'status' => false));
 }
 ?>