
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>In Response to</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Unapprove</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $query = "SELECT * FROM comments";
                          $select_comments = mysqli_query($connection , $query);
                          while($row = mysqli_fetch_assoc($select_comments)){
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_email = $row['comment_email'];
                            $comment_content= $row['comment_content'];
                            $comment_status = $row['comment_status'];
                            $comment_date = $row['comment_date'];


                              echo "<tr>
                              <td>$comment_id</td>
                              <td>$comment_author</td>
                              <td>$comment_content</td>
                              <td>$comment_email</td>" ;

                               //  $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                               // $category_post_id = mysqli_query($connection , $query);
                               //
                               // if(!$category_post_id){
                               //   die("Query Failed" . mysqli_error($connection));
                               // }
                               //
                               // while($row = mysqli_fetch_assoc($category_post_id)){
                               //   $cat_title = $row['cat_title'];
                               //   $cat_id = $row['cat_id'];
                               // }

                               // echo "<td>{$cat_title}</td> ";



                              echo "<td>{$comment_date}</td> ";


                              $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                              $comment_post_id_query = mysqli_query($connection ,$query);
                              while($row = mysqli_fetch_assoc($comment_post_id_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];

                                echo "<td><a href = '../post.php?p_id={$post_id}'>{$post_title}</a></td>";

                              }







                              echo "<td>{$comment_status}</td>
                              <td><a href='comments.php?approve={$comment_id}'>Approve</a></td>
                              <td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>

                              <td><a href='comments.php?delete={$comment_id}'>Delete</a></td>
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



<?php

if(isset($_GET['approve'])){
  $get_comment_id = $_GET['approve'];

  $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $get_comment_id ";
  $approve_comment = mysqli_query($connection , $query);
  header("Location: comments.php");
}

if(isset($_GET['unapprove'])){
  $get_comment_id = $_GET['unapprove'];

  $query = "UPDATE comments  SET comment_status = 'unapproved' WHERE comment_id = $get_comment_id ";
  $unapprove_comment = mysqli_query($connection , $query);
  header("Location: comments.php");
}


  if(isset($_GET['delete'])){
    $get_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id= $get_comment_id ";
    $delete_comment = mysqli_query($connection , $query);
    header("Location: comments.php");

    if(!$delete_comment){
      die("Query Failed : " . mysqli_error($connection));
    }
  }


 ?>
