
<?php
       include('../../../db_connect.php');

session_start();
        $hall = $_POST['hall'];
        $shift = $_POST['shift'];
        $event_date = $_POST['event_date'];
        $hallCode = $_SESSION['login_hid'];
        $sql = "SELECT target_price FROM bookingtarget WHERE target_date='$event_date' and selectHall='$hall' AND selectShift='$shift' AND hall_code='$hallCode'";
        $result = mysqli_query($conn,$sql);
        
        $str = "";
        while($row = mysqli_fetch_assoc($result)){
            $str = $row['target_price'];
    
        }
    echo $str;

?>