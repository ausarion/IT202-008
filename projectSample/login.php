<!doctype html>

<html lang="en">


<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"

          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MultiProduct - Login</title>




</header>


<body onload="findFormsOnLoad();">

<div class="container-fluid">

    <header>

        <nav class="navbar navbar-expand-lg navbar-blue bg-blue">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">

                    <a class="nav-link" href="index.php"?home">Home</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="index.php?"></a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="login.php?login">Login</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="register.php"?register">Register</a>

                </li>


                <li class="nav-item">

                    <a class="nav-link" href="index.php?"></a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="index.php?"></a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="profile.php?profile">Profile</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="logout.php?logout">Logout</a>

                </li>



            </ul>

        </nav>

    </header>
    <?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
    $pass = $_POST['password'];
    $email = $_POST['email'];

    //let's hash it
    //$pass = password_hash($pass, PASSWORD_BCRYPT);
    //echo "<br>$pass<br>";
    //it's hashed

    require("config.php");
    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
    try {

        $db = new PDO($connection_string, $dbuser, $dbpass);
        $stmt = $db->prepare("SELECT id, email, password from `NewUsers` where email = :email LIMIT 1");


        $params = array(":email" => $email);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
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
                $stmt = $db->prepare("SELECT r.id, r.role_name from `Roles` r JOIN `UserRoles` ur on r.id = ur.role_id where ur.user_id = :id");
                $stmt->execute(array(":id" => $id));
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
            echo "Invalid email";
        }
    }
    catch(Exception $e){
       echo $e->getMessage();
       exit();
       }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>My Project - Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            background-color: ;
            background-image: url("helpers/images/");
        }
        h1 {
            color: white;
        }
        h6 {
            color: white;
        }
        aside form {
            float: right;
        }
    </style>
</head>
<body id="lb">
<header>
    <h1>Welcome to MultiProduct Search Website!</h1>
</header>
<body onload="findFormsOnLoad();">
<marquee height=""><h6>Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>
<marquee><h6  fontcolor="blue" fontsize= "60">From Electronic Protection Supplies...To...Survival Gear!!!!!</h6></marquee>
<aside>
    <form name="loginform" id="myform" method="POST"  onsubmit="return verifyPasswords(this)">

        <center><table border="2" width="325" height="100">
                <tr>
                    <td align= "center" colspan="3" bgcolor="white">Login Users</td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for= "email">email:</td><td><input type="text"id="email" name="email" placeholder="Enter email"/></td>
                </tr>
                <span id="pass_error"></span>
                <tr>
                    <td bgcolor="white"><label for="pass">Password:</td><td><input type="text" id="pass" name="password" placeholder="Enter password"/></td>
                </tr>
                <tr>
                    <td align="center"><input align="right" type="submit" value="Login"/><input align="right" type="reset" onclick="verifyPasswords()"/></td>
                </tr>
            </table></center>

    </form>

</aside>

</body>
</html>


