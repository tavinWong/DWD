<?php
include ("php/login.php");
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dollenge</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/myjs.js"></script>
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php"><img class="logo" src="img/header_logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="fundingPage.php">Fundings</a></li>
        <li><a href="actionPage.php">Actions</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">Go</button>
      </form>
       <?php
      /**--logged in php **/
      $login = getConnect();
      // if( $_SESSION["name"] )
      if( isset($_SESSION["user_name"]) && $_SESSION["user_name"] )
      {
        echo " <div class=\"nav navbar-left\">
          <a id=\"userBtn\" class=\"loginBtn\" href=\"#\">".$_SESSION['user_name']."
          </a>
           <div id=\"userInfo\"class=\"userInfo hide\">
           <a class=\"marginbottom\" href=\"profile.php\">profile</a>
           <a class=\"btn btn-block\" href=\"php/logout.php\">Logout</a>
        </div>
      </div>";
      }else{
        echo"
      <div class=\"nav navbar-left\">
        <a id=\"loginBtn\" class=\"loginBtn\" href=\"#\"> Login</a>
        <!--Login form-->
        <div id=\"loginForm\"class=\"loginForm hide\">
          <form action = \"php/login.php\" method=\"post\">
            <input type=\"text\" class=\"form-control marginbottom\" name=\"user_name\" placeholder=\"User Name\" required=\"required\">
            <input type=\"password\" class=\"form-control marginbottom\" name=\"password\" placeholder=\"Password\" required=\"required\">
            <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"login\">Login</button>
          </form>
          <a href=\"#\">Forget password?</a>
        </div>
        <!-- register form-->
        <a id=\"registerBtn\" class=\"loginBtn\" href=\"#\"> Register</a>
        <div id=\"registerForm\" class=\"registerForm hide\">
          <form action = \"php/register.php\" method=\"post\">
            <input type=\"text\" class=\"form-control marginbottom\" name=\"user_name\" placeholder=\"User Name\" required=\"required\">
            <input type=\"password\" class=\"form-control marginbottom\" name=\"password\" placeholder=\"Password\" required=\"required\">
            <input type=\"password\" class=\"form-control marginbottom\" name=\"rePw\" placeholder=\"Confirm Password\" required=\"required\">
            <input type=\"email\" class=\"form-control marginbottom\" name=\"email\"  placeholder=\"Email\" required=\"required\">
            <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"register\">Register</button>
          </form>
        </div>
      </div>
    ";
        }
      ?>

  </div>
</nav>