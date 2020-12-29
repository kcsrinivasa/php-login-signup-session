<?php
include('session.php');
$success=$error='';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];

		$update_record = mysqli_query($conn,"UPDATE users SET name='$name',  phone_no='$phone_no' WHERE email='$email' ");
		if($update_record){
			$success = 'Successfully Updated the Account.';
			header("refresh:3;url=home.php");
		}else{
			$error = 'Error : Please try agian'.mysql_error($conn);
		}
	
}
$user = mysqli_query($conn,"SELECT * FROM users WHERE email = '$user_email'");
$row = mysqli_fetch_array($user);

?>

<!DOCTYPE HTML>
<html>
<head>
<title>My Account</title>
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
      <li class="nav-item">
        <a class="nav-link" href="home.php"><i class="fa fa-th-large"></i>  Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="my_account.php"> <i class="fa fa-user"></i> My Account  <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="change_password.php"><i class="fa fa-lock"></i> Change Password</a>
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
	<h3 class="text-center">My Account</h3>
<div class="form-group">
	<label for="email">Email</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
			<input type="email" name="email" id="email" required readonly class="form-control" placeholder="Enter Mail Id" value="<?php echo $row['email'] ?>">
		</div>
</div>
<div class="form-group">
	<label for="name">Name</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
			<input type="text" name="name" id="name" required class="form-control" placeholder="Enter Full Name" value="<?php echo $row['name'] ?>">
		</div>
</div>
<div class="form-group">
	<label for="phone_no">Phone No:</label><div class="input-group">
		<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
			<input type="number" name="phone_no" id="phone_no" required class="form-control" placeholder="Enter Phone Number" value="<?php echo $row['phone_no'] ?>">
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


</body>
</html>