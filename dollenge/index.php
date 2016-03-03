<<<<<<< HEAD
<!DOCTYPE html>
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
            <img src="img/starry-dusk.jpg" alt="First slide" height="345">
            <div class="carousel-caption">
                <h1>BE A HERO</h1>
                <p>Take an action to encourage people to share their love and donate</p>
                <a href="fundingPage.php" class="carousel-button carousel-button3" role="button">Take an action</a>
            </div>
        </div>

        <div class="item">
            <img src="img/funding_pic.jpg" alt="Second slide" width="460" height="345">
            <div class="carousel-caption">
                <h1>Someone needs help</h1>
                <p>Discover someone who needs your help and share to everybody</p>
                <a href="fundingForm.php" class="carousel-button" role="button">Apply for a Funding</a>
            </div>
        </div>

        <div class="item">
            <img src="img/donate_pic.jpg" alt="Third slide" height="345">
            <div class="carousel-caption">
                <h1>Support Heros</h1>
                <p>Donate some money to support heroes' actions</p>
                <a href="actionPage.php" class="carousel-button carousel-button2" role="button">Donate</a>
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
<!-- Action group -->
<div class="container-fluid bg-3 text-center">
    <div class="titles">
        <h2 class="marginzero">Support Actions</h2>
        <a class="morebtn" href="actionPage.php">More actions</a>
    </div>
    <div style="clear:both;"></div>
    <div class="row text-center" style="margin=30px;">
        <?php
        /**
         * Created by "CharlotteZhang".
         * User: user
         * Date: 2016/2/26
         * Time: 15:12
         */
        //get the action information from database
        $mysqli = getConnect();
        /* create a prepared statement */
        $stmt =  $mysqli->stmt_init();
        $query = "SELECT action_id, action_name, action_description, action_location, action_goal, action_total, action_start_date, action_expire_date, action_status, user_id, funding_id FROM actions ORDER BY action_id DESC ";
        if ($stmt->prepare($query)){
            /* execute query */
            $stmt->execute();
            /* bind your result columns to variables, e.g. id column = $post_id */
            $stmt->bind_result($action_id, $action_name, $action_description, $action_location, $action_goal, $action_total, $action_start_date, $action_expire_date, $action_status, $user_id, $funding_id);
            /* store result */
            $stmt->store_result();
            if($stmt->num_rows) {
                /*counter to select 3 rows from the result*/
                $n = 0;
                /* fetch the result of the query & loop round the results */
                while ($stmt->fetch() && ($n<3)) {
                    $n ++;
                    echo "
                    <div class=\"col-sm-4\">
                        <img src=\"img/action_pic_1.jpg\" class=\"img-responsive\" alt=\"Image\">
                    ";
                    echo "<h3>" . $action_name . "</h3>\n";
                    //needs to be changed to left join funding name and funding id as the link table
                    echo "<p>for <a class=\"org-link\" href=\"fundingPage.php?funding_id=".$funding_id."\">".$funding_id."</a></p>";
                    $summary = substr_replace($action_description, "...", 30);
                    echo "<p class=\"action-text\">" . $summary . "<a href=\"action.php?action_id=" . $action_id . "\">read more</a>
                     </p>";
                    //later left join user name
                    echo "<p class=\"postby\">post by <a href=\"profile.php\">".$user_id."</a> </p>
                     <div style=\"clear:both;\"></div>";
                    $percentage = $action_total / $action_goal;
                    $number = $percentage * 100;
                    echo "<div class=\"progress\">
                        <div class=\"progress-bar mintgreen progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"".$number."\"
                             aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:".$number."%\">
                        </div>
                    </div>
                    <div class=\"row\">
                        <li class=\"block\">".$action_total."/". $action_goal."</li>
                        <li class=\"block\">".$action_expire_date."</li>
                        <li class=\"block\">".$number."%</li>
                    </div>";
                    // dot delimited query values \" escaped character
                    echo "
                   <a class=\"donatebtn\" href=\"donationForm.php?action_id=".$action_id."\">Donate</a>
                </div>";
                }
            }else {// there aren't any results
                echo "<p>There isn't any content</p>";
            }
            /* close statement */
            $stmt->close();
        }

        /* close connection */
        $mysqli->close();

        ?>
    </div>
</div>
<!-- End of Action Group -->
<!--Funding Group-->
<div class="container-fluid bg-pink text-center">
    <div class="titles">
        <h2 class="marginzero">Raise for fundings</h2>
        <a class="morebtn" href="fundingPage.php">More fundings</a>
    </div>
    <div style="clear:both;"></div>
    <?php
    /**
     * Created by "CharlotteZhang".
     * User: user
     * Date: 2016/2/25
     * Time: 15:12
     */
    //get the funding information from database
    $mysqli = getConnect();
    /* create a prepared statement */
    $stmt =  $mysqli->stmt_init();

    if ($stmt->prepare("SELECT funding_id, funding_name, organization_id, funding_description, funding_goal, funding_total, funding_expire_date FROM fundings ORDER BY funding_id DESC ")){
        /* execute query */
        $stmt->execute();
        /* bind your result columns to variables, e.g. id column = $post_id */
        $stmt->bind_result($funding_id, $funding_name, $organization_id, $funding_description, $funding_goal, $funding_total, $funding_expire_date);
        /* store result */
        $stmt->store_result();
        if($stmt->num_rows) {
            /* fetch the result of the query & loop round the results */
            $n = 0;
            while ($stmt->fetch() && ($n<2)) {
                $n++;
                echo "
                <div class=\"row marginbottom\">
                    <div class=\"col-sm-6 addpadding\">
                        <img class=\"featurette-image img-responsive center-block\" alt=\"Responsive image\" src=\"img/funding_pic_1.jpg\">
                    </div>
                     <div class=\"col-sm-6 addpadding\">
                 ";
                echo "<h3>" . $funding_name . "</h3>\n";
                //needs to be changed to left join organization table
                echo "<p>for <a class=\"org-link\" href=\"#\">Cancer research UK</a></p>";
                $summary = substr_replace($funding_description, "...", 100);
                echo "<p>" . $summary . "<a href=\"funding.php?funding_id=" . $funding_id . "\">read more</a>
                </p>";
                $percentage = $funding_total / $funding_goal;
                $number = $percentage * 100;
                echo "<div class=\"progress\">
                    <div class=\"progress-bar lemonyellow\" role=\"progressbar\" aria-valuenow=\"" . $number . "\"
                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . $number . "%\">
                    </div>
                </div>";
                //needs to use now date to minus expiredate
                echo "<p><span>" . $funding_total . "/" . $funding_goal . "</span><span>" . $funding_expire_date . "</span><span>" . $number . "%</span></p>";
                // dot delimited query values \" escaped character
                echo "
                <a class=\"actionbtn\" href=\"actionForm.php?funding_id=".$funding_id."\">Take an action</a>
                </div>
                <div style=\"clear:both;\"></div>
                <hr class=\"line2\">
                </div>";
            }
        }else {// there aren't any results
            echo "<p>There isn't any content</p>";
        }
        /* close statement */
        $stmt->close();
    }

    /* close connection */
    $mysqli->close();

    ?>
</div>
</div>

<!-- End of Funding Group -->
<?php include "footer.php";?>

=======
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
>>>>>>> origin/master
