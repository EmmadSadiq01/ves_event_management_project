<style>
	.topBar_logo{
    display:flex;

  }
  .burger{
    margin-left: 5px;
    cursor: pointer;
  }


  

</style>
 
<nav class="navbar navbar-light fixed-top" style="padding:0; background-color:#8773c1 !important;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white topBar_logo">
        
        <div class="burger" onclick="showSidebar()"><large><b>HMS </b></large><i class="fas fa-bars"></i></div>
      </div>
	  	<div class="col-md-2 float-right text-white">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>

<script>
  const showSidebar = () =>{
    $('#sidebar').toggleClass('showSidebar')
  }
  </script>