<?php
include('config.php');
session_start();
$user_email = $_SESSION['user_email'];

	$result = mysqli_query($conn,"SELECT * FROM users WHERE email = '$user_email' ");
	if(mysqli_num_rows($result)<1){
		header('location:index.php');
	}

?>