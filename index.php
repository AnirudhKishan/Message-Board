<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">

		<title>Message Board</title>

		<script src="js.js"></script>

	</head>

	<body onLoad="initialise()">

		<hr>
		<div id="messages"></div>
		<hr>

		<input id="postMessage" onKeyUp="postMessage(event)"><button onClick="postMessage()">Submit</button>

	</body>

</html>