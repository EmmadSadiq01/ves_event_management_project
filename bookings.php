<?php
include 'db_connect.php';   ?>
<div class="container-fluid ">
	<div class="col-lg-12">

		<br />
		<br />
		<div class="card">
			<div class="card-header">
				<span><b>Booking List</b></span>
				<?php if ($_SESSION['login_type'] == 2) : ?>
					<a href="index.php?page=home" class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="go_to_cal_btn"><span class="fa fa-plus"></span> Go To Calander</a>
				<?php endif; ?>
			</div>
			<div class="card-body">
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Booking No</th>
							<th>Booking Date</th>
							<th>Event Date</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Guest</th>
							<th>Amount</th>
							<th>Advance</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$d_arr[0] = "Unset";
						$p_arr[0] = "Unset";
						$haid = $_SESSION['login_hid'];
						$employee_qry = $conn->query("SELECT * FROM bookings WHERE hall_code=$haid ORDER BY eventDate ASC;") or die(mysqli_error());
						while ($row = $employee_qry->fetch_array()) {
						?>
							<tr>
								<td>HMS-<?php
										$hall_ShortCode = '';
										$splitName = explode(" ", $_SESSION['login_hall_name']);
										foreach ($splitName as $value) {
											$hall_ShortCode .=  substr($value, 0, 1);
										}
										echo $hall_ShortCode . "-" . (1000 + $row['booking_id']) ?></td>
								<td><?php echo $row['bookingDate'] ?></td>
								<td><?php echo $row['eventDate'] ?></td>
								<td><?php echo $row['personName'] ?></td>
								<td><?php echo $row['personContact'] ?></td>
								<td><?php echo $row['totalGuest'] ?></td>
								<td><?php echo $row['bookingAmount'] ?></td>
								<td><?php echo $row['advanceAmount'] ?></td>

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