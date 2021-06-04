<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Hall Management System</title>
 	

<?php 
include('./header.php'); 
?>
<?php
 include('./db_connect.php');
 ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif !important;
    color: #303433;
}

.loginbody {
    min-height: 100vh;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
}

section {
    display: flex;
    justify-content: center;
    align-items: center;
}

section.loginside {
    background: url(assets/img/bk.png) no-repeat;
    background-size: 100% 102%;
}

.loginside img {
    width: 80%;
    max-width: 80%;
}

.login-container {
    max-width: 450px;
    /* padding: 24px; */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.title {
    text-transform: uppercase;
    font-size: 3em;
    font-weight: bold;
    text-align: center;
    letter-spacing: 1px;
}

.loginseparator {
    width: 150px;
    height: 4px;
    background-color: #843bc7;
    margin: 24px;
}

.welcome-message {
    text-align: center;
    font-size: 1.1em;
    line-height: 28px;
    margin-bottom: 30px;
    color: #696969;
}

.login-form {
    width: 100%;
    display: flex;
    flex-direction: column;
}

.login-form-control {
    width: 100%;
    position: relative;
    margin-bottom: 24px;
}

.linput,
button {
    border: none;
    outline: none;
    border-radius: 30px;
    font-size: 1.1em;
}

.linput {
    width: 100%;
    background: #e6e6e6;
    color: #333;
    letter-spacing: 0.5px;
    padding: 14px 64px;
}

.linput ~  #licon {
    position: absolute;
    left: 32px;
    top: 50%;
    transform: translateY(-50%);
    color: #888;
    transition: color   0.4s;
}

.linput:focus ~ #licon {
    color: #843bc7;
}

button.btnsubmit {
    color: #fff;
    padding: 14px 64px;
    margin: 32px auto;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: bold;
    background-image: linear-gradient(to right, #8b33c5, #15a0e1);
    cursor: pointer;
    transition: opacity 0.4s;
}

button.btnsubmit:hover {
    opacity: 0.9;
}

/* ----  Responsiveness   ----  */
@media (max-width: 780px) {

    .loginbody {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loginside {
        display: none;
    }
}
</style>

<body class="loginbody">
<section class="loginside">
        <img src="assets/img/img.png" alt="">
    </section>
	<section class="main">
        <div class="login-container">
            <p class="title">Welcome back</p>
            <div class="loginseparator"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services</p>
			
            <form class="login-form">
                <div class="login-form-control">
                    <input class="linput" type="text" id="username" name="username" placeholder="Username">
                    <i id="licon" class="fa fa-user"></i>
                </div>
                <div class="login-form-control">
                    <input class="linput" type="password" id="password" name="password" placeholder="Password">
                    <i id="licon" class="fa fa-lock"></i>
                </div>

                <button class="btnsubmit">Login</button>
            </form>
        </div>
    </section>
</body>
<script>
	$('.login-form').submit(function(e){
		e.preventDefault()
		$('.login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('.login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('.login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('.login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>