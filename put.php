<?php

require_once ( 'common/PHP/common_database.php' );

?>

<?php

$query = "INSERT INTO `messages` ( `message` ) VALUES ( :message );";
$stmt = $dbh->prepare ( $query );
$stmt->bindParam ( ":message", $_POST['message'] );
$stmt->execute ( );

?>
