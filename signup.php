<?php
include('config.php');
$success=$error='';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];
	$password = $_POST['password'];
	$conf_password = $_POST['conf_password'];

	if($password == $conf_password){
		//check email exists
		$check_exist = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
		if(mysqli_num_rows($check_exist) > 0){
			$error = ' Email Already Exists!';
		}else{

			$password = MD5($password);
			$insert_record = mysqli_query($conn,"INSERT INTO users SET name='$name', email='$email', phone_no='$phone_no', password='$password' ");
			if($insert_record){
				$success = 'Successfully Registerd the Account.';
				header("refresh:3;url=index.php");
			}else{
				$error = 'Error : Please try agian'.mysql_error($conn);
			}
		}

	}else{
		$error='Password Mismatch!';
	}
	
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta Http-Equiv="Cache-Control" Content="no-cache">
  <meta Http-Equiv="Pragma" Content="no-cache">
  <meta Http-Equiv="Expires" Content="0"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
		<div class="col-md-6 bg-light p-4 rounded">
<!-- form start -->
<form action="" method="POST">
	<h3 class="text-center">SIGN UP</h3>
<div class="form-group">
	<label for="name">Name</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
			<input type="text" name="name" id="name" required class="form-control" placeholder="Enter Full Name">
		</div>
</div>
<div class="form-group">
	<label for="email">Email</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
			<input type="email" name="email" id="email" required class="form-control" placeholder="Enter Mail Id">
		</div>
</div>
<div class="form-group">
	<label for="phone_no">Phone No:</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
			<input type="number" name="phone_no" id="phone_no" required class="form-control" placeholder="Enter Phone Number">
		</div>
</div>
<div class="form-group">
	<label for="password">Password</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
			<input type="password" name="password" id="password" required class="form-control" placeholder="Enter Password">
		<div class="input-group-append show_hide_password"><span class="input-group-text"><i class="fa fa-eye"></i></span></div>

		</div>
</div>
<div class="form-group">
	<label for="conf_password">Confirm Password</label>
	<div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
	<input type="password" name="conf_password" id="conf_password" required class="form-control" placeholder="Enter Confirm Password">
		<div class="input-group-append show_hide_password"><span class="input-group-text"><i class="fa fa-eye"></i></span></div>

	</div>
</div>
<div class="form-group text-center mt-5">
	<input type="submit" name="submit" id="submit_btn" class="btn btn-success form-control" value="Submit">
</div>
<div class="text-center my-4">
	<span class=" bg-danger text-light rounded" id="error_msg"> <?php echo $error; ?></span>
</div>
<?php if($success != ''){ ?>
	<div class="alert alert-success"> <?php echo $success; ?></div>
<?php } ?>

<div class="text-center">
 Already have account <a href="index.php">LOGIN <i class="fa fa-arrow-right"></i></a>
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

$('form').on('submit',function(){
		$('#error_msg').removeClass('p-2').text('');
	if($('#password').val() == $('#conf_password').val()){
		return true;
	}else{
		$('#error_msg').addClass('p-2').text('Password Mismatch!');
		return false;
	}
});

</script>

</body>
</html>