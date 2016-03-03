<!DOCTYPE html>
<?php include "header.php";?><!--page-->
<?php
if(!$_SESSION['user_name']){
  echo "<p>please login first</p>";
  exit();
}
?>
<div class="text-center container title">
  <h2 >Take An Action</h2>
</div>
<div class="container-fluid bg-3">
    <form class="form-horizontal max-width" role="form" action="php/createaction.php" method="post">

    <div class="form-group ">
      <label for="funding_id">Raise for </label>
      <?php
      $funding_id = isset($_GET['funding_id'])? $_GET['funding_id'] : null;
      $mysqli = getConnect();
      $stmt = $mysqli->init();
      $query = "SELECT funding_name FROM fundings WHERE funding_id= ?";
      if($stmt = $mysqli->prepare($query)){
        $stmt->bind_param("i", $funding_id);
        $stmt->execute();
        $stmt->bind_result($funding_name);
        $stmt->store_result();
        while($stmt->fetch()){
          echo "<input type=\"text\" class=\"hidden\" id=\"funding_id\" name=\"funding_id\" value=\"".$funding_id."\" >";
          echo "<p>".$funding_name."</p>";
        }
        $stmt->close();
      }
      ?>
    </div>
  <div class="form-group">
    <label for="action_name">Action Name</label>
    <input type="text" class="form-control form-control1" id="action_name" name="action_name" placeholder="type action name">
  </div>
  <div class="form-group">
    <label for="action_name">Goal</label>
    <input type="number" class="form-control form-control1" id="action_goal" name="action_goal" placeholder="£">
  </div>
  <div class="form-group">
    <label for="action_location">Location</label>
    <input type="text" class="form-control form-control1" id="action_location" name="action_location" placeholder="city name">
  </div>
  <div class="form-group">
    <label for="action_description">description</label>
    <textarea class="form-control form-control1 col-sm-10" rows="5" id="action_description" name="action_description" placeholder="desscribe your action"></textarea>
  </div>
  <!--<div class="form-group">
    <label for="exampleInputFile">檔案上傳</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">在此示範區塊層級輔助說明文字。</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> 勾選我
    </label>
  </div>-->
  <button type="submit" class="btn btn-primary btn-block" name="submit">save</button>
</form>
</div>
<!-- End of Funding Group -->
<?php include "footer.php";?>
</body>
</html>
