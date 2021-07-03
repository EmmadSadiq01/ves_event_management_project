<?php 
include 'db_connect.php'; 
include 'admin_class.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM maintenance where id = ".$_GET['id']." Order by id desc" )->fetch_array();
	foreach($qry as $k => $v){
		$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='employee_frm'>
		<div class="form-group">
			<label>Description:</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<textarea name="description" required cols="30" rows="2" class="form-control" ><?php echo isset($description) ? $description : "" ?></textarea>
		</div>
		<div class="form-group">
			<label>Resolution:</label>
			<textarea name="resolution" required="required" cols="30" rows="2" class="form-control" ><?php echo isset($resolution) ? $resolution : "" ?></textarea>
			
		</div>
		<div class="form-group">
			<label>Assign To:</label>
			<input type="text" name="assign" required="required" class="form-control" value="<?php echo isset($assign) ? $assign : "" ?>" />
		</div> 
		<div class="form-group">
			<label>Priority:</label>
			<select name="priority" id="priority" class="custom-select">
				<option value="1" <?php echo isset($priority) && $priority == 1 ? 'selected': '' ?>>Low</option>
				<option value="2" <?php echo isset($priority) && $priority == 2 ? 'selected': '' ?>>Medium</option>
				<option value="3" <?php echo isset($priority) && $priority == 3 ? 'selected': '' ?>>High</option>
			</select>
			</div>
			<div class="form-group">
			<label>Amount:</label>
			<input type="number" name="amount" required="required" cols="30" rows="2" class="form-control" value="<?php echo isset($amount) ? $amount : "" ?>"/>
		</div>
		<div class="form-group">
			<input type="hidden" name="owner_remarks" required="required" cols="30" rows="2" class="form-control" value="<?php echo isset($owner_remarks) ? $owner_remarks : "" ?>" />
		</div>
		<?php if($_SESSION['login_type'] == 1): ?>
		<div class="form-group">
			<label>Owner Remarks:</label>
			<textarea name="owner_remarks" required="required" cols="30" rows="2" class="form-control"><?php echo isset($owner_remarks) ? $owner_remarks : "" ?></textarea>
		</div>
		<?php endif; ?>
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
				
				url:'ajax.php?action=save_maintenance',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Maintenance's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>