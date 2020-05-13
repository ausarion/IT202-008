<?php
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

mysql_connect("localhost", "root");
mysql_select_db("rja36");

$result = mysql_query("Select * from loginUsers where username= $Username && password= $password")
    or die("Failed to query". mysql_error());
$row = mysql_fetch_array($result);
if ($row['username'] == $Username && $row['password'] == $password){
    echo "Login successful!! Welcome ". $row['username'];
}else {
    echo "Failed to login";
}
