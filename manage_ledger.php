<?php
include 'db_connect.php';
include 'admin_class.php';
// if(isset($_GET['id'])){
// 	$qry = $conn->query("SELECT * FROM venders where id = ".$_GET['id']." Order by id desc")->fetch_array();
// 	foreach($qry as $k => $v){
// 		$$k = $v;
// 	}
// }
?>

<div class="container-fluid">
    <form id='vender_frm'>
        <div class="form-group">
            <label>Type:</label>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
            <select name="type" id="type" class="custom-select">
                <option value="1">recieved</option>
                <option value="2">paid</option>
            </select>
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="number" name="amount" required="required" class="form-control" value="" />
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" required="required" cols="30" rows="2" class="form-control"></textarea>
        </div>


    </form>
</div>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Please Select Here",
            width: "100%"
        })
        $('#vender_frm').submit(function(e) {
            e.preventDefault()
            start_load();
            $.ajax({

                url: 'ajax.php?action=add_ledger',
                method: "POST",
                data: $(this).serialize(),
                error: err => console.log(),
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("ledger's data successfully saved", "success");
                        setTimeout(function() {
                            location.reload();

                        }, 1000)
                    }
                }
            })
        })
    })
</script>