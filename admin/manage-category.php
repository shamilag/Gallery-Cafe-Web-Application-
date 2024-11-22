<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Category</h1>

    <br /><br /><br />
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove']))
        {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['no-category-found']))
        {
            echo $_SESSION['no-category-found'];
            unset($_SESSION['no-category-found']);
        }
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['faild-remove']))
        {
            echo $_SESSION['faild-remove'];
            unset($_SESSION['faild-remove']);
        }
        
        ?>
        <br><br>
            <!-- Button to Add Admin -->
             <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
             <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>serial Number</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                    
                <?php
                    //query to get all categories from Database
                    $sql="SELECT * FROM table_catergory";

                    //execute query
                    $res = mysqli_query($conn,$sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //created ser

                    //check whether we have data in data base or not
                    if($count>0)
                    {
                        //count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //function to get all rows in database

                        $sn=1; //create a variable and and assined

                        //we have dat in dat base
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                        
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title;?></td>

                                <td>
                                    <?php
                                    //chech whether image name is available or not
                                        if($image_name!="")
                                        {
                                             //display the image
                                             ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px">
                                             <?php
                                         }
                                        else
                                         {
                                            //display the message
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>
                                
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo$image_name; ?>" class="btn-danger">Delete Category</a>
                                </td>
                            </tr> 
                            <?php
                        }
                    }
                    else
                    {
                        //we do not have data
                        //we will display th emessage inside table
                        ?>
                        <tr>
                            <td colspan="6"><div class="error">No Category Added</div></td>
                        </tr>
                        <?php
                    } 
                ?>


                
               
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>