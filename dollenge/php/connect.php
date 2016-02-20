<?php
/**
 * Created by CharlotteZhang.
 * User: user
 * Date: 2016/1/29
 * Time: 10:16
 */
function getConnect(){
    $conn = new mysqli("localhost", "root", "1","demo");
    if (mysqli_connect_errno())
    {
        echo "MySQLi Connection was not established:" . mysqli_connect_error();
    }
    return $conn;
}

?>