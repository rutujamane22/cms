<?php include "includes/db.php" ?>
<?php
    if(isset($_POST['checkboxArray'])){

      foreach ($_POST['checkboxArray'] as $checkBoxId) {

        $bulk_options= $_POST['bulk_options'];
          switch ($bulk_options) {

            case 'published':
              $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxId} ";
              $update_to_published_query = mysqli_query($connection, $query);
              if(!$update_to_published_query){
                die("Query Failed " . mysqli_error($connection));
              }
              break;

              case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxId} ";
                $update_to_draft_query = mysqli_query($connection, $query);
                if(!$update_to_draft_query){
                  die("Query Failed " . mysqli_error($connection));
                }
                break;

                case 'delete':
                  $query = "DELETE FROM posts WHERE post_id = {$checkBoxId} ";
                  $update_to_delete_query = mysqli_query($connection, $query);
                  if(!$update_to_delete_query){
                    die("Query Failed " . mysqli_error($connection));
                  }
                  break;

            default:
              // code...
              break;
          }
      }
    }


   ?>


    <form class="" action="" method="post">

          <table class="table table-bordered table-hover">

            <div id="bulkOptions" class="col-xs-4 bulkOptions">
              <select class="form-control" name="bulk_options">
                  <option value="">Select Options</option>
                  <option value="published">Published</option>
                  <option value="draft">Draft</option>
                  <option value="delete">Delete</option>
              </select>
            </div>

            <div class="col-xs-4">
              <input type="submit" class="btn btn-success" name="submit" value="Apply">
              <a class="btn btn-primary" href="admin_posts.php?source=add_post">Add New Post</a>
            </div>
                        <thead>
                          <tr>
                            <th><input type="checkbox" class="selectAllBoxes"></th>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>View Post</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                            $query = "SELECT * FROM posts";
                            $select_posts = mysqli_query($connection , $query);
                            while($row = mysqli_fetch_assoc($select_posts)){
                              $post_id = $row['post_id'];
                              $post_author = $row['post_author'];
                              $post_title = $row['post_title'];
                              $post_category_id = $row['post_category_id'];
                              $post_status = $row['post_status'];
                              $post_image = $row['post_image'];
                              $post_tags = $row['post_tags'];
                              $post_comment_count = $row['post_comment_count'];
                              $post_date = $row['post_date'];
                              $post_content = $row['post_content'];


                              echo "<tr>";
                              ?>

                              <td><input type="checkbox" class="checkBoxes" name="checkboxArray[]" value="<?php echo $post_id ?>"></td>

                              <?php
                                echo "<td>{$post_id}</td>
                                <td>{$post_author}</td>
                                <td>{$post_title}</td>" ;

                                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                                $category_post_id = mysqli_query($connection , $query);

                                if(!$category_post_id){
                                  die("Query Failed" . mysqli_error($connection));
                                }

                                while($row = mysqli_fetch_assoc($category_post_id)){
                                  $cat_title = $row['cat_title'];
                                  $cat_id = $row['cat_id'];
                                }

                                echo "<td>{$cat_title}</td> ";



                                echo "<td>{$post_status}</td>
                                <td><img width= '100' src ='../images/$post_image'></td>
                                <td>{$post_tags}</td>
                                <td>{$post_comment_count}</td>
                                <td>{$post_date}</td>
                                <td><a href='../post.php?p_id={$post_id}'>View Post</a></td>
                                <td><a href='admin_posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>
                                <td><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='admin_posts.php?delete={$post_id}'>Delete</a></td>
                              </tr>" ;

                            }

                            ?>
                          <!--<td>Bootstrap</td>
                          //   <td>Bootstrap</td>
                          //   <td>Bootstrap</td>
                          //   <td>Bootstrap</td>
                          //   <td>Bootstrap</td>
                          // </tr> -->
                        </tbody>
                      </table>
                    </form>



<?php
  if(isset($_GET['delete'])){
    $get_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id= $get_post_id ";
    $delete_post = mysqli_query($connection , $query);
    header("Location: admin_posts.php");

    if(!$delete_post){
      die("Query Failed : " . mysqli_error($connection));
    }
  }


 ?>
