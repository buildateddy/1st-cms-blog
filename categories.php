<?php include "includes/admin_header.php"



?>

    <div id="wrapper">

       
        
         
          
           
             <!-- Navigation -->
 
<?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                  <div class="col-xs-6"></div>
                   <?php insert_categories(); ?>
                    <form action="" method="post">
                     <div class="form-group">
                         <label for="cat_title">Add Category</label>
                         <input type="text" class="form-control" name="cat_title">
                         </div>  
                          <div class="form-group">
                         <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                          </div> 
                            </form>
<?php // UPDATE AND INCLUDE QUERY
   if(isset($_GET['edit'])) {
       $cat_id = $_GET['edit'];
       include "includes/update_categories.php";
       
   }    
                        ?>
                    
                    
                    
                    
                     </div> <!--Add Category Form-->
                   <?php 
    if(isset($_POST['submit'])){
     $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "this field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
            
        }
    }
                    
                    ?>
                    
                    
                    
                    
                  
                  <?php 
if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];                     
 $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
$select_categories_id = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_categories_id)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];       
    ?>  
    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>"class="form-control" type="text" name="cat_title">                   
<?php }} ?>
                         
                       ?>   
                         
                          
                           
                            
                             
                              
                                
                         
                    
                         
                    
                 
                </div>
                   <div class="col-xs-6">

                       <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th>Id</th>
                               <th>Category Title</th>
                           </tr>
                       </thead>
                       <tbody>

   <?php findAllCategories(); ?>

 <?php  deleteCategories(); ?>
  
                       </tbody>
                   </table>
                   </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"



?>