<?php 
require_once "includes/db.php";
include_once "functions/article.php";
$db = db();
$articles = findAllArticles();
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
                                Articles
                            </h1>
                        <?php foreach($articles as $article): 
                            if($article["post_status"]=="Published"):
                        ?>
                            
                            <!-- First Blog Post -->
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
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            <hr>
                    <?php 
                        endif;
                        endforeach; ?>
                </div>

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
