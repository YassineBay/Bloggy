<!-- Header -->
<?php
require_once "includes/header.php";
include_once "functions/post.php";
include_once "functions/category.php";
$db = db();
$posts = findAllPosts();
if(isset($_GET["option"]) && $_GET["option"] == "del_post" ):
    deletePost($_GET["id"]);
    header("Location: ./posts.php");
endif;
if(isset($_GET["option"]) && $_GET["option"]== "share_post"):
    sharePost($_GET["id"]);
    header("Location: ./posts.php");
endif;

if(isset($_GET["option"]) && $_GET["option"]== "Unshare_post"):
    UnsharePost($_GET["id"]);
    header("Location: ./posts.php");
endif;
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
                            Posts
                        </h1>
                    </div>
                </div>
                <!-- Error Handling -->
                 <div class="row">
                      <div class="col-lg-12">
                                    <!-- Table -->
                          <?php if(isset($_GET["option"])):
                                $option = $_GET["option"];
                                else:
                                $option = "";
                                endif;
        
                                switch($option){
                                    case "add_Post" : include_once("includes/addPost.php"); break;
                                    case "edit_post" : include_once("includes/updatePost.php"); break;
                                    default : include_once("includes/postsList.php");
                                    break;
                                }
                             ?>
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
