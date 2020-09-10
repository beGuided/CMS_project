
<?php

if(isset($_GET['p_id'])){

$the_post_id =$_GET['p_id'];
}


 $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
 $select_posts_by_id = mysqli_query($connection, $query);

 while ($row = mysqli_fetch_assoc($select_posts_by_id)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tag = $row['post_tags'];
$post_content = $row['post_content'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
}

if (isset($_POST['Update_Post'])) {

$post_author = $_POST['post_author'];
$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category_id'];
$post_status = $_POST['post_status'];
$post_image = $_FILES['Image']['name'];
$post_image_temp = $_FILES['Image']['tmp_name'];
$post_tag = $_POST['post_tags'];
$Post_Content = $_POST['Post_Content'];

move_uploaded_file($post_image_temp, "../images/$post_image");

if(empty($post_image)){

  $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
  $select_image = mysqli_query($connection, $query);
  while ($row = mysqli_fetch_assoc($select_image)) {
    $post_image =$row['post_image'];
  }
}

$query = "UPDATE posts SET ";
$query .="post_title= '{$post_title}', ";
$query .="post_category_id= {$post_category_id}, ";
$query .="post_date= now(), ";
$query .="post_status= '{$post_status}', ";
$query .="Post_Content= '{$Post_Content}', ";
$query .="post_image= '{$post_image}', ";
$query .="post_title= '{$post_title}' ";
$query .="WHERE post_id= {$the_post_id}";

$Update_Post = mysqli_query($connection, $query);

  if(!$Update_Post){
        
    die('failed query'. mysqli_error($connection
    ));
};


echo "<p class="bg-success">Post updated. <a href='../posts.php?p_id={$the_post_id}'>view Post</a></p>";
}

?>


<form action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="post_title">Post Title</label>
          <input class="form-control" type="text" name="post_title" value="<?php echo $post_title?> " >
         </div>
         <select name="post_category" id="post_category">
<?php 

$query = "SELECT * FROM categories";
 $select_categories_id = mysqli_query($connection, $query);

 if(!$select_categories_id){
        
    die('failed query'.mysql_error($connection));
  };

 while ($row = mysqli_fetch_assoc($select_categories_id)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<option value='{$cat_id}'>{$cat_title}</option>";
}
?>  
         </select>

         <div class="form-group">
         <label for="post_category_id">Post Category id</label>
          <input class="form-control" type="text" name="post_category_id" value="<?php echo $post_category_id?> " >
         </div>

         <div class="form-group">
         <label for="post_author">Post Author</label>

          <input value="<?php echo $post_author?> " class="form-control" type="text" name="post_author">
         </div>

          <div class="form-group">
         <label for="post_status">Post Status</label>
          <input class="form-control" type="text" name="post_status" value="<?php echo $post_status?> " >
         </div>

          <div class="form-group">
         <img width=100 src="../images/<?php $post_image?>" alt="images">
         <input type="file" name="Image">
         </div>

           <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input class="form-control" type="text" name="post_tags" value="<?php echo $post_tag?> " >
         </div>


           <div class="form-group">
         <label for="Post_Content">Post Content</label>
          <textarea class="form-control"  name="Post_Content" cols="30" row="10">
            <?php echo $post_content?>
          </textarea>
         </div>

  <div class="form-group">
          <input class="btn-primary" type="submit" name="Update_Post" value="Update_Post">
         </div>
</form>
