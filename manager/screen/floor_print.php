<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link href="../fontawesome/fontawesome-free-5.15.3-web/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/balance.css">

</head>

<body>
    <div class="container">
        <div class="button text-center mb-3 hide-on-print">
            <button class="btn btn-primary " onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>
        <div class="print_title">
            <h1>Floor Info</h1>
        </div>
        <div class="print_header">
            <div class="entry_field">
                <h4>S.no</h4>
                <p>HMS-
                    <?php
                    include '../../admin_class.php';
                    $hall_ShortCode = '';
                    $splitName = explode(" ", $_SESSION['login_hall_name']);
                    foreach ($splitName as $value) {
                        $hall_ShortCode .=  substr($value, 0, 1);
                    }
                    echo $hall_ShortCode;
                    ?>
                    -<span id="sno"></span></p>
            </div>
            <div class="entry_field">
                <h4>Function Date</h4>
                <p id="funtionDate"></p>
            </div>
        </div>
        <div class="estimate_details">
            <!-- <div class="entry_field">
                <h4>Function Date</h4>
                <p id="funtionDate"></p>
            </div> -->
            <div class="entry_field">
                <h4>Day</h4>
                <p id="eventDay"> </p>
            </div>
            <div class="entry_field">
                <h4> Shift </h4>
                <p id="event_shift"> </p>
            </div>
            <div class="entry_field">
                <h4> Hall </h4>
                <p id="hall_portion"> </p>
            </div>
        </div>
        <div class="estimate_details">
            <div class="entry_field">
                <h4>Cell</h4>
                <p id="phone"></p>
            </div>
            <div class="entry_field">
                <h4>No. of Guest</h4>
                <p id="no_of_guest"></p>
            </div>
            <div class="entry_field">
                <h4>Occasion</h4>
                <p id="event_name"></p>
            </div>
        </div>
        <table class="inventory">
            <thead>
                <tr>
                    <th><span>#</span></th>
                    <th><span>Name</span></th>
                    <th><span>Qty.</span></th>
                    <th><span>Description</span></th>
                </tr>
            </thead>
            <tbody id="pkg_table">
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="js/print_floor.js"></script>
</body>

</html>