<?php

function findAllPosts() {
    global $db;
    $sql = 'SELECT * FROM articles';
    $result = $db->query( $sql )->fetchAll();
    return $result;
}

function addPost( $imageName ) {
    global $db;
    extract( $_POST );
    $validation = true;
    $error = [];
    if ( empty( $post_title ) || empty( $post_Category ) || empty( $post_Content ) || empty( $post_Tags ) ) {
        $validation = false;
        $error[] = 'All the Fields Must be Filled !';
    }

    if ( $validation ) {
        try {
            $sql = 'INSERT INTO articles (nom, contenu, publish_date,post_cat_id ,post_author ,post_image,post_tags) VALUES (?,?,?,?,?,?,?)';
            $result = $db->prepare( $sql );
            $result->execute( [
                $post_title,
                $post_Content,
                date( 'Y-m-d' ),
                $post_Category,
                'Admin',
                $imageName,
                $post_Tags
            ] );
        } catch( Exception $ex ) {
            die( $ex->getMessage() );
        }
    }
    return $error;
}

function uploadFile( $file ) {
    $target_dir = '../img';
    $target_file = $target_dir . basename( $file['name'] );
    $uploadOk = 1;
    $imageFileType = strtolower( pathinfo( $target_file, PATHINFO_EXTENSION ) );
    $check = getimagesize( $file['tmp_name'] );
    if ( $check !== false ) {
        move_uploaded_file ( $file['tmp_name'], '../img/'.$file['name'] );
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

function findPostById( $id ) {
    global $db;
    $sql = "SELECT * FROM articles WHERE id=$id";
    $result = $db->query( $sql )->fetch();
    return $result;
}

function updatePost( $id, $imageName ) {
    global $db;
    extract( $_POST );
    $validation = true;
    $error = [];
    if ( empty( $post_title ) || empty( $post_Category ) || empty( $post_Content ) || empty( $post_Tags ) ) {
        $validation = false;
        $error[] = 'Field Must be Filled !';
    }

    if ( $validation ) {
        try {
            $sql = "UPDATE articles SET nom =?, contenu=?, publish_date=?, post_cat_id=? ,post_image=?, post_tags=? WHERE id=$id";
            $result = $db->prepare( $sql );
            $result->execute( [
                $post_title,
                $post_Content,
                date( 'Y-m-d' ),
                $post_Category,
                $imageName,
                $post_Tags
            ] );
            //header( 'Location: /posts.php' );

        } catch( Exception $ex ) {
            die( $ex->getMessage() );
        }
    }
    return $error;
}

function deletePost( $id ) {
    global $db;
    $sql = "DELETE FROM articles WHERE id=$id";
    $result = $db->query( $sql );
    $result->execute();
}

function sharePost( $id ) {
    global $db;

    try {
        $sql = "UPDATE articles SET post_status = ? WHERE id=$id";
        echo $sql;
        $result = $db->prepare( $sql );
        $result->execute( ["Published"] );
    } catch( PDOException $e ) {
        echo $e->getMessage();
    }
}

function UnsharePost( $id ) {
    global $db;

    try {
        $sql = "UPDATE articles SET post_status = ? WHERE id=$id";
        echo $sql;
        $result = $db->prepare( $sql );
        $result->execute( ["Unpublished"] );
    } catch( PDOException $e ) {
        echo $e->getMessage();
    }
}
?>