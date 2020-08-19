
<!-- header -->
<?php include "includes/admin_header.php" ?>

<?php
    if(isset($_SESSION['username'])){
      $username = $_SESSION['username'];

      $query = "SELECT * FROM users WHERE username = '{$username}' ";
      $profile_query = mysqli_query($connection , $query);

      while($row = mysqli_fetch_array($profile_query)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_password= $row['user_password'];
        $user_image = $row['user_image'];
        $user_email = $row['user_email'];
        $user_role = $row['role'];
      }
    }

 ?>

 <?php
 if(isset($_POST['edit_user'])){

   $username = $_POST['username'];
   $user_password = $_POST['user_password'];
   $user_firstname = $_POST['user_firstname'];
   $user_lastname = $_POST['user_lastname'];
   $user_email = $_POST['user_email'];

   // $post_image = $_FILES['post_image']['name'];
   // $post_img_tmp =$_FILES['post_image']['tmp_name'];

   $user_role = $_POST['user_role'];
   // $user_date = date('d-m-y');

   // move_uploaded_file($post_img_tmp , "../images/".$post_image );

   $query = "UPDATE users SET ";
   $query .= "username ='{$username}', ";
   $query .= "user_firstname ='{$user_firstname}', ";
   $query .= "user_lastname ='{$user_lastname}', ";
   $query .= "user_email ='{$user_email}', ";
   $query .= "user_password ='{$user_password}', ";
   $query .= "role ='{$user_role}' ";
   $query .= "WHERE username = '{$username}' " ;

   $update_profile_query = mysqli_query($connection , $query);

   if(!$update_profile_query){
     die("query failed " . mysqli_error($connection));
   }
 }




  ?>


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

                      <form action="" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="username">FirstName</label>
                            <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                          </div>

                          <div class="form-group">
                            <label for="username">LastName</label>
                            <input type="text" value="<?php echo $user_lastname;?>"  class="form-control" name="user_lastname">
                          </div>


                          <label for="user_role">User Role </label>
                          <select class="" name="user_role">
                          <option value="subscriber"><?php echo $user_role ?></option>
                          <?php
                              if($user_role == 'Admin'){
                                echo "<option value='subscriber'>Subscriber</option>";
                              }
                              else{
                                echo "<option value='admin'>Admin</option>" ;
                              }


                           ?>





                          </select>
                          <hr>


                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                          </div>


                          <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                          </div>

                          <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" value="<?php echo $user_password;?>" class="form-control" name="user_password">
                          </div>

                          <!-- <div class="form-group">
                            <label for="post_tags">Post Tags</label>
                            <input type="text"  class="form-control" name="post_tags">
                          </div>

                          <div class="form-group">
                            <label for="post_content">Post Content</label>
                            <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"></textarea>
                          </div> -->

                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                          </div>


                      </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  <?php include "includes/admin_footer.php" ?>
