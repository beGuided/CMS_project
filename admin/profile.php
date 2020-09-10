 
<?php include'includes/Admin_header.php'?>
<?php include 'functions.php'?>

<?php 
if (isset($_SESSION['username'])) {

   $username= $_SESSION['username'];

   $query ="SELECT * FROM users WHERE username ='{$username}' ";

   $select_user_profile_query = mysqli_query($connection, $query);

 while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
$user_id = $row['user_id'];
$Username = $row['username'];
$user_password = $row['user_password'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_email = $row['user_email'];
$user_image = $row['user_image'];
$user_role = $row['user_role'];
};
};

if(isset($_POST['edit_user'])){

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


// pdate users query from the dadabase

$query = "UPDATE users SET ";
$query .="user_firstname= '{$user_firstname}', ";
$query .="user_lastname= '{$user_lastname}', ";
$query .="user_role= '{$user_role}', ";
$query .="username= '{$username}', ";
$query .="user_email= '{$user_email}', ";
$query .="user_password= '{$user_password}' ";
$query .="WHERE username= '{$username}'";

$Update_user = mysqli_query($connection, $query);

  if(!$Update_user){
        
    die('failed query'.mysqli_error($connection
    ));
};

}


 ?>



    <div id="wrapper">



        <!-- Navigation -->
       <?php include'includes/Admin_navigation.php'?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row"> 
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           wellcome to admin
                            <small>author</small>
                        </h1>

 <form action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
 <label for="post_author">Firstname</label>
       <input class="form-control" type="text" name="user_firstname" value="<?php echo $user_firstname;?>">
         </div>

        <div class="form-group">
         <label for="post_status">Lastname</label>
          <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_lastname;?>">
         </div>
        <div class="form-group">
         <select name="user_role" id="user_role">

          <option value="Subscriber"><?php echo $user_role; ?></option>
          <?php 

          if ($user_role == 'Admin') {
           echo  "<option value='Subscriber'>Subscriber</option>";

          }else{
            echo "<option value='Admin'>Admin</option>";

          }

          ?>
   
         </select>
       </div>


         <!--  <div class="form-group">
         <label for="Image">Post Images</label>
          <input type="file" name="Image">
         </div> -->

           <div class="form-group">
         <label for="post_tags">Username</label>
          <input class="form-control" type="text" name="username" value="<?php echo $username;?>">
         </div>

           <div class="form-group">
         <label for="post_tags">Email</label>
          <input class="form-control" type="text" name="user_email" value="<?php echo $user_email;?>">
         </div>
          <div class="form-group">
         <label for="post_tags">Password</label>
          <input class="form-control" type="Password" name="user_password" value="<?php echo $user_password;?>">
         </div>


      


  <div class="form-group">
         
          <input class="btn-primary" type="submit" name="edit_user" value="update profile">
         </div>
</form>





             </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        


        <!-- /#page-wrapper -->
<?php include'includes/Admin_footer.php'?>
    