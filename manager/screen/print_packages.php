<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mhs | Manager</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../fontawesome/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/balance.css">
</head>

<body>
    <header>
        <div class="button text-center mb-3 hide-on-print">
            <button class="btn btn-primary " onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>
        <h1>Packages Receipt</h1>
    </header>
    <article>
        <table class="meta">
            <tr>
                <th><span>Booking #</span></th>
                <td>HMS-
                    <?php
                    include '../../admin_class.php';
                    // include "config.php";
                    $hall_ShortCode = '';
                    $splitName = explode(" ", $_SESSION['login_hall_name']);
                    foreach ($splitName as $value) {
                        $hall_ShortCode .=  substr($value, 0, 1);
                    }
                    echo $hall_ShortCode;
                    ?>

                    -<span id="booking_id"></span></td>
            </tr>
            <tr>
                <th><span>Function Date</span></th>
                <td><span id="booking_date"></span></td>
            </tr>
            <tr>
                <th><span>Party Name</span></th>
                <td><span id="party_name">Dummy Name</span></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>#</span></th>
                    <th><span>Date</span></th>
                    <th><span>Package Name</span></th>
                    <th><span>Amount</span></th>
                    <th><span>Remarks</span></th>
                </tr>
            </thead>
            <tbody id="payments_table">
            </tbody>
        </table>
        <!-- <table class="balance">
            <tr>
                <th><span>Amount Paid</span></th>
                <td><span data-prefix>Rs</span><span id="paid_amnt">60000.00</span></td>
            </tr>
            <tr>
                <th><span>Balance</span></th>
                <td><span data-prefix>Rs</span><span id="balance">20000</span></td>
            </tr>
        </table> -->
    </article>
    <aside>
        <h1><span>Additional Notes</span></h1>
        <div>
            <p>Please confirm your function date, packages, No. of guests, setup details, or any further requirements
                before 7 working days from the function date.</p>
        </div>
    </aside>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/print_pakages.js"></script>
</body>

</html>