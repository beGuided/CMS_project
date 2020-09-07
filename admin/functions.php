

<?php 

// function confirmQuery($result){

// global $connection;
//     if(!$result){
        
//     die('failed query'.mysqli_error($connection
//     ));
// }
// };

/////////////////
function insertCategories(){

	global $connection;
if(isset($_POST['submit'])){

    $cat_title= $_POST['cat_title'];

    if ($cat_title==""|| empty($cat_title)) {
        echo "this field should not be empty";
    }else{
    $query ="INSERT INTO categories(cat_title)";
    $query.="VALUES('{$cat_title} ') ";

    $create_query_category = mysqli_query($connection, $query);
    if (!$create_query_category) {
        # code...

        die('the vialues was not added to th e categories'. mysqli_error($connection));}
    } };

}

function findAllCategoriies(){
global $connection;
	$query = 'SELECT * FROM categories ';
 $select_categories = mysqli_query($connection, $query);

 while ($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<tr>";
echo " <td>{$cat_id}</td>"; 
echo " <td>{$cat_title}</td>"; 
echo " <td><a href='Categories.php?delete={$cat_id}'>Delete</a></td>"; 
echo " <td><a href='Categories.php?update={$cat_id}'>Edit</a></td>"; 

echo "</tr>";
        }

}

function deleteCategories(){
	global $connection;
	if(isset($_GET['delete'])){

    $the_cat_id = $_GET['delete'];
    
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location:Categories.php");
}


}


 ?>