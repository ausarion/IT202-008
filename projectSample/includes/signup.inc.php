<?php
if (isset($_POST['signup-submit'])) {
    require('config.php');

    $user = $_POST['userId'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf = $_POST['confirm'];

    if (empty($user) || empty($email) || empty($pass) || empty($conf)) {
        header("Location: ../signup.php?error=emptyfields" . $user . "&email=" . $email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user)) {
        header("Location: ../signup.php?error=invalidemail&usreid");
        exit();
    }
     elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidemail&userid=" . $user);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
        header("Location: ../signup.php?error=invalidemail&userid=" . $email);
        exit();
    }
    elseif ($pass !== $conf) {
        header("Location: ../signup.php?error=conf&email= ".$email);
        exit();
    }
    else {
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
        $db = new PDO($connection_string, "root");
        $stmt = $db->prepare("SELECT userId FROM Newusers WHERE userId=?");
        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
        if ($stmt->execute()) {
            header("Location: ../signup.php?signupsuccess");
            exit();

            }else {
                echo "<a href='../signup.php'>Return to login</a>";
                echo '<br>';
                $msg = "All good, user $user registered";


                //let's hash it

                $pass = password_hash($pass, PASSWORD_BCRYPT);

                //echo "<br>$pass<br>";

                //it's hashed

                require("config.php");

                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

            try {

                $db = new PDO($connection_string, "root");

                $stmt = $db->prepare("INSERT INTO `NewUsers`

							( userId, email, password) VALUES

							(:userId,:email, :password)");

                $email = $_POST['email'];

                $params = array(":userId"=> $user,":email"=> $email,

                    ":password"=> $pass);

                $stmt->execute($params);



            }

            catch(Exception $e){

                echo $e->getMessage();

                exit();

            }

        }



    }

?>

<?php if(isset($msg)):?>
    <span><?php echo $msg;?></span>
<?php endif;?>
<?php
}
?>