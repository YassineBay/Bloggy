<?php 
function findAllCategories(){
    global $db;
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql)->fetchAll();
    return $result;
}
?>