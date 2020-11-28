<!-- Header -->
<?php
require_once "includes/header.php";
include_once "functions/post.php";
include_once "functions/category.php";
$db = db();
$categories = findAllCategories();
if(isset($_GET["id"])):
$article=findPostById($_GET["id"]);
endif;
if(!empty($_POST)):
unlink("../img/".$article["post_image"]);
$error = updatePost($_GET["id"],$_FILES["post_image"]["name"]);
uploadFile($_FILES["post_image"]);
endif;
?>
        <!-- Navigation -->
        <?php require_once "includes/nav.php" ?>
            <div class="container-fluid">
                 <div class="row">
                      <div class="col">
                        <form  method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="post_title">Post Title</label>
                                <input type="text" name="post_title" class="form-control mb-3" id="post_title" value="<?php if (isset($_POST["post_title"])): echo $_POST["post_title"]; else: echo $article[1]; endif;   ?>"/>
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
                                <td><img width="100" height="100" class="img-responsive" src="../img/<?php echo $article["post_image"]; ?>"/></td>
                                <input type="File" class="form-control-file" id="post_image" name="post_image" value="<?php if (isset($_POST["post_image"])): echo $_POST["post_image"]; else: echo $article["post_image"]; endif;   ?>">  
                            </div>
                                <div class="form-group">
                              <label for="post_Content">Post Content</label>
                                <textarea type="text" name="post_Content" class="form-control mb-3" id="post_Content"><?php if (isset($_POST["post_Content"])): echo $_POST["post_Content"]; else: echo $article["contenu"]; endif;   ?></textarea>
                            </div>
                                <div class="form-group">
                              <label for="post_Tags">Post Tags</label>
                                <input type="text" name="post_Tags" class="form-control mb-3" id="post_Tags" value="<?php if (isset($_POST["post_Tags"])): echo $_POST["post_Tags"]; else: echo $article[7]; endif;   ?>"/>
                            </div>
                              <button class="btn btn-primary" type="Submit" name="Submit" value="Add">Update</button>
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
