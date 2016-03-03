<!DOCTYPE html>
<?php include "header.php";?><!--page-->
<?php
    if($_SESSION['user_id'] == null){
        echo "<p>Please login first</p><a href='../index.php'>back</a>";
        exit();
    }
?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/hot-sneaks/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<div class="text-center container title">
  <h2 >Create a funding</h2>
</div>
<div class="container-fluid bg-3">
    <form class="form-horizontal max-width" role="form" action="php/createfunding.php" method="post">
        <div class="form-group">
            <label for="funding_name">Funding Name</label>
            <input type="text" class="form-control funding-border" id="funding_name" name="funding_name" placeholder="type funding name">
        </div>
        <div class="form-group">
            <label for="funding_goal">Goal</label>
            <input type="number" class="form-control funding-border" id="funding_goal" name="funding_goal" placeholder="£">
        </div>
        <div class="row form-group">
            <div class="col-md-6 date">
                <label for="funding_start_date">start date</label>
                <input class="form-control funding-border" id="funding_start_date" type="text" name="funding_start_date"/>
                <script language="JavaScript">
                  $.noConflict();
                   jQuery( document ).ready(function( $ ) {
                      $("#funding_start_date").datepicker({firstDay: 1,dateFormat:"yy-mm-dd"});
                      });
                </script>
                </div>
                <div class="col-md-6 date1">
                <label for="funding_expire_date">Expire date</label>
                <input class="form-control funding-border" id="funding_expire_date" type="text" name="funding_expire_date"/>
                <script language="JavaScript">
                  $.noConflict();
                   jQuery( document ).ready(function( $ ) {
                      $("#funding_expire_date").datepicker({firstDay: 1,dateFormat:"yy-mm-dd"});
                      });
                </script>
                </div>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select  class="form-control">
                <?php
                    $mysqli = getConnect();
                    $stmt = $mysqli->init();
                    $query = "SELECT category_id, category_name FROM categroies";
                    if($stmt = $mysqli->prepare($query)){
                        $stmt->execute();
                        $stmt->bind_result($category_id, $category_name);
                        $stmt->store_result();
                        while($stmt->fetch()){
                            echo "<option id=\"".$category_id."\">".$category_name."</option>";
                        }
                    }
                ?>
                <option>踢足球</option>
                <option>游泳</option>
                <option>慢跑</option>
                <option>跳舞</option>
            </select>
        </div>
        <div class="form-group">
            <label for="funding_description">description</label>
            <textarea class="form-control col-sm-10  funding-border" rows="5" id="funding_description" name="funding_description" required="required"></textarea>
        </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Save</button>
        </div>
    </form>
</div>
<!-- End of Funding Group -->
<?php include "footer.php";?>
</body>
</html>
