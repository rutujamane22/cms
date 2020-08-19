
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Role</th>
                            <!-- <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th> -->
                          </tr>
                        </thead>
                        <tbody>

                          <?php
                          $query = "SELECT * FROM users";
                          $select_comments = mysqli_query($connection , $query);
                          while($row = mysqli_fetch_assoc($select_comments)){
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_password= $row['user_password'];
                            $user_image = $row['user_image'];
                            $user_email = $row['user_email'];
                            $user_role = $row['role'];


                              echo "<tr>
                              <td>$user_id</td>
                              <td>$username</td>
                              <td>$user_firstname</td>
                              <td>$user_lastname</td>
                              <td>$user_email</td>
                              <td>$user_role</td>";

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



                              // echo "<td>{$comment_date}</td> ";
                              //
                              //
                              // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                              // $comment_post_id_query = mysqli_query($connection ,$query);
                              // while($row = mysqli_fetch_assoc($comment_post_id_query)){
                              //   $post_id = $row['post_id'];
                              //   $post_title = $row['post_title'];
                              //
                              //   echo "<td><a href = '../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                              //
                              // }


                              echo "<td><a href='users.php?to_admin={$user_id}'>Admin</a></td>
                              <td><a href='users.php?to_sub={$user_id}'>Subscriber</a></td>
                              <td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>
                              <td><a href='users.php?delete={$user_id}'>Delete</a></td>
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

if(isset($_GET['to_admin'])){
  $get_user_id = $_GET['to_admin'];

  $query = "UPDATE users SET role = 'Admin' WHERE user_id = $get_user_id ";
  $admin_query = mysqli_query($connection , $query);
  header("Location: users.php");
}

if(isset($_GET['to_sub'])){
  $get_user_id = $_GET['to_sub'];

  $query = "UPDATE users SET role = 'Subscriber' WHERE user_id = $get_user_id ";
  $sub_query = mysqli_query($connection , $query);
  header("Location: users.php");
}



  if(isset($_GET['delete'])){
    $get_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id= $get_user_id ";
    $delete_user = mysqli_query($connection , $query);
    header("Location: users.php");

    if(!$delete_user){
      die("Query Failed : " . mysqli_error($connection));
    }
  }


 ?>
