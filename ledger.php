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

    table {
        border: 2px solid #787878;
        width: 800px;
        border-spacing: 0;
        margin: auto;
    }

    th {
        background-color: #00BE3F;
    }

    td,
    th {
        padding: 25px;
        font-family: Arial, sans-serif;
    }

    caption {
        font-family: Verdana, sans-serif;
        font-size: 2.0em;
        font-weight: bold;
        padding-bottom: 5px;
    }

    tr:nth-of-type(even) {
        background-color: #FFF5CC;
    }

    tr:first-of-type {
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
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered">

                    <tr>
                        <td class="title">
                            <h4>Vender No.</h4>
                        </td>
                        <td class="value">
                            <p>V-949393929</p>
                        </td>
                        <td class="title">
                            <h4>Name</h4>
                        </td>
                        <td class="value">
                            <p>M.EMMAD SADIQ</p>
                        </td>

                    </tr>
                    <tr>
                        <td class="title">
                            <h4>Contact</h4>
                        </td>
                        <td class="value">
                            <p>030303003003</p>
                        </td>
                        <td class="title">
                            <h4>Address</h4>
                        </td>
                        <td class="value">
                            <p>north karachi</p>
                        </td>
                    </tr>
                </table>
                <!-- <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Vender No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $d_arr[0] = "Unset";
                        $p_arr[0] = "Unset";
                        $haid = $_SESSION['login_hid'];

                        $employee_qry = $conn->query("SELECT * FROM venders WHERE hall_id= $haid ORDER BY id DESC;") or die(mysqli_error());
                        while ($row = $employee_qry->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo $row['vender_no'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary edit_vender" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger del_vender" data-id="<?php echo $row['id'] ?>" type="button"><i class="far fa-trash-alt"></i></button>
                                    <button class="btn btn-sm btn-outline-warning0 view_ledger" data-id="<?php echo $row['id'] ?>" type="button"><i class="fas fa-money-check-alt"></i>View Ledger</button>
                                </td>



                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table> -->

                <table width="300" height="200"><br>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit/Credit</th>
                    </tr>
                    <tr>
                        <td>10/25/2015</td>
                        <td>ATM Credit 4270 Broadway New York, NY</td>
                        <td>$100.20</td>
                    </tr>
                    <tr>
                        <td>10/20/2015</td>
                        <td>ATM Withdraw 0033478 AT West 4 Street</td>
                        <td>$100.00</td>
                    </tr>
                    <tr>
                        <td>10/15/2015</td>
                        <td>ATM Purchase at Starbuck E 25 Park Ave</td>
                        <td>$10.50</td>
                    </tr>
                    <tr>
                        <td>10/10/2015</td>
                        <td>ATM Purchase at Eat Healthy Cafe 42 street Second Ave</td>
                        <td>$200.00</td>
                    </tr>
                    <tr>
                        <td>10/5/2015</td>
                        <td>ATM Purchase at Whole Food Union Square 14 street</td>
                        <td>$220.50</td>
                    </tr>
                </table>
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

        $('.edit_vender').click(function() {
            var $id = $(this).attr('data-id');
            uni_modal("Edit Utility", "manage_vender.php?id=" + $id)

        });
        $('.view_ledger').click(function() {
            window.location = 'index.php?page=ledger&id=3';

        });
        // $('.del_vender').click(function() {
        //     var $id = $(this).attr('data-id');
        //     uni_modal("Edit Utility", "manage_vender.php?id=" + $id)

        // });
        $('.del_vender').click(function() {
            if (confirm("do you want to Delete this vender?")) {
                remove_vender($(this).attr("data-id"))
            }
        })
        $('#new_vender').click(function() {
            uni_modal("New Vender", "manage_vender.php")
        })

        function remove_vender(id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=del_vender',
                method: "POST",
                data: {
                    id: id
                },
                error: err => console.log(err),
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Vender's data successfully deleted", "success");
                        setTimeout(function() {
                            location.reload();

                        }, 1000)
                    }
                }
            })
            // console.log("running"+id)
        }
    });
</script>