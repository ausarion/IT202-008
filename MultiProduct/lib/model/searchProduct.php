<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("config.php");
$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

		try {
			$db = new PDO($connection_string, $dbuser, $dbpass);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $exception){
		    die("Error: Could not connect. " .$e->getMessage());
		}

		try {
		    if (isset($_REQUEST["productName"])){
		        $sql = "SELECT * FROM  productList Where name like :productName";
		        $pdo->exec($sql);
		            echo "Request Successful";
		    }catch(PDOException $e){
      		    die("Error:Was not able to execute $sql. " . $e->getMessage());
            }



		unset($stmt);

		unset($pdo);

?>
<html>
	<head>

        <title>My Project - SearchProduct</title>
		<style>
		</style>
		<script>
		</script>

    </head>
	<body onload="findFormsOnLoad();">
        <marquee height=""><h6  fontcolor="blue" fontsize= "60">Welcome...!!!!! TO....Multi Product Search.....!!!!!</h6></marquee>

        <marquee><h6  fontcolor="blue" fontsize= "60">Where...!!!!! No....Product Is Hard To Find.....!!!!!</h6></marquee>

        <form name="regform"  id="searchForm" method="POST"  onsubmit="return verifyPasswords(this)">

                <center><table border="2" width="325" height="100">

                <tr>

                <td align= "center" colspan="3" bgcolor="green">MultiProduct Search</td>

                </tr>
                <tr>
                <td><label for="name">Name:</td><td><input type="text" id="name" name="name" placeholder="Enter name"/></td>
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




