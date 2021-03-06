<!DOCTYPE html>
<html>
<head>
	<title>forumV1 - Answers</title>
	<!-- bootstrap CSS -->
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<?php include 'partials/_header.php'; ?>
	<?php include 'partials/_dbconnect.php'; ?>


	<?php
		$qid = $_GET['questionid'];
		// Fetching Questions
		$sql = "SELECT * FROM `questions` WHERE qid=$qid";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$qtitle = $row['qtitle'];
			$qdesc = $row['qdesc'];
		}
	?>

    <?php
      $showAlert = false;
      $method = $_SERVER['REQUEST_METHOD'];
      
      if ($method == 'POST') {
        $username = $_SESSION['username'];
        $answer = $_POST['comment'];
        $answer = str_replace("<", "&lt;", $answer);
        $answer = str_replace("<", "&gt;", $answer);

        $useremail = $_SESSION['useremail'];
        $sql = "INSERT INTO `answers` (`answer`, `qid`, `user`, `time`) VALUES ('$answer', '$qid', '$username', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        
        $showAlert = true;
      }
      if ($showAlert) {
        echo '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
		    <strong>Posted successfully!</strong>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		      <span aria-hidden="true">&times;</span>
		    </button>
		  </div>
	          ';
      }
    ?>
	<!-- Question -->
	<div class="container my-4">
		<div class="jumbotron pb-2 pt-2">
		  <h1 class="display-4"><?php echo $qtitle; ?></h1>
		  <p class="lead"><?php echo $qdesc; ?></p>
		</div>
	</div>

	<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo '
	    <div class="container">
	      <h2 class="py-"2>Start discussion</h2>
	      <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
	          <div class="form-group">
	            <label for="exampleFormControlTextarea1">Write your concerns</label>
	            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
	          </div>
	          <button type="submit" class="btn btn-primary">Post</button>
	        </form>
	      </div>';
	      }
	      else{
	        echo '
	        <div class="container">
	        <div class="jumbotron pb-2">
	        <h1 class="display-8">You are not logged in.</h1>
	        <hr class="my-4">
	        <p>Please login to start discussion.
	        </p>
	        <p class="lead">
	          <button type="button" class="btn btn-outline-primary ml-1 mr-1" data-toggle="modal" data-target="#loginModal">Login</button>
	        </p>
	      </div>
	      </div>
	        ';

	      }
	?>
	<div class="container">
	<h2>Answers</h2>
	<?php
		// Fetching answers from the database
		$sql = "SELECT * FROM `answers` WHERE qid=$qid";
		$result = mysqli_query($conn, $sql);
		$numRows = mysqli_num_rows($result);
		while ($row = mysqli_fetch_assoc($result)) {
			$answer = $row['answer'];
			$user = $row['user'];
			
			// displaying answers
			echo '
				<div class="jumbotron pb-2 pt-2 bg-light">
				  <h1 class="display-10">
				  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
				  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
				</svg>
				'.$user.'</h1>
				  <p class="lead">'.$answer.'</p>
				</div>
				<hr />
				';
		}
		if ($numRows==0) {
			echo '
			   <div class="jumbotron pb-2 pt-2">
				  <h1 class="display-10">No answer avaialble for this question.</h1>
				</div>
			';
		}
	?>
	</div>




 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
