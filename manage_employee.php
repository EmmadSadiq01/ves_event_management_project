<?php 
include 'db_connect.php';
include 'admin_class.php'; 
$haid = $_SESSION['login_hid'];
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM employee where id = ".$_GET['id']." AND hallid = ".$haid." Order by id desc")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='employee_frm'> 
		<div class="form-group">
			<label>Firstname</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<input type="text" name="firstname" required="required" class="form-control" value="<?php echo isset($firstname) ? $firstname : "" ?>" />
		</div>
		<div class="form-group">
			<label>Middlename</label>
			<input type="text" name ="middlename" placeholder="(optional)" class="form-control" value="<?php echo isset($middlename) ? $middlename : "" ?>" />
		</div>
		<div class="form-group">
			<label>Lastname:</label>
			<input type="text" name="lastname" required="required" class="form-control" value="<?php echo isset($lastname) ? $lastname : "" ?>" />
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email" required="required" class="form-control" value="<?php echo isset($email) ? $email : "" ?>" />
		</div>
		<div class="form-group">
			<label>Contact:</label>
			<input type="text" name="contact" required="required" class="form-control" value="<?php echo isset($contact) ? $contact : "" ?>" />
		</div>
		<div class="form-group">
			<label>Cnic:</label>
			<input type="text" name="cnic" required="required" class="form-control" value="<?php echo isset($cnic) ? $cnic : "" ?>" />
		</div>
		<div class="form-group">
			<label>Address:</label>
			<input type="text" name="address" required="required" class="form-control" value="<?php echo isset($address) ? $address : "" ?>" />
		</div>
		<div class="form-group">
			<label>Emergency contact:</label>
			<input type="text" name="emergency_contact" required="required" class="form-control" value="<?php echo isset($emergency_contact) ? $emergency_contact : "" ?>" />
		</div>
		<div class="form-group">
			<label>Roles & Responsiblities:</label>
			<!-- textfield -->
			<textarea name="responsiblity" required="required" cols="30" rows="2" class="form-control"><?php echo isset($responsiblity) ? $responsiblity : "" ?></textarea>
		</div>
		<div class="form-group">
			<label>Department</label>
			<select class="custom-select browser-default select2" name="department_id">
				<option value=""></option>
			<?php
			$dept = $conn->query("SELECT * from department where hallid=$haid order by name asc");
			while($row=$dept->fetch_assoc()):
			?>
				<option value="<?php echo $row['id'] ?>" <?php echo isset($department_id) && $department_id == $row['id'] ? "selected" :"" ?>><?php echo $row['name'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Position</label>
			<select class="custom-select browser-default select2" name="position_id">
				<option value=""></option>
			<?php
			$pos = $conn->query("SELECT * from position where hallid=$haid order by name asc");
			while($row=$pos->fetch_assoc()):
			?>
				<option class="opt" value="<?php echo $row['id'] ?>" data-did="<?php echo $row['department_id'] ?>" <?php echo isset($department_id) && $department_id == $row['department_id'] ? '' :"disabled" ?> <?php echo isset($position_id) && $position_id == $row['id'] ? " selected" : '' ?> ><?php echo $row['name'] ?></option>
			<?php endwhile; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Monthly Salary</label>
			<input type="number" name="salary" required="required" class="form-control text-right" step="any" value="<?php echo isset($salary) ? $salary : "" ?>" />
		</div>
	</form>
</div>
<script>
	$('[name="department_id"]').change(function(){
		var did = $(this).val()
		$('[name="position_id"] .opt').each(function(){
			if($(this).attr('data-did') == did){
				$(this).attr('disabled',false)
			}else{
				$(this).attr('disabled',true)
			}
		})
	})
	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#employee_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				url:'ajax.php?action=save_employee',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Employee's data successfully saved","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
				}
			})
		})
	})
</script>