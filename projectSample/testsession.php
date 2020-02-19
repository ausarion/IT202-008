<?php
session_start();
echo "<pre>" . var_export($_SESSION, true) . "</pre>";
$test = 1;
echo "you are number $test"; 
?>



