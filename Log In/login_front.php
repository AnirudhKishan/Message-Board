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
	
	<title>Log In</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<link href="../css/login.css" rel="stylesheet">
</head>

<body >

	<br><br>
	
	<div class="container">
		<div class="row">
			<div id="logIn-form" class="col-sm-offset-1 col-sm-3">
			
				<form action="logIn.php" method="post">
					<h1>Log In</h1>
					<hr>
					<input type="text" name="username" id="username" placeholder="Username" class="form-control"><br>
					<input type="password" name="password" id="password" placeholder="Password" class="form-control" ><br>
					<br>						
					<button type="submit" class="btn btn-large btn-primary">Go!</button>
					
					<br><br><br>
					
					Not Registered?
					<a href="../Sign Up/signUp_front.html" class="btn btn-large">Sign Up</a>
				</form>
				
			</div>
		</div>
	</div>

	<script src="../js/jQuery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	
</body>

</html>
