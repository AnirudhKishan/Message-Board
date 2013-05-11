<?php

$db_type = "mysql";

if ( getenv ( OPENSHIFT_MYSQL_DB_HOST ) )
{
	$hostname = getenv ( OPENSHIFT_MYSQL_DB_HOST ) . ":" . getenv ( OPENSHIFT_MYSQL_DB_PORT );
}
else
{
	$hostname = "localhost";
}

$username = "messageBoard";

$password = "p2hXAAJ6vay2RRqB";

$db = "messageBoard";

$dbh = new PDO ( "$db_type:host=$hostname;dbname=$db", $username, $password );

?>
