<?php include('db_connect.php') ?>
<style>
    .table td,
    .table th {
        vertical-align: middle;
    }

    #table td h4,
    #table td p {
        margin-bottom: 0px;
    }

    .title {
        width: 10%;
        background-color: #dfdfdf;
        color: #000000;
    }

    .title h4 {
        font-size: 18px;
        font-weight: 700;
    }

    .value {
        width: 40%;
        background-color: #8773c1ab;
        color: white;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #000000;
    }

    /* ledger table */


    .ledger_table table {
        border: 2px solid #787878;
        width: 100%;
        border-spacing: 0;
        margin: auto;
    }

    .ledger_table th {
        background-color: #afa1d5;
    }

    .ledger_table td,
    .ledger_table th {
        padding: 25px;
        font-family: Arial, sans-serif;
    }

    .ledger_table tr:nth-of-type(even) {
        background-color: #dfdfdf;
    }

    .ledger_table tr:first-of-type {
        background-color: #009900;
        color: #0D0D0D;
    }
</style>
<div class="container-fluid ">
    <div class="col-lg-12">

        <br />
        <br />
        <div class="card">
            <div class="card-header">
                <span><b>Vender Cash Statements</b></span>
                <button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="add_ledger"><span class="fa fa-plus"></span>Add Ledger</button>

            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered">
                    <?php
                    $sql = "SELECT * FROM venders WHERE id=" . $_GET['id'];
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {


                    ?>
                        <tr>
                            <td class="title">
                                <h4>Vender No.</h4>
                            </td>
                            <td class="value">
                                <p><?php echo $row['vender_no'] ?></p>
                            </td>
                            <td class="title">
                                <h4>Name</h4>
                            </td>
                            <td class="value">
                                <p><?php echo $row['name'] ?></p>
                            </td>

                        </tr>
                        <tr>
                            <td class="title">
                                <h4>Contact</h4>
                            </td>
                            <td class="value">
                                <p><?php echo $row['contact'] ?></p>
                            </td>
                            <td class="title">
                                <h4>Address</h4>
                            </td>
                            <td class="value">
                                <p><?php echo $row['address'] ?></p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div class="ledger_table container">

                    <table><br>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                        </tr>
                        <?php
                        $sql = "SELECT * FROM vender_ledger WHERE vender_id=" . $_GET['id'];
                        $result = mysqli_query($conn, $sql);
                        $balance = 0;
                        $total_debit = 0;
                        $total_credit = 0;
                        while ($row = mysqli_fetch_assoc($result)) {


                        ?>
                            <tr>
                                <td><?php echo $row['ledger_date'] ?></td>
                                <td>  <?php echo $row['description'] ?></td>
                                <!-- <td> <button class="btn btn-sm btn-outline-success add_img" data-id="<?php echo $row['id'] ?>" type="button"><i class="fas fa-plus"></i></button></td> -->
                                <td>
                                    <span style="font-size: 12px !important;font-weight: 700 !important;">
											<?php if($_SESSION['login_type'] == 1): ?>View Images<?php else: ?>Upload Images<?php endif ?></span>
											<button class="btn btn-sm btn-outline-primary add_images" img-id="<?php echo $row['id']?>" type="button"><i class="fa fa-images"></i></button></td>
                                <td><?php if ($row['type'] == 1) {
                                        echo "Rs " . number_format($row['amount']);
                                        $total_debit += $row['amount'];
                                    } else {
                                        echo  'Rs 0';
                                    } ?></td>
                                <td><?php
                                    if ($row['type'] == 1) {
                                        echo "Rs " . '0';
                                    } else {
                                        echo "Rs " . number_format($row['amount']);
                                        $total_credit += $row['amount'];
                                    };

                                    ?></td>
                                <td>
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
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-center">Total</th>
                                <th><?php echo "Rs " . number_format($total_debit) ?></th>
                                <th><?php echo "Rs " . number_format($total_credit) ?></th>
                                <th><?php echo "Rs " . number_format($balance) ?></th>
                            </tr>
                        </tfoot>
                    </table>
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

        $('.add_images').click(function(){
				var id=$(this).attr('img-id');
				location.href = "index.php?page=image_maintenance&id="+id;
				
			});


    });
</script>