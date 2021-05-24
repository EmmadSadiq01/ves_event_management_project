<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM cashout_img where id = ".$_GET['id'])->fetch_array();
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
			<textarea name="description" required="required" cols="30" rows="2" class="form-control" value="<?php echo isset($description) ? $description : "" ?>"></textarea>
		</div>
	</form>
</div>
<script>
	
	$(document).ready(function(){
		$('#employee_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				
				url:'ajax.php?action=save_cashout_image',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Image data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>