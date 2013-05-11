<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );

?>

<?php

$channelID = $_GET['channelID'];

$_SESSION['channelID'] =  $channelID;

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">

		<title>Message Board : Channel <?php echo $channelID; ?></title>

		<script src="js.js"></script>

	</head>

	<body onLoad="initialise()">
	
		<a href="Log Out/logOut.php">Log Out</a>

		<hr>
		<div id="messages"></div>
		<hr>

		<input id="postMessage" onKeyUp="postMessage(event)"><button onClick="postMessage()">Submit</button>

	</body>

</html>
