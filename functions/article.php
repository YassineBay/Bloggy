<?php 
function findAllArticles(){
    global $db;
    $sql = "SELECT * FROM articles";
    $result = $db->query($sql)->fetchAll();
    return $result;
}

function findPostById($id) {
    global $db;
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = $db->query( $sql )->fetch();
    return $result;
}

?>