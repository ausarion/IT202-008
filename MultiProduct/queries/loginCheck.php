<?php
require "config.php";
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
$link = mysqli_connect("localhost", "root", "", "rja36") or die($link);
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username=m($link, $_POST['Username']);
    $password=mysql_real_escape_string($link, $_POST['password']);
    $result= mysql_query($link, "SELECT* FROM NewUsers");
    $c_rows = mysql_num_rows($result);
    if($c_rows!=$Username) {
        header("Location: index.php?remarks_login=failed");
    }
    $query = "SELECT id FROM NewUsers WHERE Username= '$Username' and password= $password'";
    $result=mysqli_query($connection_string, $query);
    $row= mysql_fetch_array($result);
    $active=$row['active'];
    $count=mysql_num_rows($result);
    if($count==1) {
        $_SESSION['login_user']=$Username;
        header("Location: welcome.php");
    }
}
?>