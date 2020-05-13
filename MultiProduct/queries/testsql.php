 <?php
require 'config.php';
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

$db = new PDO($connection_string, $dbname = "root", "") or die("Bad Query");
$query = "Select * FROM Roles";
$stmt = $db->prepare($query);
$result = $stmt->execute();
print_r($stmt->fetchAll());
?>