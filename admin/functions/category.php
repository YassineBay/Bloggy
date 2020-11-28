<?php 
function findAllCategories(){
    global $db;
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql)->fetchAll();
    return $result;
}
function deleteCategory($id){
    global $db;
    $sql = "DELETE FROM categories WHERE id = $id";
    $result = $db->query($sql);
    $result->execute();
}
function addCategory(){
    global $db;
    extract($_POST);
    $validation = true;
    $error = [];
    if (empty($cat_name)) {
        $validation = false;
        $error[] = "Field Must be Filled !";
    }
    
    if ($validation){
        try{
            $sql = "INSERT INTO categories (cat_title) VALUES (?)";
            $result = $db->prepare($sql);
            $result->execute([$cat_name]);
            header("Location: category.php");
            }catch(Exception $ex)
            {
            die($ex->getMessage());
            }
    }
    return $error[0];
}
function UpdateCategory($id){
    global $db;
    extract($_POST);
    $validation = true;
    $error = [];
    if (empty($cat_name)) {
        $validation = false;
        $error[] = "Field Must be Filled !";
    }
    
    if ($validation){
        try{
            $sql = "UPDATE categories SET cat_title = ? WHERE id = ?";
            $result = $db->prepare($sql);
            $result->execute([$cat_name,$id]);
            header("Location: category.php");
            }catch(Exception $ex)
            {
            die($ex->getMessage());
            }
    }
    return $error[0];
}
function findCategoryById($id){
    global $db;
    $sql = "SELECT cat_title FROM categories WHERE id=$id";
    $result = $db->query($sql)->fetch();
    return $result[0];  
}
?>