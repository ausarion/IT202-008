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

                    <a class="nav-link" href="profile?">Profile</a>

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

require("config.php");
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

		try {
			$db = new PDO($connection_string, 'root');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $exception){
		    die("Error: Could not connect. " .$exception->getMessage());
		}

		try {
            if (isset($_REQUEST["productName"])) {
                $sql = "SELECT * FROM  productList Where product_id like :productName";
                $db->exec($sql);
            }
         }catch (PDOException $exception) {
            echo "Request Successful";
        }
		unset($stmt);
		unset($pdo);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<header>

        <title>My Project - SearchProduct</title>
		<style>
            body{
                background-image: ;
            }
		</style>
		<script>
		</script>

    </header>
	<body onload="findFormsOnLoad();">
        <marquee height=""><h6  fontcolor="blue" fontsize= "60">Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>

        <marquee><h6  fontcolor="blue" fontsize= "60">Where...!!!!! No....Product Is Hard To Find.....!!!!!</h6></marquee>

        <form name="reform"  id="searchForm" method="POST"  onsubmit="return verifyPasswords(this)">

                <center><table border="2" width="325" height="100">

                <tr>

                <td align= "center" colspan="3" bgcolor="green">MultiProduct Search</td>

                </tr>
                <tr>
                <td><label for="name">Username:</td><td><input type="text" id="Un" name="Username" placeholder="Enter Username"/></td>
                </tr>
                <tr>

                <td><label for= "product">productName:</td><td><input type="product"id="product" name="product"placeholder="Enter productName"/></td>

                </tr>

                <span id="product_error"></span>
   
                <tr>

                <td><label for= "date">date:</td><td><input type="date" id="date" name="date" placeholder="Enter date"/></td>

                </tr>

                <tr>

                <td align="center"><input align="right" type="submit" value="submit"/><td align="left"><input align="right" type="reset" onclick="verifyPassword()" </td></td>
                </tr>


                </table></center>

        </form>

		<?php if(isset($msg)):?>



			<span><?php echo $msg;?></span>



		<?php endif;?>



	</body>
</html>