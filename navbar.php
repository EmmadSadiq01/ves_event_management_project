<style>



</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>

	<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
	<?php if ($_SESSION['login_type'] == 1) : ?>
		<a href="index.php?page=graphs" class="nav-item nav-s"><span class='icon-field'><i class="fa fa-chart-line"></i></span> Graphs</a>
	<?php endif; ?>
	<a href="index.php?page=bookings" class="nav-item nav-bookings"><span class='icon-field'><i class="fa fa-list"></i></span> Bookings List</a>
	<a href="index.php?page=inquiry" class="nav-item nav-inquiry"><span class='icon-field'><i class="fa fa-list"></i></span> Inquiry List</a>

	<a href="index.php?page=employee" class="nav-item nav-employee"><span class='icon-field'><i class="fa fa-user"></i></span> Employee List</a>
	<a href="index.php?page=department" class="nav-item nav-department"><span class='icon-field'><i class="fa fa-columns"></i></span> Depatment List</a>
	<a href="index.php?page=position" class="nav-item nav-position"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Position List</a>

	<a href="index.php?page=attendance" class="nav-item nav-attendance"><span class='icon-field'><i class="fa fa-th-list"></i></span> Attendance</a>
	<a href="index.php?page=payroll" class="nav-item nav-payroll"><span class='icon-field'><i class="fa fa-columns"></i></span> Payroll List</a>

	<a href="index.php?page=utilities" class="nav-item nav-utilities"><span class='icon-field'><i class="fa fa-list"></i></span> Utility Bill List</a>
	<a href="index.php?page=maintenance" class="nav-item nav-maintenance"><span class='icon-field'><i class="fa fa-list"></i></span> Maintenance Bill List</a>
	<a href="index.php?page=procurements" class="nav-item nav-procurements"><span class='icon-field'><i class="fa fa-list"></i></span> Procurements Bill List</a>
	<a href="index.php?page=cashin" class="nav-item nav-cashin"><span class='icon-field'><i class="fa fa-list"></i></span> Cashin Bill List</a>
	<a href="index.php?page=cashout" class="nav-item nav-cashout"><span class='icon-field'><i class="fa fa-list"></i></span> Cashout Bill List</a>
	<?php if ($_SESSION['login_type'] == 1) : ?>
	<a href="index.php?page=add_vender" class="nav-item nav-vender"><span class='icon-field'><i class="fa fa-list"></i></span> Vendor List</a>
	<?php endif; ?>


</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active');
</script>