<?php

$db_type = "mysql";

$hostname = "localhost";

$username = "messageBoard";

$password = "p2hXAAJ6vay2RRqB";

$db = "messageBoard";

$dbh = new PDO ( "$db_type:host=$hostname;dbname=$db", $username, $password );

?>
