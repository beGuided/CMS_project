
<?php include'includes/Admin_header.php'?>
<?php include 'functions.php'?>


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

                    <div class="col-xs-6">
                        <?php insertCategories(); ?>

    <form action="" method="post">
            <div class="form-group">
               <label for="cat_title">Add Category</label><br>
                <input class="form-control" type="text" name="cat_title">
             </div>
              <div class="form-group">
                <input class="btn-primary"  type="submit" name="submit" value="Add Category">
             </div>
          </form>
        </div> <!-- add category form -->


                    
                 <div class="col-xs-6">
                     <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>id </th>
                            <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>
<?php 
// fetech all categories from the database
 findAllCategoriies();
 ?>

<?php deleteCategories();?>
                         </tbody>
                        </table>
                     </div>

<!-- edit category form -->

<div class="col-xs-6">
                <?php
if(isset($_GET['update'])){
$cat_id= $_GET['update'];
 include "includes/update_categories.php";
} 
     ?> 

       
        </div> 
             </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>

        


        <!-- /#page-wrapper -->
<?php include'includes/Admin_footer.php'?>
    