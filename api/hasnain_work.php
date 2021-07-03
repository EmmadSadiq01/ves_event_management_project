
<?php
// PHP program to compare dates

// Declare two dates and 
// initialize it
$date1 = "2021-02-1 00:00:00";
$date2 = "2021-02-28 00:00:00";

while (true) {

    if (date('Y-m-d', strtotime("+1 day", strtotime($date1))) > date('Y-m-d', strtotime("+1 day", strtotime($date2)))) {
        echo "$date1 is latest than $date2";
        break;
    } else {
        echo date('Y-m-d', strtotime("+1 day", strtotime($date1)));
        $date1 = date('Y-m-d', strtotime("+1 day", strtotime($date1)));
    }
}
?>