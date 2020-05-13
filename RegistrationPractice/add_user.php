<?php
//this is check_db.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);



require('config.php');
echo "DBUser: " .  $dbuser;
echo "\n\r";

$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";



try{

	$db = new PDO($connection_string, $dbuser, $dbpass);
	echo "Should have connected";


	      $stmt = $db->prepare("INSERT INTO `LoginUsers`

                        (iemail) VALUES

                        (:email)");

         

        $params = array(":id="> 3, ":email"=> 'Bob@bob.com');

        $stmt->execute($params);
        echo "Post inserted";

        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";

	      echo var_export($stmt->errorInfo(), true);

}

catch(Exception $e){

	echo $e->getMessage();
	exit("It didn't work");

}


?>

