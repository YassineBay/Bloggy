<?php
require_once '../../../includes/db.php';
$db = db();
extract( $_POST );
$validation = true;
$error = [];
if ( empty( $cat_name ) ) {
    $validation = false;
    $error[] = 'Field Must be Filled !';
}

if ( $validation ) {
    try {
        $sql = 'UPDATE categories SET cat_title = ? WHERE id ='.$id;
        $result = $db->prepare( $sql );
        $result->execute( [$cat_name] );
    } catch( Exception $ex ) {
        die( $ex->getMessage() );
    }
}
?>