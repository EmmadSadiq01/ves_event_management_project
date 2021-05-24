<?php    
include('../../../db_connect.php');



    $booked_pkg_id =  $_POST['booked_pkg_id'];
    $sql = "SELECT * FROM return_package WHERE pkg_booked_id={$booked_pkg_id}";
    $result = mysqli_query($conn, $sql);
        
        $str = "";
        while($row = mysqli_fetch_assoc($result)){
            $str = $row['amnt'];
    
        }
    echo $str;

?>