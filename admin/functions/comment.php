<?php
function findAllComments(){
    global $db;
    $sql = "SELECT * FROM `commentaire`";
    $result = $db->query($sql)->fetchAll();
    return $result;
}

function ApproveComment($id){
    global $db;
    try{
        $sql = "UPDATE commentaire SET isApproved =? WHERE id = $id";
        $result = $db->prepare($sql);
        $result->execute([true]);
        header("Location: comments.php");
    }catch(PDOException $ex){
        echo "error";
        die($ex->getMessage());
    }
}

function DeleteComment($id){
    global $db;
    $sql = "DELETE FROM commentaire WHERE id = $id";
    $result = $db->query($sql);
    $result->execute();
    header("Location: comments.php");
}

?>