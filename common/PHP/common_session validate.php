<?php

require_once ( 'common_session.php' );
require_once ( 'common_home.php' );

if ( $_SESSION['logged-in'] != true )
{
	session_destroy ( );
	header ( "Location: $HOME/Log In/login_front.php" );
}

?>
