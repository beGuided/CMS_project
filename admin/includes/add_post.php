
<?php 

if(isset($_POST['Create_post'])){

	//echo $_POST['Create_post'];
$post_author = $_POST['post_author'];
$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category'];
$post_status = $_POST['post_status'];


$post_image = $_FILES['Image']['name'];
$post_image_temp = $_FILES['Image']['tmp_name'];

$post_tag = $_POST['post_tags'];
$Post_Content = $_POST['Post_Content'];
$Post_date = date('d-m-y');
//$post_comment_count = 4;


move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts( post_category_id, post_title, post_author, post_date, post_image, post_content,post_tags, post_status)";  

$query.="VALUES({$post_category_id},'{$post_title}', '{$post_author}',now(),'{$post_image}','{$Post_Content}','{$post_tag}','{$post_status}')";

$Create_post_query= mysqli_query($connection, $query);

    if(!$Create_post_query){
        
    die('failed query'.mysqli_error($connection
    ));
}

};

?>

<form action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="post_title">Post Title</label>
          <input class="form-control" type="text" name="post_title">
         </div>
<div class="form-group">
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
</div>
         <div class="form-group">
         <label for="post_author">Post Author</label>
          <input class="form-control" type="text" name="post_author">
         </div>

          <div class="form-group">
         <label for="post_status">Post Status</label>
          <input class="form-control" type="text" name="post_status">
         </div>

          <div class="form-group">
         <label for="Image">Post Images</label>
          <input type="file" name="Image">
         </div>

           <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input class="form-control" type="text" name="post_tags">
         </div>


           <div class="form-group">
         <label for="Post_Content">Post Content</label>
          <textarea class="form-control"  name="Post_Content" cols="30" row="10"></textarea>
         </div>

  <div class="form-group">
         
          <input class="btn-primary" type="submit" name="Create_post" value="Publish_post">
         </div>
</form>