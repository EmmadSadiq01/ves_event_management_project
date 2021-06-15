<?php include('db_connect.php') ?>
<style>
    @media print {

        .hideOnPrint {
            display: none;
        }

        nav#sidebar {
            display: none;
        }

        footer.site-footer {
            display: none;
        }

        .card {
            border: none;
        }

        .card-body {
            margin: 0px;
            padding: 0px;
        }

        .col-lg-12 {
            padding: 0px;
            margin: 0px;
        }
    }

    span.text-inverse {
        font-weight: 500;
        display: block;
        font-size: 21px;
    }
</style>
<div class="container-fluid ">
    <div class="col-lg-12">

        <br class="hideOnPrint" />
        <br class="hideOnPrint" />
        <div class="card">
            <div class="card-header hideOnPrint">
                <span><b>Vender Cash Statements</b></span>
                <button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="add_ledger"><span class="fa fa-plus"></span>Add Ledger</button>
                <button class="btn btn-primary btn-sm btn-block col-md-3 float-right mt-0" type="button" id="back_btn"><span class="fas fa-arrow-left"></span>Go back</button>

            </div>
            <div class="card-body">
                <div class="container_fluid">
                    <div class="col-md-12">
                        <div class="invoice">
                            <!-- begin invoice-company -->
                            <div class="invoice-company text-inverse f-w-600">
                                <span class="pull-right hideOnPrint">
                                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                                </span>
                                <h3 class="text-center">CASH STATEMENTS</h3>
                            </div>
                            <!-- end invoice-company -->
                            <!-- begin invoice-header -->
                            <div class="invoice-header">
                                <div class="invoice-from">
                                    <!-- <small>from</small> -->
                                    <?php
                                    $sql = "SELECT * FROM venders WHERE id=" . $_GET['id'];
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {


                                    ?>
                                        <address class="m-t-5 m-b-5">
                                            <strong class="text-inverse">Vender Info</strong>
                                            <p class="mb-0"> <strong>Vender No: </strong><span id="v_number"><?php echo $row['vender_no'] ?></span></p>
                                            <p class="mb-0"> <strong>Name: </strong><span id="party_name"><?php echo $row['name'] ?></span></p>
                                            <p class="mb-0"> <strong>Contact: </strong><span id="phone" class="mb-0"><?php echo $row['contact'] ?></span></p>
                                            <p class="mb-0"> <strong>CNIC: </strong><span id="cnic" class="mb-0"><?php echo $row['cnic'] ?></span></p>
                                            <div class="client_address">
                                                <p><strong>Address: </strong><span id="address"><?php echo $row['address'] ?></span></p>
                                            </div>
                                        </address>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="invoice-date">
                                    <div class="date text-inverse m-t-5"><?php echo  date("d/m/Y")  ?></div>
                                </div>
                            </div>
                            <!-- end invoice-header -->
                            <!-- begin invoice-content -->
                            <div class="invoice-content">
                                <!-- begin table-responsive -->
                                <div class="table-responsive">
                                    <table class="table table-invoice">
                                        <thead>
                                            <tr>
                                                <th width="15%">Date</th>
                                                <th class="text-center" width="40%">Description</th>
                                                <th class="text-right" width="15%">Debit</th>
                                                <th class="text-right" width="15%">Credit</th>
                                                <th class="text-right" width="15%">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM vender_ledger WHERE vender_id=" . $_GET['id'];
                                            $result = mysqli_query($conn, $sql);
                                            $balance = 0;
                                            $total_debit = 0;
                                            $total_credit = 0;
                                            while ($row = mysqli_fetch_assoc($result)) {


                                            ?>
                                                <tr>
                                                    <td class="text-left"><?php echo $row['ledger_date'] ?></td>
                                                    <td class="text-center"> <?php echo $row['description'] ?></td>
                                                    <td class="text-right"><?php if ($row['type'] == 1) {
                                                                                echo "Rs " . number_format($row['amount']);
                                                                                $total_debit += $row['amount'];
                                                                            } else {
                                                                                echo  'Rs 0';
                                                                            } ?></td>
                                                    <td class="text-right"><?php
                                                                            if ($row['type'] == 1) {
                                                                                echo "Rs " . '0';
                                                                            } else {
                                                                                echo "Rs " . number_format($row['amount']);
                                                                                $total_credit += $row['amount'];
                                                                            };

                                                                            ?></td>
                                                    <td class="text-right">
                                                        <?php
                                                        if ($row['type'] == 1) {
                                                            $balance -=  $row['amount'];
                                                        } else {
                                                            $balance +=  $row['amount'];
                                                        }
                                                        echo "Rs " . number_format($balance);
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                                <!-- begin invoice-price -->
                                <div class="invoice-price">
                                    <div class="invoice-price-left">
                                        <div class="invoice-price-row">
                                            <div class="sub-price">
                                                <span class="text-inverse">Total Debit: </span>
                                                <p>Rs <?php echo  number_format($total_debit) ?></p>
                                            </div>
                                            <div class="sub-price">
                                                <span class="text-inverse">Total Credit: </span>
                                                <p>Rs <?php echo  number_format($total_credit) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-price-right">
                                        <span class="text-inverse">Current Balance</span> <span class="f-w-600">Rs <?php echo number_format($balance) ?></span>
                                    </div>
                                </div>
                                <!-- end invoice-price -->
                            </div>
                            <!-- end invoice-note -->
                            <!-- begin invoice-footer -->
                            <div class="invoice-footer">
                                <p class="text-center m-b-5 f-w-600">
                                    THANK YOU!
                                </p>
                                <p class="text-center">
                                    <span class="m-r-10">Developed BY: <i class="fa fa-fw fa-lg fa-globe"></i> ves-engr.com</span>
                                </p>
                            </div>
                            <!-- end invoice-footer -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
            return false;
        };
        var vender_id = getUrlParameter('id');
        $('#add_ledger').click(function() {
            uni_modal("Add Ledger", "manage_ledger.php?id=" + vender_id)
        })

        $('.add_images').click(function() {
            var id = $(this).attr('img-id');
            location.href = "index.php?page=image_maintenance&id=" + id;

        });
        $('#back_btn').click(function() {
            // window.history.back();
            window.location.href = "index.php?page=add_vender";
        })


    });
</script>