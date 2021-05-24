<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM cashin where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='employee_frm'>
		<div class="form-group">
			<label>Description:</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<textarea name="description" required="required" cols="30" rows="2" class="form-control"><?php echo isset($description) ? $description : "" ?></textarea>
		</div>
		<div class="form-group">
			<label>Amount:</label>
			<input type="number" name="amount" required="required" cols="30" rows="2" class="form-control" value="<?php echo isset($amount) ? $amount : "" ?>" />
		</div>
	</form>
</div>
<script>
	
	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#employee_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				
				url:'ajax.php?action=save_cashin',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Cash In's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>