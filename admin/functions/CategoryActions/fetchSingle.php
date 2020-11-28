<?php   
    require_once "../../../includes/db.php";
    $db = db(); 
    $sql = "SELECT cat_title FROM categories WHERE id=".$_POST["id"];
    $result = $db->query($sql)->fetch();
    echo $result[0]; 
?>