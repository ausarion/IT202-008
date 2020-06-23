


<?php
ini_set('display_errors',1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);


require ('header1.php');
?>
<!DOCTYPE html>
<html>
<body>


<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Signup</h1>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfields") {
                    echo '<p class="signuperror">Fill in all fields!</p>';
                }
                elseif ($_GET["error"] == "invaliduseridemail") {
                    echo '<P class="signuperror">Invalid username and email!</P>';
                }
                elseif ($_GET['error'] =="invaliduserid" ) {
                    echo '<p class= "signuperror">Invalid e-mail!</p>';
                }
                elseif ($_GET['error'] =="conf" ) {
                    echo '<p class= "signuperror">Your password do not match!</p>';
                }
                elseif ($_GET['error'] =="usertaken" ) {
                    echo '<p class= "signuperror">Username is already taken</p>';
                }

            }
            elseif (isset($_GET["signup-submit"])) {
                    if($_GET["signup-submit"]) {
                        echo '<p claass="signupsuccess">Signup success!</p>';
                }
            }
            ?>
            <form class="form-signup" action="includes/signup.inc.php" name="regform" id="myForm" method="POST" onsubmit="return doValidations(this)">
                <?php
                if (!empty($_GET["userId"])) {
                    echo '<input type="text" name="userId" placeholder="Create username" value="'.$_GET["userId"].'">';
                }
                else {
                    echo '<input type="text" name="userId" placeholder="Creat username">';
                }
                if (!empty($_GET["email"])) {
                    echo '<input type="text" name="email" placeholder=""Enter email" value="'.$_GET["email"].'">';
                }
                else {
                    echo '<input type="text" name="email" placeholder="Enter email">';
                }
                ?>
                <input type="password" id="pass" name="password" placeholder="Enter password">
                <input type="password" id="conf" name="confirm" placeholder="confirm password">
                <button type="submit" name="signup-submit" value="Register" onclick="verifyPasswords()">Signup</button>
            </form>
        </section>
    </div>
</main>
<?php
require ('footer.php');
?>


<?php if(isset($msg)):?>

    <span><?php echo $msg;?></span>

<?php endif;?>

</body>

</html>
