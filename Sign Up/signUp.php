<?php

require_once ( '../common/PHP/common_database.php' );

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php

$err_no = 0;

$query = "SELECT COUNT(*) FROM `user_auth` WHERE `username`=:username;";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":username", $_POST['username'] );
$stmt->execute ( );
$rslt = $stmt->fetch ( );

if ( $rslt[0] > 0 )
{
	$err_no = 1;
}
else
{
	$query = "INSERT INTO `user_auth` ( `username`, `password` ) VALUES ( :username, :password );";
	$stmt = $dbh->prepare ( $query );
	$stmt->bindParam ( ":username", $_POST['username'] );
	$randomString = "'a;sldfkjghg";
	$stmt->bindParam ( ":password", hash ( "sha256", ( $_POST['password'] . $randomString ) ) );
	$stmt->execute ( );
		
	$err_no = 0;
}

?>

<?php

if ( $err_no == 0 )
{
	echo "Successful Signup!";
	echo "<br><br>";
	echo "<a href=\"../Log In/login_front.php\">Go to Login</a>";
}
else if ( $err_no == 1 )
{
	echo "Username already exists!";
	echo "<br><br>";
	echo "<a href=\"signUp_front.html\">Go Back</a>";
}
else
{
	echo "Technical Error";
}

?>
