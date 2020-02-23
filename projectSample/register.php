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

		echo "All good, 'registering user'";

		

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
      echo "Connection is succesful";
   } 
      
      
			$Email = $_POST['email'];


			$stmt = $db->execute("INSERT INTO `Users3`

							(email, password) VALUES"

							(:email, :password)");

			$params = array(":email"=> $email, 

						":password"=> $pass);

			$stmt->execute($params);
      echo "Sucessful Login";

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
		body{
			background-color:;
			background-image: url('https://unsplash.com/photos/QMDap1TAu0g');
			color:black;
		}
		</style>
		<script>
			function doValidations(form){
				let isValid = true;
				if(!verifyEmail(form)){
					isValid = false;
				}
				if(!verifyPasswords(form)){
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
					ee.innerText = "";
					return true;
				}

			}

			function verifyPasswords(form){
				let pe = document.getElementById("password_error");
				if(form.password.value.length == 0 || form.confirm.value.length == 0){
					//alert("You must enter both a password and confirmation password");
					pe.innerText = "You must enter both a password and a confirm password";
					return false;

				}

				if(form.password.value != form.confirm.value){
					//alert("Uhh you made a typo");
					pe.innerText = "Passwords don't match, please try again.";
					return false;

				}

				pe.innerText = "";
				return true;
			}
		</script>
	</head>
	<body  onload="findFormsOnLoad();">
        
		<!-- This is how you comment -->
         <br>
		<form name="regform" id='myform' method='POST">
					                   onsubmit="return doValidations(this)">
                <center><table border="2" width="325" height="100">
                <tr>
                <td align= "center" colspan="3" bgcolor="gray">New User's Register</td>
                </tr>
                <tr>
                <td><label for= "email">Email:</label></td><td><input type="email"id="email" name="email"placeholder="Enter Email"/></td>
                </tr>
                <tr>
                <td><label for="pass">Password:</label></td><td><input type="password" id="pass" name="password" placeholder="Enter password"/></td>
                </tr>
                <tr>
                <td><label for="conf">Confirm Password:</label></td><td></label><input type="password" id="conf" name="confirm"/></td>
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
 
