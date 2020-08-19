<?php
  if(isset($_POST['create_user'])){

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

    $query = "INSERT INTO users(username , user_password, user_firstname, user_lastname, user_email, role ) ";
    $query .= "VALUES('{$username}' , '{$user_password}', '{$user_firstname}', '{$user_lastname}' ,'{$user_email}', '{$user_role}') ";

    $create_users_query = mysqli_query($connection , $query);

    if(!$create_users_query){
      die("query failed " . mysqli_error($connection));
    }

    echo "User Created " . "<a href='users.php'>View Users</a>" ;
  }

 ?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="username">FirstName</label>
      <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
      <label for="username">LastName</label>
      <input type="text" class="form-control" name="user_lastname">
    </div>


    <label for="user_role">User Role </label>
    <select class="" name="user_role">
      <option value="subscriber">Select Role</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
    <hr>


    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username">
    </div>


    <div class="form-group">
      <label for="user_email">Email</label>
      <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
      <label for="user_password">Password</label>
      <input type="text" class="form-control" name="user_password">
    </div>

    <!-- <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea type="text" class="form-control" name="post_content" cols="30" rows="10"></textarea>
    </div> -->

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>


</form>
