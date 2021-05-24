<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Cashout List</b></span>
						<?php if($_SESSION['login_type'] == 2): ?>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_emp_btn"><span class="fa fa-plus"></span> Add Cash Out</button>
						<?php endif; ?>
						</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Cashout No</th>
									<th>Description</th>
									<th>Amount</th>
									<th>Provided By</th>
									<th>Priority</th>
									<th>Status</th>
									<th>Images</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$d_arr[0] = "Unset";
									$p_arr[0] = "Unset";
									
									$employee_qry=$conn->query("SELECT * FROM cashout") or die(mysqli_error());
									while($row=$employee_qry->fetch_array()){
									?>
									<tr>
										<td><?php echo $row['cashout_no']?></td>
										<td><?php echo $row['description']?></td>
										<td><?php echo $row['amount']?></td>
										<td><?php echo $row['providby']?></td>
										<td class="text-center"><?php 
										if($row['priority'] == 1){
											echo '<span class="badge badge-warning">Low</span>';
										}
										elseif($row['priority'] == 2){
											echo '<span class="badge badge-secondary">Medium</span>';
										}
										elseif($row['priority'] == 3){
											echo '<span class="badge badge-success">High</span>';
										} ?></td>
										
										<?php if($row['status'] == 0): ?>
										<td class="text-center"><span class="badge badge-danger">Not Approved</span></td>
										<?php else: ?>
										<td class="text-center"><span class="badge badge-success">Approved</span></td>
										<?php endif ?>
										<td class="text-center">
											<span style="font-size: 12px !important;font-weight: 700 !important;">Upload Images</span>
											<button class="btn btn-sm btn-outline-primary add_images" img-id="<?php echo $row['id']?>" type="button"><i class="fa fa-images"></i></button>
										</td>
										<td>
											<center>
										<?php if($row['status'] == 0): ?>
											<?php if($_SESSION['login_type'] == 1): ?>
											<button class="btn btn-sm btn-outline-primary calculate_cashout" data-id="<?php echo $row['id']?>" type="button">Approved</button>
											<button class="btn btn-sm btn-outline-primary view_cashout" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
											<?php endif; ?>
										<?php else: ?>
										<?php endif ?>
											<button class="btn btn-sm btn-outline-success view_cashout" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
											<button class="btn btn-sm btn-outline-primary edit_cashout" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i></button>
										<?php if($_SESSION['login_type'] == 2): ?>
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

			$('.edit_cashout').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit Cashout","manage_cashout.php?id="+$id)
				
			});
			$('.view_cashout').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal2("Cashout Details","view_cashout.php?id="+$id,"mid-large")
				
			});
			$('.add_images').click(function(){
				var $id=$(this).attr('img-id');
				location.href = "index.php?page=image_cashout&id="+$id;
				
			});
			$('#new_emp_btn').click(function(){
				uni_modal("New Cashout","manage_cashout.php")
			})
			$('.delete_cashout').click(function(){
				_conf("Are you sure to delete this cashout report?","delete_cashout",[$(this).attr('data-id')])
			})
			$('.calculate_cashout').click(function(){
				start_load()
				$.ajax({
					url:'ajax.php?action=calculate_cashout',
					method:"POST",
					data:{id:$(this).attr('data-id')},
					error:err=>console.log(err),
					success:function(resp){
							if(resp == 1){
								alert_toast("Cashout successfully Approved","success");
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
