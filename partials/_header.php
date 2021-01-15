<?php
session_start(); 
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">forumV1</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forumV1">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/forumV1/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Programming
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Frontend</a>
          <a class="dropdown-item" href="#">Backend</a>
          <a class="dropdown-item" href="#">Full Stack</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Linux</a>
          <a class="dropdown-item" href="#">Security</a>
          <a class="dropdown-item" href="#">Networking</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>';
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
      echo '
        <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown my-0">
          <a class="dropdown-item text-primary" href=/forumV1/profile.php>Profile</a>
          <a class="dropdown-item text-primary" href="partials/_logout.php">Logout</a>
        </div>
      </div>
      <div class="text-light">Hello! '.$_SESSION['username'].'</div>
      ';
    }
    else{
    echo '
    <!--Login/SignUp-->
      <button type="button" class="btn btn-outline-primary ml-1 mr-1" data-toggle="modal" data-target="#loginModal">Login</button>
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#signupModal">SignUp</button>
      ';
    }
    echo '
      </div>
    </nav>
    ';
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
      echo '
        <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Success!</strong> You have been registered in successfully!
        </div>
      ';
    }
    elseif ($_GET['signupsuccess'] == "false") {
      echo '
        <div class="alert alert-danger" role="alert my-0">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Something went wrong!</strong>
        </div>
      ';
    }
    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
      echo '
        <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Login failed!</strong> Something went wrong!
        </div>
      ';
    }

    
include "partials/_loginmodal.php";
include "partials/_signupmodal.php";

 ?>