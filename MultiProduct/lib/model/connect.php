<?php
require "config.php";


try {
    $pdo = new PDO("mysql:host=localhost", "root","");

    echo "Connect Successfully. Host Info: " .
        $pdo->getAttribute(constant(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE));
} catch (PDOException $e){
    die("Error: Could not connect, " . $e->getMessage());
}
?>