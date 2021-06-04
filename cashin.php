<?php include('db_connect.php');
// include 'admin_class.php';
$haid = $_SESSION['login_hid']; ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Cashin List</b></span>
						<?php if($_SESSION['login_type'] == 2): ?>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> Add Cash In</button>
						<?php endif; ?>
						</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Cashin No</th>
									<th>Bill No</th>
									<th>Creation Date</th>
									<th>Description</th>
									<th>Amount</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$d_arr[0] = "Unset";
									$p_arr[0] = "Unset";
									
									$employee_qry=$conn->query("SELECT * FROM cashin where hall_id=$haid") or die(mysqli_error());
									while($row=$employee_qry->fetch_array()){
									?>
									<tr>
										<td><?php echo $row['cashin_no']?></td>
										<td><?php echo $row['recept_id']?></td>
										<td><?php echo $row['created_at']?></td>
										<td><?php echo $row['Description']?></td>
										<td><?php echo $row['price']?></td>
										
										<td>
											<center>
											<?php if($_SESSION['login_type'] == 1): ?>
											<button class="btn btn-sm btn-outline-primary calculate_cashin" data-id="<?php echo $row['id']?>" type="button">Approved</button>
											<button class="btn btn-sm btn-outline-primary view_cashin" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
											<?php endif; ?>
										<?php if($_SESSION['login_type'] == 2): ?>
											<button class="btn btn-sm btn-outline-success view_cashin" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
											<button class="btn btn-sm btn-outline-primary edit_cashin" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i></button>
											<?php endif; ?>
										</center>
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
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.edit_cashin').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit cashin","manage_cashin.php?id="+$id)
				
			});
			$('.view_cashin').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal2("cashin Details","view_cashin.php?id="+$id,"mid-large")
				
			});
			$('.add_images').click(function(){
				var $id=$(this).attr('img-id');
				location.href = "index.php?page=image_cashin&id="+$id;
				
			});
			$('#new_emp_btn').click(function(){
				uni_modal("New cashin","manage_cashin.php")
			})
			$('.delete_cashin').click(function(){
				_conf("Are you sure to delete this cashin report?","delete_cashin",[$(this).attr('data-id')])
			})
			$('.calculate_cashin').click(function(){
				start_load()
				$.ajax({
					url:'ajax.php?action=calculate_cashin',
					method:"POST",
					data:{id:$(this).attr('data-id')},
					error:err=>console.log(err),
					success:function(resp){
							if(resp == 1){
								alert_toast("cashin successfully Approved","success");
									setTimeout(function(){
									location.reload();

								},1000)
							}
						}
				})
			})
		});
		function delete_maintenance(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_maintenance',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Maintenance Report successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>
