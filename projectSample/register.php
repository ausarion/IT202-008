<<<<<<< HEAD
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (   isset($_POST['FirstName'])
    && isset($_POST['LastName'])
    && isset($_POST['Username'])
    && isset($_POST['email'])
    && isset($_POST['password'])
    && isset($_POST['confirm'])
){
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Username = $_POST['Username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf = $_POST['confirm'];
    if($pass != $conf){
        //echo "All good, 'registering user'";
        $msg = "Passwords don't match, what's going on there?";
    }
    else {
        $msg = "All good, user registered";
        //let's hash it
        $pass = password_hash($pass, PASSWORD_BCRYPT);
        //echo "<br>$pass<br>";
        //it's hashed
        require('config.php');
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

        try {

            $db = new PDO($connection_string, "root");
            $stmt = $db->prepare("INSERT INTO `NewUsers` (FirstName, LastName,  Username, email, password) VALUES (:FirstName, :LastName, :Username, :email, :password)");
            $params = array(":FirstName"=> $FirstName, ":LastName"=> $LastName, ":Username"=> $Username, ":email"=> $email, ":password"=> $pass);
            $stmt->execute($params);
            echo var_export($stmt->errorInfo(),true);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
?>
<html>
<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MultiProduct - Login</title>
</header>
<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"

          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>MultiProduct - Login</title>
</header>
<body onload="function findFormsOnLoad();">
<div class="container-fluid">
    <header>
        <nav class="navbar navbar-expand-lg navbar-blue bg-blue">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php?login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""?register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php?logout">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
    <head>
        <title>My Project - Register</title>
        <style>
            body {
                background-image: url("helpers/images/XzrHw4.jpg");
                background-repeat no-repeat:;
                background-size: cover;
                color:;
            }
            h6 {
                color: yellow;
                font-size: 35px;
            }
            aside form{
                padding-right: 1px;
                float: left;
            }
        </style>
    </head>
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
            if(form.email.value.trim().length  === 0){
                ee.innerText = "Please enter an email address";
                return false;
            }
            else{
                ee.innerText = " ";
                return true;
            }
        }
        function verifyPassword(form){
            let pe = document.getElementById("password_error");
            if(form.pin.value.length === 0 || form.confirm.value.length === 0){
                //alert("You must enter both a password and confirmation password");
                pe.innerText = "You must enter both a password and a confirm password";
                return false;
            }
            if(form.password.value !== form.confirm.value){
                //alert("Uhh you made a typo");
                pe.innerText = "Passwords don't match, please try again.";
                return false;
            }
            pe.innerText = "";
            return true;
        }
    </script>
</header>

<body onload="findFormsOnLoad();">
<marquee height=""><h6>Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>
<marquee><h6  fontcolor="blue" fontsize= "60">Where...!!!!! No....Product Is Hard To Find.....!!!!!</h6></marquee>
<aside>
    <form name="regform"  action="" id="myForm" method="POST"  onsubmit="return verifyPasswords(this)">
        <center><table border="2"  width="325" height="90">
                <tr>
                    <td align= "center" colspan="3" bgcolor="white" >New User's Register</td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for= "Fn">FirstName:</td><td width="23"><input type="text"id="Fn" name="FirstName" placeholder="Enter FirstName"/></td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for= "Ln">LastName:</td><td><input type="text"id="Ln" name="LastName" placeholder="Enter LastName"/></td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for= "Urn">Username:</td><td><input type="text"id="Urn" name="Username" placeholder="Create Username"/></td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for= "email">Email:</td><td><input type="email"id="email" name="email"placeholder="Enter Email"/></td>
                </tr>
                <span id="email_error"></span>
                <tr>
                    <td bgcolor="white"><label for="pass">Password:</td><td><input type="password" id="conf" name="password" placeholder="Enter password"/></td>
                </tr>
                <tr>
                    <td bgcolor="white"><label for="conf">Confirm Password:</td><td></label><input type="password" id="conf" name="confirm"/></td>
                </tr>
                <tr>
                    <td align="center"><input align="right" type="submit" value="Register"/><input align="right" type="reset" onclick="verifyPasswords()"/></td>
                </tr>
            </table></center>
    </form>
</aside>
<div>
</div>
<?php if(isset($msg)):?>
    <span><?php echo $msg;?></span>
<?php endif;?>
</body>
</html>


=======
<html>
	<head>
		<title>My Project - Register</title>
    <script>
    <style>
    body{
        background-image: url('');
        backgroud-color: 
    </style>
    <funtion verifyEmail(form) {
    let ee = document.getEmailById("email_error");
    if(form.enail.value.trim().lenght >
			function verifyPasswords(form){
				if(form.password.value.length == 0 || form.confirm.value.length == 0){
					//alert("You must enter both a password and confirmation password");
					pe.innerText = "you must enter both a password  and a confirm password";
          return false;
				}
				if(form.password.value != form.confirm.value){
					//alert("Typo Error, try again");
          pe.innerText = turn false;
				}
				return true;
			}
		</script>
</head>
<body onload="findFormsOnLoad();">
<marquee height=""><h6  fontcolor="blue" fontsize= "60">Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>
<marquee><h6  fontcolor="blue" fontsize= "60">Where...!!!!! No....Product Is Hard To Find.....!!!!!</h6></marquee>
        <form name="regform" action="login.php" id="myForm" method="POST"
					                             onsubmit="return verifyPasswords(this)">
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
       <?php isset($msg)):?>
           <span><?php echo $msg; ?></span>
       <?php endif;?> 
       
 </body>
</html>

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
	      if($pass == $conf){
		            echo "All good, 'registering user'";
      	}
	      else{
	      echo "What's wrong with you? Learn to type";
	      exit();
      	}
      	//let's hash it
	      $pass = password_hash($pass, PASSWORD_BCRYPT);
	
        echo "<br>$pass<br>";
	      //it's hashed
	      require("config.php");
	
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

	      try {
	        	$db = new PDO($connection_string, $dbuser, $dbpass);
	                $stmt = $db->prepare "INSERT INTO `TestUsers`(email, password) VALUES (:email, :password)";
		       
		        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $params = array(:email"=> $email, 
                                        ":password"=> $pass);
                        $stmt->prepare($params);
        

                       echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
        }
        
	      catch(Exception $e){
		            echo $e->getMessage();
    		        exit();

	      } 
}
             
?>
 
>>>>>>> origin/master
