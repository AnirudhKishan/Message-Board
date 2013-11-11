<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );
require_once ( 'common/PHP/common_database.php' );

?>

<?php

	$query = "SELECT DISTINCT(`channel`) FROM `messages`";
	$stmt = $dbh->prepare ( $query );
	$stmt->execute ( );
	$rslts = $stmt->fetchAll();

	$channelIDs = [];
	foreach($rslts as $rslt)
	{
		array_push($channelIDs, $rslt['channel']);
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">

		<title>Message Board</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/typeahead.js-bootstrap.css" rel="stylesheet">

	</head>

	<body>

		<div class="panel panel-default">
			<div class="panel-body">
				<em>Multi-Room Multi-User Chat</em>
				<a class="pull-right" href="Log Out/logOut.php">Log Out</a>
			</div>
		</div>

		<br><br><br>

		<div class="container">
			<form class="col-sm-8 form-horizontal" role="form" action="channel.php">
				<div class="form-group">
					<label for="channelID" class="col-sm-3 control-label">Enter Channel : </label>
					<div class="col-sm-4"><input name="channelID" class="form-control typeahead" autocomplete="off"></div>
					<div class="col-sm-4"><input class="btn btn-primary" type="submit" value="Go!"></div>
				</div>
			</form>
		</div>

		<script src="js/jQuery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/typeahead.js"></script>

		<script>
		$(document).ready(function() {
		  $('.typeahead').typeahead({
		    name: 'channelIDs',
		    local: <?php echo json_encode($channelIDs); ?>
		  });
		});
		</script>

	</body>

</html>
