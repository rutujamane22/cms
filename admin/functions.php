<?php

function Insert_category(){
  global $connection;
  if(isset($_POST['submit'])){
    //echo "HELLO";
    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)){
      echo "This feild cannot be empty";
    }
    else{
      $query = "INSERT INTO categories(cat_title) ";
      $query .= "VALUES('{$cat_title}') ";

      $create_category_query = mysqli_query($connection,$query);
      if(!$create_category_query ){
        die("Query Failed" . mysqli_error($connection));
      }
    }
  }
}


function FindAllCategories(){
  global $connection;

  $query = "SELECT * FROM categories";
  $selected_category = mysqli_query($connection , $query);

  while($row = mysqli_fetch_assoc($selected_category)){
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

    echo "<tr>
          <td>{$cat_id}</td>
          <td>{$cat_title}</td>
          <td><a href='admin_categories.php?delete={$cat_id}'>Delete</a></td>
          <td><a href='admin_categories.php?edit={$cat_id}'>Edit</a></td>
         </tr>";
  }
}


function DeleteCategory(){
  global $connection;

  if(isset($_GET['delete'])){
    $get_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
    $delete_query = mysqli_query($connection , $query);
    header("Location: admin_categories.php");
  }
}
















 ?>
