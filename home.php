<?php include 'db_connect.php' ?>
<style>
   
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row">
			<div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <?php
                    $usertype= $_SESSION['login_type'];
                    $typo = "";
                    if ($usertype == 1){
                        $typo = "Owner of";
                    }
                    else {
                        $typo = "Manager of";
                    }
                    
                     echo "Welcome back ". $_SESSION['login_name']." ".$typo." ". $_SESSION['login_hall_name']; ?>
						<?php if($_SESSION['login_type'] == 2): ?>
				<button type="button" onclick="showPkg()" class="btn btn-primary btn-sm btn-block col-md-3 float-right"><i class="fa fa-box-open"></i>Hall Packages</button>  
				<?php endif; ?>

                    </div>
                </div>
                
                <?php if($_SESSION['login_type'] == 1): ?>
                    <?php include 'home_owner.php' ?>
                    <?php endif; ?>
                    <?php if($_SESSION['login_type'] == 2): ?>
                    <?php include 'home_manager.php' ?>
                    <?php endif; ?>
            </div>
	</div>

</div>

  <script>
  </script>