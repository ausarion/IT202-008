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
				if(form.password.value.length == 8 || form.confirm.value.length == 8){
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
                        $password = $_POST['password']
                        $params = array(":email"=> $email, 
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
 
