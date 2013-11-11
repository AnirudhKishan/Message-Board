<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );

require_once ( 'common/PHP/common_database.php' );

?>

<?php

$toInsert = json_decode($_POST['data']);

$query = "INSERT INTO `messages` ( `channel`, `userID`, `message` ) VALUES ( :channel, :userID, :message );";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":message", $toInsert[0] );
$stmt->bindParam ( ":channel", $toInsert[1] );
$stmt->bindParam ( ":userID", $_SESSION['id'] );
$stmt->execute ( );

?>
