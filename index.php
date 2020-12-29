<?php
include('config.php');
session_start();
$error='';
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = MD5($_POST['password']);

	$result = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' AND password = '$password'");
	if(mysqli_num_rows($result)>0){
		$_SESSION['user_email'] = $email;
		header('location:home.php');
	}else{
		$error='Invalid Credentials! Please Check.';
	}
}

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta Http-Equiv="Cache-Control" Content="no-cache">
  <meta Http-Equiv="Pragma" Content="no-cache">
  <meta Http-Equiv="Expires" Content="0"> 

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
body{
	background-image: url(images/bg-01.jpg);
}
</style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</head>
<body>
	<section>
	<div class=" m-3 my-5">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-light p-3 rounded">
<!-- form start -->
<form action="" method="POST">
	<h3 class="text-center">SIGN IN</h3>

<div class="form-group">
	<label for="email">Email</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
			<input type="email" name="email" id="email" required class="form-control" placeholder="Enter Mail Id">
		</div>
</div>

<div class="form-group">
	<label for="password">Password</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
			<input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password">
		<div class="input-group-append show_hide_password"><span class="input-group-text"><i class="fa fa-eye"></i></span></div>

		</div>
</div>

<div class="form-group text-center mt-5">
	<input type="submit" name="submit" id="submit_btn" class="btn btn-success form-control" value="Login">
</div>

<?php if($error != ''){ ?>
	<div class="alert alert-danger"> <?php echo $error; ?></div>
<?php } ?>

<div class="text-center">
 Don't have account <a href="signup.php">SIGN UP <i class="fa fa-arrow-right"></i></a>
</div>
</form>

<!-- form end -->
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
$('.show_hide_password').click(function(){
	var type= $(this).parent().find('input').attr('type');
	// console.log(type);
	if(type=='password'){
		$(this).parent().find('input').attr('type','text');
		$(this).find('span i').removeClass('fa-eye').addClass('fa-eye-slash');
	}else{
		$(this).parent().find('input').attr('type','password');
		$(this).find('span i').removeClass('fa-eye-slash').addClass('fa-eye');
	}
});

</script>

</body>
</html>