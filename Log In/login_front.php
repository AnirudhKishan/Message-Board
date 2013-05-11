<?php

require_once( '../common/PHP/common_session.php' );
require_once ( '../common/PHP/common_home.php' );

if ( isset ( $_SESSION['logged-in'] ) && $_SESSION['logged-in'] == true )
{
	header ( "Location: $HOME" );
}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	
	<title>Login</title>
</head>

<body>
	
	<form action="logIn.php" method="POST">
	
		<label for="username">Username : </label>
		<input name="username" id="username">
		<br>
		
		<label for="passsword">Password : </label>
		<input type="password" name="password" id="password">
		<br>
		
		<input type="submit">
		
	</form>
	
	<br><br>
	
	<a href="../Sign Up/signUp_front.html">Sign Up Here</a>
	
</body>

</html>
