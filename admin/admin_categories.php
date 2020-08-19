
<!-- header -->
<?php include "includes/admin_header.php" ?>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>
        <!-- Navigation -->

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome!
                            <small>  <?php echo $_SESSION['user_firstname']; ?> </small>
                        </h1>
                        <!-- add category form -->
                        <div class="col-xs-6">
                          <!-- php add category -->
                          <?php Insert_category(); ?>

                          <form action="" method="POST">
                              <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                              </div>
                              <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                              </div>
                            </form>


                            <!-- upate form -->
                            <?php
                              if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];

                                include "includes/update_categories.php";
                              }
                              ?>
                            </div>


                        <!-- category table -->
                        <div class="col-xs-6">

                          <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Category</th>
                            </tr>
                            </thead>
                            <tbody>


                              <?php FindAllCategories(); ?>

                                <!-- DELETE Category Query -->
                              <?php DeleteCategory(); ?>

                              <!-- <tr>
                                <td>1</td>
                                <td>Java</td>
                              </tr> -->
                            </tbody>
                          </table>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php" ?>
