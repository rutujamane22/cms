<form action="" method="POST">
    <div class="form-group">
      <label for="cat_title">Update Category</label>

      <?php
        if(isset($_GET['edit'])){
          $cat_id= $_GET['edit'];

          $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
          $selected_category_edit = mysqli_query($connection , $query);

          while($row = mysqli_fetch_assoc($selected_category_edit)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

          ?>

          <input  value="<?php if(isset($cat_title)) {echo $cat_title ;} ?>"type="text" class="form-control" name="cat_title">

      <?php  }}  ?>

      <?php
      if(isset($_POST['update_category'])){
        $update_cat_title = $_POST['cat_title'];

        $query = "UPDATE categories SET cat_title= '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
        $update_query = mysqli_query($connection , $query);
        if(!$update_query){
          die("query failed" . mysqli_error($connection));
        }
      }

     ?>
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_category" value="update category">
    </div>
  </form>
