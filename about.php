<!DOCTYPE html>
<html>
<head>
  <title>forumV1 - Questions</title>

<!-- bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <?php include 'partials/_header.php'; ?>
  <?php include 'partials/_dbconnect.php'; ?>

  
  
  <!-- Forum category -->
  <div class="container my-5">
    <div class="jumbotron bg-primary">
      <h1 class="display-4 text-center">About forumV1</h1>
        <h3 class="text-light">ForumV1 is a dicussion based website. It is developed using HTML, Bootstrap, PHP and MySQL.</h3>
        <strong>Features:</strong>
        <ul class="text-light">
          <li>Login/SignUp System</li>
          <li>Search functionality</li>
          <li>Dynamically fetching data from the Database</li>
          <li>User Profile</li>
          <li>Restrication for asking and answering questions</li>          
        </ul>
        
  </div>



 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Questions -->
<!--  <div class="container my-4">
    <div class="media">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>      
        <div class="media-body">
        <h5 class="mt-0">Question title</h5>
          Question description
        </div>
    </div>
  </div> -->

</body>
</html>