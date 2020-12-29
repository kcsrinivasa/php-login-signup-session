<?php
include('session.php');
$success=$error='';

if(isset($_POST['submit'])){
	$old_password = MD5($_POST['old_password']);
	$password = $_POST['password'];
	$conf_password = $_POST['conf_password'];

	if($password == $conf_password){
		//check email exists
		$check_exist = mysqli_query($conn,"SELECT * FROM users WHERE email = '$user_email' AND password = '$old_password'");
		if(mysqli_num_rows($check_exist) < 1){
			$error = ' Incorrect Old Password!';
		}else{

			$password = MD5($password);
			$update_record = mysqli_query($conn,"UPDATE users SET  password='$password' WHERE email='$user_email' ");
			if($update_record){
				$success = 'Successfully Updated the Password!.';
				header("refresh:3;url=home.php");
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
<title>Change Password</title>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="home.php"><i class="fa fa-th-large"></i>  Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_account.php"> <i class="fa fa-user"></i> My Account  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="change_password.php"><i class="fa fa-lock"></i> Change Password <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
      </li>
	</ul>
  </div>
</nav>
<hr>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-light p-4 rounded">
<!-- form start -->
<form action="" method="POST">
	<h3 class="text-center">Change Password</h3>
<div class="form-group">
	<label for="password">Old Password</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
			<input type="password" name="old_password" id="old_password" required class="form-control" placeholder="Enter Old Password">
		<div class="input-group-append show_hide_password"><span class="input-group-text"><i class="fa fa-eye"></i></span></div>

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
	<input type="submit" name="submit" id="submit_btn" class="btn btn-success form-control" value="Update">
</div>
<div class="text-center my-4">
	<span class=" bg-danger text-light rounded" id="error_msg"> <?php echo $error; ?></span>
</div>
<?php if($success != ''){ ?>
	<div class="alert alert-success"> <?php echo $success; ?></div>
<?php } ?>

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