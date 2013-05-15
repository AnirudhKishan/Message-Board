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

		<style>
		body,html
		{
  		height:98%;
		}

		#container
		{
			height: 98%;
		}

		#messages
		{
			height: 90%;
			overflow-y: scroll;
		}
		</style>

	</head>

	<body onLoad="initialise()">
	
		<div id="logout">
			<a href="Log Out/logOut.php">Log Out</a>
		</div>

		<div id="container">
			<hr>
			<div id="messages"></div>
			<hr>

			<input id="postMessage" onKeyUp="postMessage(event)"><button onClick="postMessage()">Submit</button><div id="status" style="display: inline-block; color: lightgray; text-decoration: line-through;">Sending</div>
		</div>

	</body>

</html>
