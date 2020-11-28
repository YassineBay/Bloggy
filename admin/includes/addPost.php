<!-- Header -->
<?php
require_once "includes/header.php";
include_once "functions/post.php";
include_once "functions/category.php";
$db = db();
$posts = findAllPosts();
$categories = findAllCategories();
if(!empty($_POST)){
    uploadFile($_FILES["post_image"]);
    $error = addPost($_FILES["post_image"]["name"]);
}
?>
        <!-- Navigation -->
        <?php require_once "includes/nav.php" ?>
            <div class="container-fluid">
                <?php if (isset($error)): 
                    foreach($error as $err):
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <p><?= $err ?></p>
                            </div>  
                <?php 
                    endforeach;
                        endif;
                        ?>
                 <div class="row">
                      <div class="col">
                        <form  method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="post_title">Post Title</label>
                                <input type="text" name="post_title" class="form-control mb-3" id="post_title"/>
                              </div>
                                  <div class="form-group">
                                <label for="post_Category">Post Category</label>
                                <select class="form-control" id="post_Category" name="post_Category">
                                    <?php foreach($categories as $cat): ?>
                                    <option value="<?=$cat["id"]?>"><?=$cat["cat_title"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                                 <div class="form-group">
                                <label for="post_image">Post Image</label>
                                <input type="File" class="form-control-file" id="post_image" name="post_image">  
                            </div>
                                <div class="form-group">
                              <label for="post_Content">Post Content</label>
                                <textarea type="text" name="post_Content" class="form-control mb-3" id="post_Content"></textarea>
                            </div>
                                <div class="form-group">
                              <label for="post_Tags">Post Tags</label>
                                <input type="text" name="post_Tags" class="form-control mb-3" id="post_Tags"/>
                            </div>
                              <button class="btn btn-primary" type="Submit" name="Submit" value="Add">Add</button>
                          </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
