
<?php
include('../../../db_connect.php');
$str = true;

if ($_POST['hall']!="" && $_POST['shift']!="" && $_POST['event_date']!="") {
    $hall = $_POST['hall'];
    $shift = $_POST['shift'];
    $event_date = $_POST['event_date'];
    $sql = "SELECT * FROM `bookings` WHERE eventDate='$event_date' AND hallportion='$hall' AND eventShift='$shift'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $str = false;
    }
}
echo $str;

?>