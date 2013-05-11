<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">

		<title>Message Board</title>

	</head>

	<body>
	
		<a href="Log Out/logOut.php">Log Out</a>

		<form action="channel.php">
			Enter Channel : <input name="channelID"> <input type="submit" value="Go!">
		</form>

	</body>

</html>
