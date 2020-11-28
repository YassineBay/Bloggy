<?php
function addComment($post_id){
    global $db;
    extract($_POST);
    $validation = true;
    $error = "";
    if(empty($comment)){
        $validation = false;
        $error = "Field Must be not empty";
    }
    if($validation){
        $sql = "INSERT 
                INTO commentaire (id_member , id_article , contenu , publish_date) 
                VALUE (?,?,?,?)";
        $result = $db->prepare($sql);
        $result->execute([1,$post_id,$comment,date("Y-m-d")]);
    }
    return $error;
}
function findPostComment($post_id){
    global $db;
    $sql = "SELECT * FROM `commentaire` WHERE `id_article`=$post_id ORDER BY isApproved";
    $result = $db->query($sql)->fetchAll();
    return $result;
}
?>