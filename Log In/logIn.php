<?php

require_once ( '../common/PHP/common_database.php' );
require_once ( '../common/PHP/common_home.php' );

?>

<?php

$err_no = 0;

$query = "SELECT * FROM `user_auth` WHERE `username`=:username";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":username", $_POST['username'] );
$stmt->execute ( );

if ( $stmt->rowCount ( ) == 0 )
{
	$err_no = 1;
}
else
{
	$rslt = $stmt->fetch ( );
	
	$randomString = "'a;sldfkjghg";	
	if ( hash ( "sha256", ( $_POST['password'] . $randomString ) ) == $rslt['password'] )
	{
		session_destroy ( );
		session_start ( );
		
		$_SESSION['logged-in'] = true;
		$_SESSION['id'] = $rslt['ID'];
		
		$err_no = 0;
	}
	else
	{
		$err_no = 2;
	}
}

?>

<?php

if ( $err_no == 0 )
{
	header ( "Location: $HOME" );
}
else if ( $err_no == 1 )
{
	echo "Username does not Exist!";
	echo "<br><br>";
	echo "<a href=\"login_front.php\">Go Back</a>";
}
else if ( $err_no == 2 )
{
	echo "Wrong Password!";
	echo "<br><br>";
	echo "<a href=\"login_front.php\">Go Back</a>";
}
else
{
	echo "Technical Error";
}

?>
