<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	include '_dbconnect.php';
	
	$username = $_POST['username'];
	$user_email = $_POST['signupEmail'];
	$pass = $_POST['password'];
	$cpass = $_POST['cpassword'];
	echo "<br>".$username;
	echo "<br>".$user_email;
	echo "<br>".$pass;
	echo "<br>".$cpass;

	// checking availability for username and email
	 $uSql = "SELECT * FROM `users` WHERE uname='$username'";
	 $eSql = "SELECT * FROM `users` WHERE uname='$username'";
	 $uResult = mysqli_query($conn, $uSql);
	 $eResult = mysqli_query($conn, $eSql);
	 $unumRows = mysqli_num_rows($uResult);
	 $enumRows = mysqli_num_rows($eResult);
	 echo $unumRows;
	 echo $enumRows;
	 if ($unumRows>0) {
	 	echo "Username is not available! Please try another username.";
	 	header("Location: /forumV1/index.php?signupsuccess=false");
	 }
	 elseif ($enumRows>0) {
	 	echo "Email is already in use. Please try to login.";
	 	header("Location: /forumV1/index.php?signupsuccess=false");
	 }
	 else{
	 	if ($pass == $cpass && $pass != "") {
	 		$phash = password_hash($pass, PASSWORD_DEFAULT);
	 		if ($username != "" && $user_email != "") {
		 		$sql = "INSERT INTO `users` (`uname`, `uemail`, `upass`, `date`) VALUES ('$username', '$user_email', '$phash', current_timestamp())";
		 		$result = mysqli_query($conn, $sql);
		 		if ($result) {
		 			echo "You have registered successfully!";
		 			header("Location: /forumV1/index.php?signupsuccess=true");

		 		}
		 	}
		 	else {
		 		echo "You can't leave Username and email empty";
		 		header("Location: /forumV1/index.php?signupsuccess=false");
		 	}
	 	}
	 	else{
	 		echo "either password didn't match or empty password";
	 		header("Location: /forumV1/index.php?signupsuccess=false");
	 	}
	 }
}
else{
	header("Location: /forumV1/index.php?signupsuccess=false");
}

?>
<!-- 
INSERT INTO `users` (`uid`, `uname`, `uemail`, `upass`, `date`) VALUES ('2', 'demo1', 'demo1@email.com', 'demo1', current_timestamp());  -->