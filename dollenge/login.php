<?php include ("connect.php");
if(!isset($_SESSION)){
    session_start();
}
$autorizedUser = "";

function isAuthorized()
/**
 * Created by "CharlotteZhang".
 * User: user
 * Date: 2016/2/18
 * Time: 9:41
 */
$login = getConnect();
if(isset($_POST['login'])){
    $username = $login->real_escape_string($_POST['user_name']);
    $password = $login->real_escape_string($_POST['password']);
    $password = md5($password);
    $sel_user = "select * from users where username='$username' AND   password='$password'";
    $run_user = $login->query($sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user == 1){
        $_SESSION['user_name'] = $username;
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('Username or password is not correct, try again!')";
    }
};
$login->close();
?>
