<?php include 'db_connect.php' ?>

<?php
$emp = $conn->query("SELECT m.* FROM maintenance m where m.id =".$_GET['id'])->fetch_array();
	foreach($emp as $k=>$v){
		$$k=$v;
	}
?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<p><b>Maintenance ID : <?php echo $maintenance_no ?></b></p>
		<p><b>Description: <?php echo ucwords($description) ?></b></p>
		<p><b>Resolution : <?php echo ucwords($resolution) ?></b></p>
		<p><b>Assign to : <?php echo ucwords($assign) ?></b></p>
		<p><b>Priority : <?php if($priority == 1){echo "Low";}
		elseif($priority == 2){echo "Medium";}
		elseif($priority == 3){echo "High";} ?></b></p>
		<p><b>Owner Remarks : <?php echo ucwords($owner_remarks) ?></b></p>
		<p><b>Status : <?php if($status==0){echo "Not Approved";}if($status==1){echo "Approved";} ?></b></p>
		<hr class="divider">
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