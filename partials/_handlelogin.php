<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	include '_dbconnect.php';
	$email = $_POST['lEmail'];
	$pass = $_POST['lpassword'];
	
	//checking email availability
	$sql = "SELECT * FROM `users` WHERE uemail = '$email'";
	$result = mysqli_query($conn, $sql);
	$numRows = mysqli_num_rows($result);
	echo $numRows;
	if ($numRows==1) {
		$row = mysqli_fetch_assoc($result);
		if (password_verify($pass, $row['upass'])) {
			session_start();

			$loginstatus = $_SESSION['loggedin'] = true;
			$_SESSION['useremail'] = $email;
			$_SESSION['username'] =  $row['uname'];
			echo "logged in". $email;
			header("Location: /forumV1/index.php?loginsuccess=true");
		}
		else{
		 header("Location: /forumV1/index.php?loginsuccess=false");
		}
		// header("Location: /forum0/index.php");
	}
	else{
		 header("Location: /forumV1/index.php?loginsuccess=false");
		}
	
}
else{
	 header("Location: /forumV1/index.php?loginsuccess=false");
	}

?>
