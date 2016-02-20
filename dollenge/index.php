<!DOCTYPE html>
<?php
include ("php/login.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dollenge</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/myjs.js"></script>
    <link rel="stylesheet" href="css/docss.css">
</head>
<body>
<?php include "header.php";?>
<!--carousel-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="img/starry-dusk.jpg" alt="First slide">
            <div class="carousel-caption">
                <h1>BE A HERO</h1>
                <p>Take an action to encourage people to share their love and donate</p>
                <a href="#" class="carousel-button" role="button">Take an action</a>
            </div>
        </div>

        <div class="item">
            <img src="img/starry-dusk.jpg" alt="First slide">
            <div class="carousel-caption">
                <h1>BE A HERO</h1>
                <p>Take an action to encourage people to share their love and donate</p>
                <a href="#" class="carousel-button" role="button">Take an action</a>
            </div>
        </div>

        <div class="item">
            <img src="img/starry-dusk.jpg" alt="First slide">
            <div class="carousel-caption">
                <h1>BE A HERO</h1>
                <p>Take an action to encourage people to share their love and donate</p>
                <a href="#" class="carousel-button" role="button">Take an action</a>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End of Carousel -->

<?php include "footer.php";?>
</body>
</html>
