<?php include "includes/db.php" ?>

<!-- <header>-->
<?php include "includes/header.php" ?>
<!-- <header>-->




    <!-- Navigation -->
    <?php  include "includes/navigation.php" ?>
    <!-- Navigation -->




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php

                if(isset($_GET['p_id'])){
                  $the_post_id = $_GET['p_id'];
                  $the_post_author= $_GET['author'];
                }


                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";
                $selected_posts_query = mysqli_query($connection , $query);

                while($row = mysqli_fetch_assoc($selected_posts_query)){

                  $post_title= $row['post_title'];
                  $post_author= $row['post_author'];
                  $post_date= $row['post_date'];
                  $post_image= $row['post_image'];
                  $post_content= $row['post_content'];

                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>

              <?php  } ?>


              <!-- Blog Comments -->
                <!-- <?php
                  if(isset($_POST['create_comment'])){
                    $the_post_id = $_GET['p_id'];

                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];


                  $query= "INSERT INTO comments (comment_post_id, comment_author ,comment_email, comment_content , comment_status, comment_date)" ;
                  $query .= "VALUES ($the_post_id , '{$comment_author}' , '{$comment_email}', '{$comment_content}' , 'unapproved', NOW())" ;

                  $comments_query = mysqli_query($connection , $query);
                  if(!$comments_query){
                    die("Query Failed " . mysqli_error($connection));
                  }

                     $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                     $query .= "WHERE post_id = $the_post_id ";

                     $comment_count_query = mysqli_query($connection , $query);
                }




                 ?> -->

              <!-- Comments Form -->
              <!-- <div class="well">
                  <h4>Leave a Comment:</h4>
                  <form action="" method="post" >
                    <div class="form-group">
                      <label for="Author">Author</label>
                        <input class="form-control" type="text" name="comment_author">
                    </div>
                    <div class="form-group">
                      <label for="Email">Email</label>
                        <input class="form-control" type="email" name="comment_email">
                    </div>
                      <div class="form-group">
                          <textarea name="comment_content" class="form-control" rows="3" ></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                  </form>
              </div>

              <hr> -->

              <!-- Posted Comments -->

                <!-- <?php
                  $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                  $query .= "AND comment_status = 'approved' ";
                  $query .= "ORDER BY comment_id DESC ";

                  $select_comment_query = mysqli_query($connection , $query);

                  while($row = mysqli_fetch_assoc($select_comment_query)){
                    $comment_date= $row['comment_date'];
                    $comment_author=$row['comment_author'];
                    $comment_content=$row['comment_content'];


                ?> -->


                    <!-- Comment -->
                    <!-- <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $comment_author ; ?>
                                <small><?php echo $comment_date;?></small>
                            </h4>
                            <?php echo $comment_content ; ?>
                        </div>
                    </div>

                    <!-- Comment -->

                <?php  } ?> 


            </div>




            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php" ?>
            <!-- Blog Sidebar Widgets Column -->




        </div>
        <!-- /.row -->

        <hr>



        <!-- Footer -->
      <?php include "includes/footer.php" ?>
        <!-- Footer -->
