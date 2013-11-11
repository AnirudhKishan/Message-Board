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

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<script src="js.js"></script>

		<style>
		body,html
		{
  		height:94%;
		}

		#container
		{
			height: 94%;
		}

		#messages
		{
			height: 90%;
			overflow-y: auto;
		}
		</style>

	</head>

	<body onLoad="initialise()">

		<div class="panel panel-default">
			<div class="panel-body">
				<em>Multi-Room Multi-User Chat</em>
				<a class="pull-right" href="Log Out/logOut.php">Log Out</a>
			</div>
		</div>

		<div class="container" id="container">
			<div id="messages"></div>
			<hr>

			<div class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-10"><input id="postMessage" class="form-control" onKeyUp="postMessage(event)"></div>
					<button class="btn btn-primary" onClick="postMessage()">Submit</button>
					<img id="status" style="height: 35px; widht: 35px; display: none" src="Images/sending.gif">
				</div>
			</div>
		</div>

		<script src="js/jQuery.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
