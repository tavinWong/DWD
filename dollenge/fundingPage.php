<!DOCTYPE html>
<?php include "header.php";?>
<div class="container-fluid bg-pink">
    <div class="titles date">
        <h2 >Fundings</h2>
    </div>
    <div style="clear:both;"></div>

    <a class="btn btn-info locationFixed" href="fundingForm.php">Apply for a funding</a>
    <div class="row text-center">
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
            while ($stmt->fetch()) {
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
                $summary = substr_replace($funding_description, "...", 300);
                echo "<p>" . $summary . "<a href=\"funding.php?funding_id=" . $funding_id . "\">read more</a>
                </p>";
                $percentage = $funding_total / $funding_goal;
                $number = $percentage * 100;
                echo "<div class=\"progress\">
                    <div class=\"progress-bar lemonyellow progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"" . $number . "\"
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
<!-- End of Action Group -->
<?php include "footer.php"?>
