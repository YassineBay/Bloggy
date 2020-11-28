<?php 
    require_once "../../../includes/db.php";
    $db = db();    
//    extract($_POST);
    $validation = true;
    $error = [];
    if (!isset($_POST["cat_name"])) {
        $validation = false;
        $error[] = "Field Must be Filled !";
    }
    if ($validation){
        try{
            $sql = "INSERT INTO categories (cat_title) VALUES (?)";
            $result = $db->prepare($sql);
            $result->execute([$_POST["cat_name"]]);
            echo "Category Added";
            }catch(Exception $ex)
            {
            echo "Error";
            die($ex->getMessage());
            }
    }

?>