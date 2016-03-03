<?php include "connect.php";
/**
 * Created by "CharlotteZhang".
 * User: user
 * Date: 2016/2/25
 * Time: 11:14
 */
$funding = getConnect();

$funding_name = isset($_POST["funding_name"]) ? $_POST["funding_name"] : null;
$funding_goal = isset($_POST["funding_goal"]) ? $_POST["funding_goal"] : null;
$funding_start_date = isset($_POST["funding_start_date"]) ? $_POST["funding_start_date"] : null;
$funding_expire_date = isset($_POST["funding_expire_date"]) ?  $_POST["funding_expire_date"] : null;
$funding_description = isset($_POST["funding_description"]) ? $_POST["funding_description"] : null;
$category_id = isset($_POST["category_id"]) ? $_POST["category_id"] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$funding_total = 0;
$organization_id = 1;
$stmt = $funding->stmt_init();
$insert = "INSERT INTO fundings (funding_id, funding_name, funding_goal, funding_start_date, funding_expire_date, funding_description,funding_total,user_id, category_id, organization_id)
VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if($stmt = $funding->prepare($insert)){
    $stmt->bind_param("sdsssdiii",$funding_name,$funding_goal,$funding_start_date, $funding_expire_date,$funding_description,$funding_total,$user_id, $category_id, $organization_id);
    /* execute query */
    $stmt->execute();

    echo "<p>".$stmt->affected_rows."</p>";
    echo "<script>window.open('../fundingPage.php','_self')</script>";
    $stmt->close();
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$funding->close();
?>

