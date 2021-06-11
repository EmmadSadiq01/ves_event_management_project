<?php 
include 'db_connect.php'; 
include 'admin_class.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM venders where id = ".$_GET['id']." Order by id desc")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='vender_frm'>
		<div class="form-group">
			<label>Name:</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<input name="name" required="required" class="form-control" value="<?php 
            echo isset($name) ? $name : "" 
            ?>" />
		</div>
		<div class="form-group">
			<label>Contact:</label>
			<input type="text"  name="contact" required="required" class="form-control" value="<?php 
            echo isset($contact) ? $contact : "" 
            ?>"/>
		</div>
		<div class="form-group">
			<label>CNIC:</label>
			<input type="text"  name="cnic" required="required" class="form-control" value="<?php 
            echo isset($cnic) ? $cnic : "" 
            ?>"/>
		</div>
		<div class="form-group">
			<label>Address:</label>
			<textarea  name="address" required="required" cols="30" rows="2" class="form-control"><?php 
            echo isset($address) ? $address : "" 
            ?></textarea>
		</div>
		<div class="form-group">
			<label>Description:</label>
			<textarea  name="description" required="required" cols="30" rows="2" class="form-control"><?php 
            echo isset($description) ? $description : "" 
            ?></textarea>
		</div>
		
		
	</form>
</div>
<script>
	
	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#vender_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				
				url:'ajax.php?action=save_vender',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Vender's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>