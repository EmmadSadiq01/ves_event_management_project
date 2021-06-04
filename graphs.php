<?php include 'db_connect.php' ?>
<style>
   
</style>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
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
						
                    </div>
                <?php 
                include 'all_graphs.php';
                 ?>
                </div>
            </div>
	</div>

</div>

  <script>
  </script>