    <?php
    require_once "../../../includes/db.php";
    $db = db();
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql)->fetchAll();
    if($result){
    foreach($result as $res):
        echo "<tr>";
        echo "<td>" . $res['id'] . "</td>";
        echo "<td>" . $res['cat_title'] . "</td>";
        echo "<td><a  id='".$res['id']."'  class='btn btn-danger fa fa-trash'></a>";
        echo "<a id='".$res['id']."' class='btn btn-primary edit fa fa-edit'></a></td>";
        echo "</tr>";
    endforeach;
         http_response_code(200);
        }else {
         http_response_code(404);
    }
    ?>