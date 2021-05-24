<?php include 'db_connect.php' ?>

<?php
$emp = $conn->query("SELECT c.* FROM cashin c where c.id =".$_GET['id'])->fetch_array();
	foreach($emp as $k=>$v){
		$$k=$v;
	}
?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<p><b>cashin ID : <?php echo $cashin_no ?></b></p>
		<p><b>Description: <?php echo ucwords($Description) ?></b></p>
		<p><b>Amount : <?php echo ucwords($price) ?></b></p>
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