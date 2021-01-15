<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Profile</title>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include 'partials/_header.php'; ?>
    <!-- Database connection -->
    <?php include 'partials/_dbconnect.php'; ?>

<div class="container">
<?php 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        session_start();
        $username = $_SESSION['username'];
        //fetching questions of a user
        $qsql = "SELECT * FROM `questions` WHERE user='$username'";
        $qresult = mysqli_query($conn, $qsql);
        $qRows = mysqli_num_rows($qresult);
        //fetching answers of a user
        $asql = "SELECT * FROM `answers` WHERE user='$username'";
        $aresult = mysqli_query($conn, $asql);
        $aRows = mysqli_num_rows($aresult);

        echo '
            <h1 class="display-8 text-center text-primary"><strong>Hello! '.$username.'</strong></h1>
            ';
            if ($qRows>0) {
                $sql = "SELECT * FROM `questions` WHERE user='$username'";
                $result = mysqli_query($conn, $sql);

                echo '
                    <div class="jumbotron pb-1 pt-1">
                    <div class="container my-1">
                    <h1 class="display-8 text-success">You have asked questions: '.$qRows.'</h1>
                ';
                while ($row = mysqli_fetch_assoc($result)) {
                    // fetching questions from the Database
                    $qtitle = $row['qtitle'];
                    $qdesc = $row['qdesc'];
                    $qid = $row['qid'];

                    //displaying questions  
                    echo '
                        <div class="container my-4">
                            <div class="media">      
                                <div class="media-body">
                                <h5 class="mt-0"><a href="answers.php?questionid='.$qid.'">'.$qtitle.'</a></h5>
                                    '.$qdesc.'
                                </div>
                            </div>
                        </div>
                    ';
                }
                echo '
                    </div>
                    </div>
                ';
            }
            else{
                echo '
                    <p class="lead">You have not asked any questions yet.</p>
                ';
            }
            if ($aRows>0) {
                //fetching question title
                $qtsql = "SELECT * FROM `questions` WHERE user='$username'";
                $qtresult = mysqli_query($conn, $qtsql);
                $qrow = mysqli_fetch_assoc($qtresult);
                

                $sql = "SELECT * FROM `answers` WHERE user='$username'";
                $result = mysqli_query($conn, $sql);

                echo '
                    <div class="jumbotron pb-1 pt-1">
                    <div class="container my-1">
                    <h1 class="display-8 text-success">You have answered questions: '.$aRows.'</h1>
                ';
                while ($row = mysqli_fetch_assoc($result)) {
                    //fetching data from questions table
                    $qtitle = $qrow['qtitle'];
                    $qid = $qrow['qid'];
                    // fetching questions from the Database
                    $answer = $row['answer'];

                    //displaying questions
                    echo '
                        <div>
                            <div class="container my-4">
                            <div class="media">      
                                <div class="media-body">
                                <h5 class="mt-0"><a href="answers.php?questionid='.$qid.'">'.$qtitle.'</a></h5>
                                    '.$answer.'
                                </div>
                            </div>
                        </div>
                        ';
                }
                echo '
                    </div>
                    </div>
                ';
            }
            else{
                echo '
                    <p class="lead">You have not asked any questions yet.</p>
                ';
            }

        echo '
              </div>            
        ';
    }
    else
    {
        echo '
        <div class="container my-4">
        <div class="jumbotron pb-2">
        <h1 class="display-8">You are not logged in.</h1>
        <hr class="my-4">
        <p>Please login to view profile.
        </p>
        <p class="lead">
          <button type="button" class="btn btn-outline-primary ml-1 mr-1" data-toggle="modal" data-target="#loginModal">Login</button>
        </p>
      </div>
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