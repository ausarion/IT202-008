<?php
session_start();
require ('config.php');


$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

$db = new PDO($connection_string, "root") or die("Bad Query");
if (isset($_POST['Username'])) {
    $query = "Select * FROM NewUsers WHERE $Username= Username";
    $stmt = $db->prepare($query);
    $result = $stmt->execute();
    $num_rows = sqlsrv_num_rows($result);
}
if ($num_rows) {
    header("Location: index.php?remarks=failed");
} else {
    $FirstName = $_POST['FirstName'];

    $LastName = $_POST['LastName'];

    $Username = $_POST['Username'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $conf = $_POST['confirm'];


    if(mysqli_query($connection_string, "INSERT INTO `NewUsers` (FirstName, LastName, Username, email, password) VALUES ('$FirstName', '$LastName', '$Username', '$email', '$password')"))
    ){
    header("location: index.php?remarks=success");
    }else {
    $e = sqlsrv_errors($connection_string);
   header("location: index.php?remarks=error&value=$e");
   }
}
?>

