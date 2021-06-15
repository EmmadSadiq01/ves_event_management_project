<?php include('db_connect.php') ?>
<div class="container-fluid ">
    <div class="col-lg-12">

        <br />
        <br />
        <div class="card">
            <div class="card-header">
                <span><b>Vendor List</b></span>
                <?php if ($_SESSION['login_type'] == 2) : ?>
                    <button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_vender"><span class="fa fa-plus"></span> Add New Vender</button>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Vendor No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>CNIC</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $d_arr[0] = "Unset";
                        $p_arr[0] = "Unset";
                        $haid = $_SESSION['login_hid'];

                        $employee_qry = $conn->query("SELECT * FROM venders WHERE hall_id= $haid ORDER BY id DESC;") or die(mysqli_error($conn));
                        while ($row = $employee_qry->fetch_array()) {
                        ?>
                            <tr>
                                <td><?php echo $row['vender_no'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td><?php echo $row['cnic'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <?php
                                $balance_amnt = 0;
                                $balance_qry = $conn->query("SELECT * FROM vender_ledger WHERE vender_id=" . $row['id']) or die(mysqli_error($conn));
                                while ($balance_row = $balance_qry->fetch_array()) {
                                    if ($balance_row['type'] == 1) {
                                        $balance_amnt -=  $balance_row['amount'];
                                    } else {
                                        $balance_amnt +=  $balance_row['amount'];
                                    }
                                }
                                ?>
                                <td><?php echo $balance_amnt ?></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary edit_vender" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-outline-danger del_vender" data-id="<?php echo $row['id'] ?>" type="button"><i class="far fa-trash-alt"></i></button>
                                    <button class="btn btn-sm btn-outline-success upload_img" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-images"></i>Upload Image</button>
                                    <button class="btn btn-sm btn-outline-warning view_ledger" data-id="<?php echo $row['id'] ?>" type="button"><i class="fas fa-money-check-alt"></i>View Ledger</button>
                                </td>



                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
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
            var id = $(this).attr('data-id');
            uni_modal("Edit Utility", "manage_vender.php?id=" + id)

        });
        $('.view_ledger').click(function() {
            var id = $(this).attr('data-id');
            window.location = 'index.php?page=ledger&id=' + id;

        });
        $('.del_vender').click(function() {

            if (confirm("do you want to Delete this vendor?")) {
                remove_vender($(this).attr("data-id"))
            }
        })
        $('#new_vender').click(function() {
            uni_modal("New Vender", "manage_vender.php")
        })
        $('.upload_img').click(function(){
				var $id=$(this).attr('data-id');
				location.href = "index.php?page=image_venders&id="+$id;
				
			});

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
                        alert_toast("Vendor's data successfully deleted", "success");
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