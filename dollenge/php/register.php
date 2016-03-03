<<<<<<< HEAD
<?php include "connect.php";
/**
 * Created by "CharlotteZhang".
 * User: user
 * Date: 2016/1/29
 * Time: 12:46
 */
$register = getConnect();
$stmt = $register->stmt_init();
//get inform
$username = $register->real_escape_string($_POST['user_name']);
$password =  $register->real_escape_string($_POST['password']);
$rePw =  $register->real_escape_string($_POST['rePw']);
$email =  $register->real_escape_string($_POST['email']);
if(!($password == $rePw)){
    echo "<p style='color: #ff7970;'>Please re-enter your password</p>";
    return;
}
$password = md5($password);

//check if the user is already exist
$query = "SELECT * FROM users WHERE user_name = ?";
if($stmt = $register->prepare($query)){
    $stmt->bind_param("s",$username);
    /* execute query */
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo "<p>Sorry this username is taken</p><a href='../index.php'>back</a>";
        exit();
    }
    $stmt->close();

}

$stmt = $register->stmt_init();
$insert = "INSERT INTO users (user_id, user_name, user_pw, user_email) VALUES (NULL, ?, ?, ?)";
if($stmt = $register->prepare($insert)){ 
    $stmt->bind_param("sss",$username,$password,$email);
    /* execute query */
    $stmt->execute();

    $_SESSION['user_id'] = $register->insert_id;
    $_SESSION['user_name'] = $username;
    echo "<script>window.open('../index.php','_self')</script>";
    $stmt->close();
}else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$register->close();
=======
<?php include "connect.php";
/**
 * Created by "CharlotteZhang".
 * User: user
 * Date: 2016/1/29
 * Time: 12:46
 */
$register = getConnect();

//get inform
$username = $register->real_escape_string($_POST['user_name']);
$password =  $register->real_escape_string($_POST['password']);
$rePw =  $register->real_escape_string($_POST['rePw']);
$email =  $register->real_escape_string($_POST['email']);
if(!($password == $rePw)){
    echo "<p style='color: #ff7970;'>Please re-enter your password</p>";
    return;
}
$password = md5($password);
$query = "SELECT * FROM users WHERE username = ?";
if($stmt = $register->prepare($query)){
    /* execute query */
    $stmt->execute();

    /* store result */
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo "<p>Sorry this username is taken</p>";
    }
}
$insert = "INSERT INTO users (id, username, password, email) VALUES (NULL, ?, ?, ?)";
if($stmt = $register->prepare($insert)){
    $stmt->bind_param("sss",$username, $password, $email);
    $stmt->execute();
    echo "<p>You're Registered!</p>";
    Redirect('../index.php',false);
    $stmt->close();
}
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}
$register->close();
>>>>>>> origin/master
?>