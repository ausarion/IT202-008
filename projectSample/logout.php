<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
    <title>Logout Page</title>

</head>
</html>





<?php
session_start();
session_unset();
session_destroy();

echo "You have been logged out";
=======
<?php

session_start();

session_unset();

session_destroy();

echo "You have been logged out";

>>>>>>> origin/master
echo var_export($_SESSION, true);

//get session cookie and delete/clear it for this session

<<<<<<< HEAD
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params(); 

	//clones then destroys since it makes it's lifetime
	//negative (in the past)

    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
=======
if (ini_get("session.use_cookies")) { 

    $params = session_get_cookie_params(); 

	//clones then destroys since it makes it's lifetime 

	//negative (in the past)

    setcookie(session_name(), '', time() - 42000, 

        $params["path"], $params["domain"], 

        $params["secure"], $params["httponly"] 

    ); 

} 

>>>>>>> origin/master
?>
