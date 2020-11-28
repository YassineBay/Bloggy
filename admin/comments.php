<!-- Header -->
<?php
require_once "includes/header.php";
include_once "functions/comment.php";
include_once "functions/post.php";
$db = db();
$comments = findAllComments();
if(isset($_GET["cmt"])){
    ApproveComment($_GET["cmt"]);
}
if(isset($_GET["cmtDel"])){
    DeleteComment($_GET["cmtDel"]);
}

?>
    <div id="wrapper">
        <!-- Navigation -->
        <?php require_once "includes/nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments
                        </h1>
                    </div>
                </div>
                <!-- Error Handling -->
                 <div class="row">
                    <div class="col-lg-6">
                    <table class="table table-bordered">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">title</th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Post ID</th>
                                  <th scope="col">Admin Approval</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($comments as $cmt): ?>
                                <tr>
                                  <td><?=  $cmt ["id"] ?></td>
                                  <td><?=  $cmt ["contenu"] ?></td>
                                  <td><?php echo "User" ?></td>
                                  <td><?php echo findPostById($cmt["id_article"])["id"] ?></td>
                                    <?php if ($cmt ["isApproved"]): ?>
                                  <td>Approved</td>
                                    <?php else: ?>
                                    <td> Not Approved</td>
                                    <td><a class="btn btn-primary fa fa-thumbs-o-up" href="comments.php?cmt=<?php echo $cmt ["id"] ?>">
                                            </a></td>
                                    <?php endif; ?>
                                    <td><a href="comments.php?cmtDel=<?php echo $cmt ["id"] ?>" class=" btn btn-danger fa fa-trash"></a></td>
                                </tr>
                                  <?php  endforeach;?>
                              </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
