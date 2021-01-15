<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <title>Forum0</title>
  </head>
  <body>
    <?php include "partials/_header.php"; ?>
    <?php include "partials/_dbconnect.php"; ?>
      
<!-- pulling results for search query from the database -->
      <?php
      $noresults = true;
          $searchq = $_GET["search"];
          $sql = "SELECT * FROM questions WHERE match(qdesc) against('$searchq')";
          $result = mysqli_query($conn, $sql);
          

          echo '
          <div class="container"><h3>Search results for <strong>"'.$searchq.'"</strong></h3></div>';
          while ($row = mysqli_fetch_assoc($result)) {
            $noresults = false;
            $title = $row['qtitle'];
            $desc = $row['qdesc'];
            $qdid = $row['qid'];
            $url = "answers.php?questionid=".$qdid;
            // search results
            echo '
            <div class="search container">
              <div class="results">
                
                <a href="'.$url.'">'.$title.'</a>
                <p>'.$desc.'</p>
              </div>
            </div>
            ';
          }
          if($noresults){
            echo '
              <div class="container my-2">
                <div class="jumbotron">
                  <h3 class="display-6">No results found!</h3>
                  <p>Please search another query</p>
                </div>
              </div>
            ';
          }
        ?>
 

    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
