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
        <h1>Payment Recipt</h1>
    </header>
    <article>
        <table class="meta">
            <tr>
                <th class="text-center"><span>Booking #</span></th>
                <td class="text-center">HMS-
                    <?php
                    include '../../admin_class.php';
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
                <th class="text-center"><span>Function Date</span></th>
                <td class="text-center"><span id="booking_date"></span></td>
            </tr>
            <tr>
                <th class="text-center"><span>Party Name</span></th>
                <td class="text-center"><span id="party_name">Dome Name</span></td>
            </tr>
        </table>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>#</span></th>
                    <th><span>Date</span></th>
                    <th><span>Amount</span></th>
                </tr>
            </thead>
            <tbody id="payments_table">
            </tbody>
        </table>
        <table class="balance">
            <tr>
                <th class="text-center"><span>Amount Paid</span></th>
                <td class="text-center"><span data-prefix>Rs</span><span id="paid_amnt"></span></td>
            </tr>
            <tr>
                <th class="text-center"><span>Balance</span></th>
                <td class="text-center"><span data-prefix>Rs</span><span id="balance"></span></td>
            </tr>
        </table>
    </article>
    <aside>
        <h1><span>Additional Notes</span></h1>
        <div>
            <p>Amount Recieved By: __________________.</p>
        </div>
    </aside>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/booking_balance.js"></script>
</body>

</html>