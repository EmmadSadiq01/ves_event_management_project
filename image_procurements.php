<?php include('db_connect.php') ?>
<?php
$pay = $conn->query("SELECT * FROM procurement where id = " . $_GET['id'])->fetch_array();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Multiple Image Upload</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="./assets/forimgcss/style.css">
</head>

<body>
	<div class="container-fluid ">
		<div class="col-lg-12">

			<br />
			<br />
			<div class="card">
				<div class="card-header">
					<span>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="back_btn"><span class="fa fa-plus"></span>Back to procurement List</button>
						<b>Procurement Bill No : <?php echo $pay['procurement_no'] ?></b></span>
				</div>
				<div class="card-body">
					<?php if ($_SESSION['login_type'] == 2) : ?>
						<div class="row">
							<div class="col-md-12">
								<form method="post" enctype="multipart/form-data" action="procurement_upload.php">
									<div class="form-group">
										<label>Select Images or PDF</label>
										<input type="hidden" name="im_id" value="<?php echo $pay['id'] ?>" />
										<input type="file" accept=".jpg, .png, .jpeg, .pdf" name="image[]" class="form-control" multiple />
									</div>
									<input type="submit" name="submit" value="Submit" class="btn btn-primary">
								</form>
							</div>
						</div>
					<?php endif; ?>
					<hr>
					<table id="table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Images</th>
								<th>Description</th>
								<?php if ($_SESSION['login_type'] == 2) : ?>
									<th>Action</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$images = $conn->query("SELECT * FROM procurement_img where recept_no=" . $pay['id']) or die(mysqli_error($conn));
							while ($row = $images->fetch_array()) {
							?>
								<tr>
									<td>
										<div class="show-image">
											<image id="myImg" src="assets/procurement_images/<?php echo $row["image_name"]; ?>" height="100" width="100" style="cursor:pointer" onclick="onClick(this)" class="modal-hover-opacity">
										</div>
									</td>
									<td><?php echo $row['image_description'] ?></td>

									<?php if ($_SESSION['login_type'] == 2) : ?>
										<td>
											<center>
												<button class="btn btn-sm btn-outline-danger remove_image" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-trash"></i></button>
												<button class="btn btn-sm btn-outline-primary add_description" data-id="<?php echo $row['id'] ?>" type="button"><i class="fa fa-edit"></i></button>
											</center>
										</td>
									<?php endif; ?>
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
	<!-- The Modal -->
	<div id="modal01" class="modale" onclick="this.style.display='none'">
		<span class="close">&times;</span>
		<img class="modale-content" id="img01" style="width:100%; max-width:500px">
	</div>
	<!-- partial -->
	<script src="./assets/forimgcss/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.remove_image').click(function() {
				_conf("Are you sure to delete this image?", "remove_procurement_image", [$(this).attr('data-id')])
			})
		});
		$('#back_btn').click(function() {
			// window.history.back();
			window.location.href = "index.php?page=procurements";
		})
		$('.add_description').click(function() {
			var $id = $(this).attr('data-id');
			uni_modal("Edit Description" + $id, "procurement_image_description.php?id=" + $id)

		});

		function remove_procurement_image(id) {
			start_load()
			$.ajax({
				url: 'ajax.php?action=remove_procurement_image',
				method: "POST",
				data: {
					id: id
				},
				error: err => console.log(err),
				success: function(resp) {
					if (resp == 1) {
						alert_toast("Image successfully deleted", "success");
						setTimeout(function() {
							location.reload();

						}, 1000)
					}
				}
			})
		}
	</script>
</body>

</html>