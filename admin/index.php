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
                    </div>
                </div>
                <!-- /.row -->



                         <!-- /.row -->

         <div class="row">
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-file-text fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">

                               <?php
                                  $query = "SELECT * FROM posts";
                                  $post_query = mysqli_query($connection, $query);
                                  $post_count = mysqli_num_rows($post_query);

                                  echo "<div class='huge'>{$post_count}</div>"
                                ?>
                           <!-- <div class='huge'>12</div> -->
                                 <div>Posts</div>
                             </div>
                         </div>
                     </div>
                     <a href="./admin_posts.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-green">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-comments fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                  $query = "SELECT * FROM comments";
                                  $comment_query = mysqli_query($connection, $query);
                                  $comment_count = mysqli_num_rows($comment_query);

                                  echo "<div class='huge'>{$comment_count}</div>"
                                ?>
                               <div>Comments</div>
                             </div>
                         </div>
                     </div>
                     <a href="comments.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-yellow">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-user fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                  $query = "SELECT * FROM users";
                                  $user_query = mysqli_query($connection, $query);
                                  $user_count = mysqli_num_rows($user_query);

                                  echo "<div class='huge'>{$user_count}</div>"
                                ?>
                                 <div> Users</div>
                             </div>
                         </div>
                     </div>
                     <a href="./users.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-red">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-list fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                  $query = "SELECT * FROM categories";
                                  $category_query = mysqli_query($connection, $query);
                                  $category_count = mysqli_num_rows($category_query);

                                  echo "<div class='huge'>{$category_count}</div>"
                                ?>
                                  <div>Categories</div>
                             </div>
                         </div>
                     </div>
                     <a href="./admin_categories.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
         </div>
                         <!-- /.row -->


            <?php

              $query = "SELECT * FROM posts WHERE post_status = 'published' ";
              $post_published_query = mysqli_query($connection, $query);
              $draft_published_count = mysqli_num_rows($post_published_query);

              $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
              $post_draft_query = mysqli_query($connection, $query);
              $draft_post_count = mysqli_num_rows($post_draft_query);

              $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
              $unapproved_comment_query = mysqli_query($connection, $query);
              $unapproved_count = mysqli_num_rows($unapproved_comment_query);

              $query = "SELECT * FROM users WHERE role = 'subscriber' ";
              $subsciber_count_query = mysqli_query($connection, $query);
              $subsciber_count = mysqli_num_rows($subsciber_count_query);



             ?>

            <!-- chart -->
            <div class="row">
              <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php

            $element_text = ['All Posts','Active Posts' , 'Draft Post' , 'Comments', 'Unapproved Comments' , 'Users', 'Subscribers', 'Category'];
            $element_count = [$post_count ,$draft_published_count, $draft_post_count,  $comment_count, $unapproved_count, $user_count, $subsciber_count, $category_count];

            for($i = 0; $i < 7; $i++){
              echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}]," ;
            }

           ?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
            </div>
            <!-- chart end -->


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php" ?>
