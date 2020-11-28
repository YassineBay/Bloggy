<?php 
require_once "includes/db.php";
include_once "functions/article.php";
include_once "functions/comment.php";

$db = db();
$article = findPostById($_GET["article"]);
$id = $article["id"];
$comments = findPostComment($id);
if (!empty($_POST)):
    $error = addComment($id);
    header("Location: postDetail.php?article=$id");
endif;

?>
<!-- Header -->
    <?php require_once "includes/header.php" ?>


    <!-- Navigation -->
    <?php require_once "includes/nav.php" ?>


    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <h1 class="page-header">
                        <?php $article["nom"]; ?>
                            </h1>
                        <h2>
                                <a href="postDetail.php?article=<?php echo $article["id"] ?>"><?= $article["nom"] ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?=$article["post_author"]?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$article["publish_date"]?></p>
                            <hr>
                            <img class="img-responsive" src="img/<?php echo $article["post_image"] ?>" alt="">
                            <hr>
                            <p><?=$article["contenu"]?></p>
                    
                        <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <textarea name="comment" id="comment" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                    <?php  foreach($comments as $cmt) :
                    ?>
                    <?php if(!$cmt["isApproved"]): ?>
                    <div class="media">
                        <div class="alert alert-info" role="alert">Wait For your comment to be approved by the admin</div></div>
                         <?php else: ?>
                     <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">UserName
                            <small><?= $cmt["publish_date"] ?></small>
                        </h4>
                       <?= $cmt["contenu"] ?>
                    </div>
                </div>
                      <?php endif; endforeach; ?>  
            </div>
                <!-- Comment -->
            
            <!-- Blog Sidebar Widgets Column -->
                    <?php require_once "includes/side_bar.php" ?>
        </div>
        <!-- Footer -->
        <?php require_once "includes/footer.php" ?>

        

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
