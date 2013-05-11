<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );

require_once ( 'common/PHP/common_database.php' );

?>

<?php

$query = "INSERT INTO `messages` ( `channel`, `userID`, `message` ) VALUES ( :channel, :userID, :message );";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":message", $_POST['message'] );
$stmt->bindParam ( ":channel", $_SESSION['channelID'] );
$stmt->bindParam ( ":userID", $_SESSION['id'] );
$stmt->execute ( );

?>
