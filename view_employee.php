<?php include 'db_connect.php' ?>

<?php
$emp = $conn->query("SELECT e.*,d.name as dname,p.name as pname FROM employee e inner join department d on e.department_id = d.id inner join position p on e.position_id = p.id where e.id =".$_GET['id'])->fetch_array();
	foreach($emp as $k=>$v){
		$$k=$v;
	}
?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<p><b>Employee ID : <?php echo $employee_no ?></b></p>
		<p><b>Name: <?php echo $lastname.", ".$firstname." ",$middlename ?></b></p>
		<p><b>Department : <?php echo ucwords($dname) ?></b></p>
		<p><b>Position : <?php echo ucwords($pname) ?></b></p>
		<p><b>Email : <?php echo ucwords($Email) ?></b></p>
		<p><b>Contact : <?php echo ucwords($contact) ?></b></p>
		<p><b>Cnic : <?php echo ucwords($cnic) ?></b></p>
		<hr class="divider">
		</div>
	</div>

</div>
<style type="text/css">
	.list-group-item>span>p{
		margin:unset;
	}
	.list-group-item>span>p>small{
		font-weight: 700
	}
</style>
<script>
	$('#new_allowance').click(function(){
		uni_modal("New Allowace for <?php echo $employee_no.' - '.ucwords($lastname.", ".$firstname." ",$middlename) ?>",'manage_employee_allowances.php?id=<?php echo $_GET['id'] ?>','mid-large')
	})
	$('#new_deduction').click(function(){
		uni_modal("New Deduction for <?php echo $employee_no.' - '.ucwords($lastname.", ".$firstname." ",$middlename) ?>",'manage_employee_deductions.php?id=<?php echo $_GET['id'] ?>','mid-large')
	})
	$('.remove_allowance').click(function(){
				_conf("Are you sure to delete this allowance?","remove_allowance",[$(this).attr('data-id')])
			})
function remove_allowance(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_employee_allowance',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Selected allowance successfully deleted","success");
							$('.alist[data-id="'+id+'"]').remove()
							$('#confirm_modal').modal('hide')
							end_load()
						}
					}
			})
		}
		$('.remove_deduction').click(function(){
				_conf("Are you sure to delete this deduction?","remove_deduction",[$(this).attr('data-id')])
			})
function remove_deduction(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_employee_deduction',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Selected deduction successfully deleted","success");
							$('.dlist[data-id="'+id+'"]').remove()
							$('#confirm_modal').modal('hide')
							end_load()
						}
					}
			})
		}
</script>