<?php include ("connect.php");
if(!isset($_SESSION)){
    session_start();
}
/**
 * Created by "CharlotteZhang".
 * User: user
 * Date: 2016/2/18
 * Time: 9:41
 */
$login = getConnect();

// *** While or is nice solution, it doesn't take into account when the 'name' index is not set, which generates a php warning
// $userName = $_POST["name"] or "";
$userName = isset($_POST["user_name"]) ? $_POST["user_name"] : null;

// *** same change as above
// $userPass = $_POST["pass"] or "";
$password = isset($_POST["password"]) ? $_POST["password"] : null;
if(isset($_POST['login'])){
    $username = $login->real_escape_string($userName);
    $password = $login->real_escape_string($password);
    $password = md5($password);
    $sel_user = "select * from users where username='$username' AND   password='$password'";
    $run_user = $login->query($sel_user);
    $check_user = mysqli_num_rows($run_user);
    if($check_user == 1){
        $_SESSION['user_name'] = $username;
        echo "<script>window.open('../index.php','_self')</script>";
    }else{
        echo "<script>alert('Username or password is not correct, try again!')";
    }
};
$login->close();
?>
