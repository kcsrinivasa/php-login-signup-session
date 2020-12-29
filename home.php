<?php
include('session.php');
$error='';

	$user_list = mysqli_query($conn,"SELECT * FROM users");
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
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
<div class="m-3">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fa fa-th-large"></i>  Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_account.php"> <i class="fa fa-user"></i> My Account</a>
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

<?php if(mysqli_num_rows($user_list)>0){ ?>
	<table class="table table-stripped table-bordered">
		<thead class=" bg-secondary text-white">
		<tr>
			<th>Sl No.</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No.</th>
		</tr>
		</thead>
		<tbody style="background-color: #d6cccc66;">
			<?php $i=1; while($row =  mysqli_fetch_array($user_list)){ ?>
			<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['phone_no']; ?></td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
<?php }else{ ?>
<div class="alert alert-danger">No users found!</div>
<?php } ?>
</div>
</section>
<script type="text/javascript">


</script>

</body>
</html>