<?php 
//connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "forumV1";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("database connection failed!" .mysqli_connect_error());
}
?>