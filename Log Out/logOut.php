<?php

require_once( '../common/PHP/common_session.php' );

require_once ( '../common/PHP/common_session validate.php' );

?>

<?php

session_destroy();

?>

<!DOCTYPE html>

<html>

<head>
	<title>Logout</title>
</head>

<body>
	
	Logout Successful
	
	<br><br>
	
	<a href="../Log In/login_front.php">Go to Login</a>
	
</body>

</html>
