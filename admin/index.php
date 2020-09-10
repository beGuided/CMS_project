
<?php include'includes/Admin_header.php'?>
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
                            
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->



                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<?php 

$query = "SELECT * FROM posts ";
$select_all_post = mysqli_query($connection, $query);
$posts_count = mysqli_num_rows($select_all_post);

echo "<div class='huge'>{$posts_count}</div>";

 ?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

$query = "SELECT * FROM comment ";
$select_all_comment = mysqli_query($connection, $query);
$comments_counts = mysqli_num_rows($select_all_comment);

echo "<div class='huge'>{$comments_counts}</div>";

 ?>

                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                        <?php 

$query = "SELECT * FROM users  ";
$select_all_users = mysqli_query($connection, $query);
$users_counts = mysqli_num_rows($select_all_users );

echo "<div class='huge'>{$users_counts}</div>";

 ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php 

$query = "SELECT * FROM Categories  ";
$select_all_Categories = mysqli_query($connection, $query);
$Categories_counts = mysqli_num_rows($select_all_Categories );

echo "<div class='huge'>{$Categories_counts}</div>";

 ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        


        <!-- /#page-wrapper -->
<?php include'includes/Admin_footer.php'?>
    