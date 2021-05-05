
<?php
       $conn = mysqli_connect("localhost","root","","mhs_db") or die("Connection Failed");


        $hall = $_POST['hall'];
        $shift = $_POST['shift'];
        $event_date = $_POST['event_date'];
        $sql = "SELECT target_price FROM bookingtarget WHERE target_date='$event_date' and selectHall='$hall' AND selectShift='$shift'";
        $result = mysqli_query($conn,$sql);
        
        $str = "";
        while($row = mysqli_fetch_assoc($result)){
            $str = $row['target_price'];
    
        }
    echo $str;

?>