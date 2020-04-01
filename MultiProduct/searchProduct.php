<?php 

ini_set('display_errors',1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);



if(	   isset($_POST['email']) 

	&& isset($_POST['password'])

	&& isset($_POST['confirm'])

	){

	$pass = $_POST['password'];

	$conf = $_POST['confirm'];

	if($pass != $conf){

		//echo "All good, 'registering user'";

		

		$msg = "Passwords don't match, what's going on there?";

	}

	else{

		$msg = "All good, user registered, whoohoo";

		//let's hash it

		$pass = password_hash($pass, PASSWORD_BCRYPT);

		echo "<br>$pass<br>";

		//it's hashed

		require("config.php");

		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

		try {

			$db = new PDO($connection_string, $dbuser, $dbpass);
       
			$stmt =$db->prepare ("INSERT INTO `TestUsers` (email, password) VALUES (:email, :password)");    
                            
                        $email=$_POST['email'];
                        $password=$_POST['password'];
			$params = array(":email"=> $email, ":password"=> $pass);

          		$stmt->execute($params);

			echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";

		}

		catch(Exception $e){

			echo $e->getMessage();

			exit();
                }

         }	

}

?>

<html>

	<head>

		<title>My Project - Register</title>

		<style>

		</style>

		<script>

			function doValidations(form){

				let isValid = true;

				if(!verifyEmail(form)){

					isValid = false;

				}

				if(!verifyPassword(form)){

					isValid = false;

				}

				return isValid;

			}

			function verifyEmail(form){

				let ee = document.getElementById("email_error");

				if(form.email.value.trim().length  == 0){

					ee.innerText = "Please enter an email address";

					return false;

				}

				else{

					ee.innerText = "Email Valid";

					return true;

				}

			}

			function verifyPassword(form){

				let pe = document.getElementById("password_error");

				if(form.pin.value.length == 0 || form.confirm.value.length == 0){

					//alert("You must enter both a password and confirmation password");

					pe.innerText = "You must enter both a password and a confirm password";

					return false;

				}

				if(form.password.value != form.confirm.value){

					//alert("Uhh you made a typo");

					pe.innerText = "Passwords don't match, please try again.";

					return false;

				}

	                      	pe.innerText =turn false;

				return true;

			}

		</script>

	</head>

	<body onload="findFormsOnLoad();">
        <marquee height=""><h6  fontcolor="blue" fontsize= "60">Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>
        <marquee><h6  fontcolor="blue" fontsize= "60">Where...!!!!! No....Product Is Hard To Find.....!!!!!</h6></marquee>
        <form name="regform" " id="myForm" method="POST"  onsubmit="return verifyPasswords(this)">
                <center><table border="2" width="325" height="100">
                <tr>
                <td align= "center" colspan="3" bgcolor="gray">New User's Register</td>
                </tr>
                <tr>
                <td><label for= "email">Email:</td><td><input type="email"id="email" name="email"placeholder="Enter Email"/></td>
                </tr>
                <span id="email_error"></span>
                <tr>
                <td><label for="pass">Password:</td><td><input type="password" id="pass" name="password" placeholder="Enter password"/></td>
                </tr>
                <tr>
                <td><label for="conf">Confirm Password:</td><td></label><input type="password" id="conf" name="confirm"/></td>
                </tr>
                <tr>
                <td align="center"><input align="right" type="submit" value="Register"/></td>
                </tr>
                </table></center>
        </form>


		<?php if(isset($msg)):?>

			<span><?php echo $msg;?></span>

		<?php endif;?>

	</body>

</html>
 

