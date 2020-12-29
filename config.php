<?php

//Setting Mysql configuration

$serverName = 'localhost';
$userName = 'root';
$password = 'bylyngolsp';
$databaseName = 'test';

$conn = mysqli_connect($serverName,$userName,$password,$databaseName);
if(!$conn){
	die('MySql connection Error :'. mysqlI_connect_error());
}

//Mysql table configuration
/* remove this comment to create a users table 
$create_table = mysqli_query($conn,'CREATE TABLE IF NOT EXISTS users( id int PRIMARY KEY NOT NULL AUTO_INCREMENT, name varchar(255), email varchar(255), phone_no varchar(55), password varchar(255))');
if(!$create_table){
	echo "Table creation Error : ".mysqli_error($conn);
}
*/
?>