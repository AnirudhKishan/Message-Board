<?php

if ( getenv ( 'OPENSHIFT_MYSQL_DB_HOST' ) )
{
	$HOME = "http://pepupchat-fm0nk.rhcloud.com";
}
else
{
	$HOME = "http://localhost/chat";
}

?>
