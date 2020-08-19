<?php
  if(isset($_POST['create_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_img_tmp =$_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    move_uploaded_file($post_img_tmp , "../images/".$post_image );

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_status, post_image, post_tags, post_content, post_date) ";
    $query .= "VALUES({$post_category_id} , '{$post_title}', '{$post_author}', '{$post_status}' ,'{$post_image}', '{$post_tags}','{$post_content}', NOW() ) ";

    $create_post_query = mysqli_query($connection , $query);

    if(!$create_post_query){
      die("query failed " . mysqli_error($connection));
    }

    $last_post_id= mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Created!  <a href='../post.php?p_id=$last_post_id'>View Created Post</a> or <a href='admin_posts.php'>Edit More Posts</a></p>";

  }

 ?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input type="text" class="form-control" name="post_title">
    </div>


    <label for="post_category">Category </label>
    <select class="" name="post_category">

      <?php
      $query = "SELECT * FROM categories";
      $category_post = mysqli_query($connection , $query);

      if(!$category_post){
        die("Query Failed" . mysqli_error($connection));
      }

      while($row = mysqli_fetch_assoc($category_post)){
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<option value='$cat_id'> {$cat_title}</option>";
      }
        ?>
    </select>
    <hr>


    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" name="post_author">
    </div>


    <div class="form-group">

        <select class="" name="post_status">
          <option value="draft">Post Status</option>
          <option value="published">Published</option>
          <option value="draft">Draft</option>

        </select>
    </div>

    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="post_image">
    </div>

    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>
