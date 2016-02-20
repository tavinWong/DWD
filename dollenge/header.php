<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['user'])) {
  header('Location: php/index.php');
}

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="img/header_logo.png" class="img-responsive">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Fundings</a></li>
        <li><a href="#">Actions</a></li>
        <li><a href="#">About Us</a></li>
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
           <a class=\"marginbottom\" href=\"#\">profile</a>
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
          <a href=\"#\">Register Now!</a>
          </br>
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