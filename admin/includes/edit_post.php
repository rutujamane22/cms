<?php include "includes/db.php" ?>
<?php
  if(isset($_GET['p_id'])){
    $get_post_id= $_GET['p_id'];
  }

      $query = "SELECT * FROM posts WHERE post_id = $get_post_id ";
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

  }


  if(isset($_POST['edit'])){

      $post_author = $_POST['post_author'];
      $post_title = $_POST['post_title'];
      $post_category_id = $_POST['post_category'];
      $post_status = $_POST['post_status'];

      $post_image = $_FILES['post_image']['name'];
      $post_img_tmp =$_FILES['post_image']['tmp_name'];

      $post_content = $_POST['post_content'];
      $post_tags = $_POST['post_tags'];
      // $post_comment_count = $row['post_comment_count'];
      // $post_date = $_POST['post_date'];

      move_uploaded_file($post_img_tmp ,"../images/".$post_image );

      if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $get_post_id " ;
        $select_image_query = mysqli_query($connection , $query);
         while($row = mysqli_fetch_array($select_image_query)){
           $post_image = $row['post_image'];
         }

         if(!$select_image_query){
           die("Query Failed " . mysqli_error($connection));
         }
      }


      $query = "UPDATE posts SET " ;
      $query .=  "post_title = '{$post_title}', " ;
      $query .= "post_category_id= '{$post_category_id}' , ";
      $query .= "post_date = NOW() , " ;
      $query .= "post_author ='{$post_author}', " ;
      $query .= "post_status ='{$post_status}', " ;
      $query .= "post_tags='{$post_tags}', ";
      $query .= "post_content='{$post_content}', ";
      $query .= "post_image='{$post_image}' ";
      $query .= "WHERE post_id = {$get_post_id} ";


      $update_result = mysqli_query($connection , $query);

      if(!$update_result){
        die("Query Failed " . mysqli_error($connection));
      }

      echo "<p class='bg-success'>Post Updated!  <a href='../post.php?p_id=$post_id'>View Updated Post</a> or <a href='admin_posts.php'>Edit More Posts</a></p>";

  }

 ?>



<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
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
      <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>

    <label for="post_status">Post Status</label>
    <select class="" name="post_status">
      <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>

      <?php
        if($post_status == 'published'){
          echo "<option value='draft'>Draft</option>";
        }
        else{
          echo "<option value='published'>Published</option>";
        }

       ?>
    </select>

    <hr>


    <!-- <div class="form-group">
      <label for="post_status">Post Status</label>
      <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div> -->

    <div class="form-group">
      <img width="100" src="../images/<?php echo $post_image; ?>" alt="a image"> <br>
      <label for="post_image">Post Image</label>
      <input type="file" name="post_image">
    </div>

    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea type="text" class="form-control" name="post_content" cols="30" rows="10" id="body"> <?php echo $post_content; ?> </textarea>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="edit" value="Publish Post">
    </div>


</form>
