<?php
require ('config.php');
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
$db = new PDO($connection_string, $dbname = "root", "") or die("Bad Query");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username=mysql_escape_string($connection_string, $_POST['Username']);
    $password=mysql_escape_string($db, $_POST['password']);
    $result= new PDO($db, "SELECT* FROM NewUsers");
    $rows = PDO::MYSQL_ATTR_FOUND_ROWS($result);
    if($rows!=$Username) {
        header("Location: index.php?remarks_login=failed");
    }
    $query = "SELECT id FROM NewUsers WHERE Username= '$Username' && password= $password";
    $result= $db->query($connection_string, $query);
    $row= mysql_fetch_array($result);
    $active=$row['active'];
    $count=mysql_num_rows($result);
    if($count==1) {
        $_SESSION['login_user']=$Username;
        header("Location: searchProduct.php");
    }
}
?>