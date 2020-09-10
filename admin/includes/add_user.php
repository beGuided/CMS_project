
<?php 

if(isset($_POST['Create_user'])){

	//echo $_POST['Create_post'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_role = $_POST['user_role'];


// $post_image = $_FILES['Image']['name'];
// $post_image_temp = $_FILES['Image']['tmp_name'];

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];
// $Post_date = date('d-m-y');



// move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO users( user_firstname, user_lastname, user_role, username, user_email,user_password)";  

$query.="VALUES('{$user_firstname}', '{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";

$Create_user_query= mysqli_query($connection, $query);

    if(!$Create_user_query){
        
    die('failed query'.mysqli_error($connection
    ));
}

 echo "User Created" . " " . "<a href='users.php'>view users</a>";
};

?>

<form action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
         <label for="post_author">Firstname</label>
          <input class="form-control" type="text" name="user_firstname">
         </div>

        <div class="form-group">
         <label for="post_status">Lastname</label>
          <input class="form-control" type="text" name="user_lastname">
         </div>
        <div class="form-group">
         <select name="user_role" id="user_role">
          <option value="Subscriber">Select Option</option>
          <option value="Admin">Admin</option>
          <option value="Subscriber">Subscriber</option>
          
         </select>
       </div>


         <!--  <div class="form-group">
         <label for="Image">Post Images</label>
          <input type="file" name="Image">
         </div> -->

           <div class="form-group">
         <label for="post_tags">Username</label>
          <input class="form-control" type="text" name="username">
         </div>

           <div class="form-group">
         <label for="post_tags">Email</label>
          <input class="form-control" type="text" name="user_email">
         </div>
          <div class="form-group">
         <label for="post_tags">Password</label>
          <input class="form-control" type="Password" name="user_password">
         </div>


      


  <div class="form-group">
         
          <input class="btn-primary" type="submit" name="Create_user" value="Add User">
         </div>
</form>