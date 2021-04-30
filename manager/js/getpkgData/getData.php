
<?php
    $conn = mysqli_connect("localhost","root","","mhs_db") or die("Connection Failed");

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $party_id = $_POST['party_id'];
    $sql_bill = "SELECT bill_no FROM bill";
    $bill_result = mysqli_query($connection, $sql_bill);
    while ($row = mysqli_fetch_assoc($bill_result)) {
        $bill_no = $row['bill_no'] + 1;
    }



    $net_amount = $_POST['net'];
    $additional = $_POST['additional'];
    $Gross_amount = $_POST['Gross_amount'];
    $store_name = $_POST['store'];
    $pre_balance = $_POST['previous_balance'];
    $current_balance = 0;


    for ($count = 0; $count < count($_POST["product_name"]); $count++) {
        $name = $_POST['product_name'][$count];
        $quantity = $_POST['quantity'][$count];
        $discount = $_POST['discount'][$count];
        $packing = $_POST['packing'][$count];
        $price = $_POST['price'][$count];
        $before = $_POST['before'][$count];
        $dis_val = $_POST['dis_val'][$count];
        $total = $_POST['total'][$count];
        $order_no = $_POST['order_no'][$count];
        if ($name != "") {
            $query = "INSERT INTO sell (pname, qty, price,discount,packing,before_dis,dis_val,total,customer,bill_no,`additional`,`gross_amount`,`order_no`,`store_name`) VALUES ('$name','$quantity','$price','$discount','$packing','$before','$dis_val','$total','$party_id','$bill_no','$additional','$Gross_amount','$order_no','$store_name')";
            $result = mysqli_query($connection, $query);
        }
    }

    $sql_bill = "INSERT INTO bill (bill_no,bill_balance) VALUES ('$bill_no','$pre_balance')";
    $bill_result = mysqli_query($connection, $sql_bill);

    $sql_balance = "SELECT * FROM current_balance Where balance_coustomer= '$party_id'";
    $result_balance = mysqli_query($connection,$sql_balance);
    while($row = mysqli_fetch_assoc($result_balance)){
        $current_balance = $row['amount'];
    }
    $current_balance +=$net_amount+$additional;
    $sql_balance = "UPDATE `current_balance` SET `amount` = '$current_balance' WHERE `balance_coustomer` = '$party_id'";
    $result_balance = mysqli_query($connection,$sql_balance);
   

    $bill_date = date('y-m-d');
    $total_amount = $net_amount+$additional;
    $sql_ledger = "INSERT INTO ledger(`bill_date`,`bill_no`,`party_id`,`description`,`total_amount`,`credit`) VALUES ('$bill_date','$bill_no','$party_id','Sales','$total_amount',0)";
    $ledger_result = mysqli_query($connection, $sql_ledger);



    // send to print screen with bill id
    $_SESSION['bill_no'] = $bill_no;
    header('Location: http://localhost/homeo_point/bill.php');
}
?>