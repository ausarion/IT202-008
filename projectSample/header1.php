<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title></title>

</head>


<body onload="findFormsOnLoad();">
 <header>
        <nav class="nav-header-main">
            <a class="header-logo" href="#"><img src="" alt="logo"></a>
            <ul class="">
                <li><a href="header1.php">Home</a></li>
                <li><a href="index.inc.php">Contact</a></li>
                <li><a href="index.inc.php">About me </a></li>
                <li><a href="index.inc.php"></a></li>
                <li><a href="index.inc.php"></a></li>
            </ul>
            <div class="header-login">
                <?php
                if (isset($_SESSION['id'])) {
                    echo "<form action=''>
                        <button>LOG OUT</button>
                    </form>";
                }else{
                    echo "<form action='' name='loginform' id='myForm' method='POST'onsubmit='return verifyPasswords(this)'>
                                <input type='text' id='email' name='email'  placeholder='Username/email'/>
                                <span id='pass_error'></span>
                                <input type='password' id='pass' name='password' autocomplete='on' placeholder='Enter password' onclick='verifyPasswords()'/>
                                <button id='login'>Login</button>
                           </form>";
                    echo "<form>
                    <a href='signup.php'>Sign up</a>
                    </form>";
                    echo "<form action='logout.php'>
                                <button type='submit' name='logout-submit'>Logout</button> 
                          </form>";



                }
                ?>
            </div>
        </nav>
    </header>

    <?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();

    if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
       // $user = $_POST['userid'];
        $email = $_POST['email'];
        $pass = $_POST['password'];


    //let's hash it
    //$pass = password_hash($pass, PASSWORD_BCRYPT);
    //echo "<br>$pass<br>";
    //it's hashed

    require("config.php");
    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
    try {

        $db = new PDO($connection_string, $dbuser, $dbpass);
        $stmt = $db->prepare("SELECT id, userid, email, password from `Newusers` where email = :email LIMIT 1");
        $params = array(":email"=> $email);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";

        if ($result) {
            $password = $result['password'];
            //this is the wrong way
            //$pass = password_hash($pass, PASSWORD_BCRYPT);
            //if($pass == $userpassword)
            //this is the correct way (please lookup password_verify online)
            if (password_verify($pass, $password)) {
                $id = $result['id'];
                echo "You logged in with id of " . $id;
                echo "<pre>" . var_export($result, true) . "</pre>";
                $stmt = $db->prepare("SELECT r.id, r.role_name from `Roles` r JOIN `UserRoles` ur on r.r_id = ur.role_id where ur.user_id = :id");
                $stmt->execute(array("id"=> $id));
                $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if (!$roles) {
                    $roles = array();
                }
                $user = array(
                    "id" => $id,
                    "email" => $result['email'],
                    "roles" => $roles);
                $_SESSION['user'] = $user;
                echo "Session: <pre>" . var_export($_SESSION, true) . "</pre>";
            } else {
                echo "Failed to login, invalid password";
            }
        } else {
            echo "Invalid username or email ";
        }
    }
    catch(Exception $e){
       echo $e->getMessage();
       exit();
       }
    }
    ?>


