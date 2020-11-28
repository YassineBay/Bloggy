<?php
require_once '../../../includes/db.php';
$db = db();

$sql = 'DELETE FROM categories WHERE id ='.$_POST['id'];
$result = $db->query( $sql );
$result->execute();
echo 'Deleted';

?>