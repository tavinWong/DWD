<!DOCTYPE html>
<?php include "header.php";?>
    <a class="btn btn-info locationFixed" href="fundingPage.php">Go to funding page to take an action</a>
    <div style="clear:both;"></div>
    <div id="wrapper">
        <div id="columns">
            <div class="actionpage-title">
            <strong>Action</strong> 
            </div>
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
        $query = "SELECT action_id, action_name, action_description, action_location, action_goal, action_total, action_start_date, action_expire_date, action_status, user_id, funding_id FROM actions ORDER BY action_id DESC ";
        if ($stmt->prepare($query)){
            /* execute query */
            $stmt->execute();
            /* bind your result columns to variables, e.g. id column = $post_id */
            $stmt->bind_result($action_id, $action_name, $action_description, $action_location, $action_goal, $action_total, $action_start_date, $action_expire_date, $action_status, $user_id, $funding_id);
            /* store result */
            $stmt->store_result();
            if($stmt->num_rows) {
                /* fetch the result of the query & loop round the results */
                while ($stmt->fetch()) {
                    echo "
                <div class=\"pin\">
                    <img class=\"featurette-image img-responsive center-block action-pic\" src=\"img/action_pic_1.jpg\">
                 ";
                    echo "<strong>" . $action_name . "</strong>\n";
                    //needs to be changed to left join funding name and funding id as the link table
                    echo "<p>for <a class=\"org-link\" href=\"fundingPage.php?funding_id=".$funding_id."\">".$funding_id."</a></p>";
                    $summary = substr_replace($action_description, "...", 300);
                    echo "<p>" . $summary . "<a href=\"action.php?action_id=" . $action_id . "\">read more</a>
                </p>";
                    $percentage = $action_total / $action_goal;
                    $number = $percentage * 100;
                    echo "<div class=\"progress\">
                    <div class=\"progress-bar mintgreen progress-bar-striped\" role=\"progressbar\" aria-valuenow=\"" . $number . "\"
                         aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . $number . "%\">
                    </div>
                    </div>";
                    //needs to use now date to minus expiredate
                    echo "<p><span>" . $action_total . "/" . $action_goal . "</span><span>" . $action_expire_date . "</span><span>" . $number . "%</span></p>";
                    // dot delimited query values \" escaped character
                    echo "
                <a class=\"btn btn-warning center-block btn-donate\" href=\"donationForm.php\">Donate</a>
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