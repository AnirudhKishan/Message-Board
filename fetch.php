<?php

require_once ( 'common/PHP/common_database.php' );

?>

<?php

$query = "SELECT `ID`, `message` FROM `messages` WHERE `ID`>:id;";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":id", $_GET['lastID'] );
$stmt->execute ( );
$rslt = $stmt->fetchAll ( PDO::FETCH_ASSOC );

$toSend = array ( );

foreach ( $rslt as $key=>$val )
{
	$toSend[$key] = $val;
}

echo json_encode( $toSend );

?>
