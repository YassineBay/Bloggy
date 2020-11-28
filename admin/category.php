<!-- Header -->
<?php
require_once "includes/header.php";
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
                            Categories
                        </h1>
                    </div>
                </div>
                <!-- Error Handling -->
                 <div class="row">
                    <div class="col-lg-6">
                    <div class="alert alert-danger" role="alert">
                    </div>
                        <div id="addSuccess" class="alert alert-success" role="alert">
                        </div>
                        <div id="UpdateSuccess" class="alert alert-success" role="alert">
                        </div>
                        <form id="addCatForm"  method="post">
                            <div class="form-group">
                                <label id="lbl_cat_name" for="cat_name">
                                    
                                </label>
                                <input type="text" name="cat_name" class="form-control mb-3" id="cat_name"/>
                                <input type="submit" id="AddUpdate"  value="Add"  class="btn btn-primary"/>
                            </div>
                        </form>
                    </div>
                      <div class="col-lg-6">
                                    <!-- Table -->
                        <div class="alert alert-info" role="alert">
                          A simple danger alert—check it out!
                        </div>
                          <table class="table table-bordered">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">id</th>
                                  <th scope="col">title</th>
                                </tr>
                              </thead>
                              <tbody id ="tab_body">
                                  
                            <!-- Content Will Be Displayed here  -->
                                 
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
    <script src="js/categoryActions.js"></script>

</body>

</html>
