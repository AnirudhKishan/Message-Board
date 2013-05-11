<?php

require_once( 'common/PHP/common_session.php' );
require_once ( 'common/PHP/common_session validate.php' );

require_once ( 'common/PHP/common_database.php' );

?>

<?php

$query = "SELECT `ID`, `userID`, `message` FROM `messages` WHERE `ID`>:id AND `channel`=:channel";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":id", $_GET['lastID'] );
$stmt->bindParam ( ":channel", $_SESSION['channelID'] );
$stmt->execute ( );
$rslt = $stmt->fetchAll ( PDO::FETCH_ASSOC );

$query2 = "SELECT `username` FROM `user_auth` WHERE `ID`=:userID";
$stmt2 = $dbh->prepare ( $query2 );
$stmt2->bindParam ( ":userID", $userID );

$toSend = array ( );

foreach ( $rslt as $key=>$val )
{
	$userID = $val['userID'];

	$stmt2->execute ( );
	$rslt2 = $stmt2->fetch ( );

	$val['username'] = $rslt2['username'];

	unset ( $val['userID'] );

	$toSend[$key] = $val;
}

echo json_encode( $toSend );

?>
