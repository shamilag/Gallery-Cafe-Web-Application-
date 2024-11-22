<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
            //check whether the id is set or not
            if(isset($_GET['id']))
            {
                //get the id and all other details
                //echo "Getting the data";
                $id = $_GET['id'];
                //create sql query to get all other details
                $sql = "SELECT*FROM table_catergory WHERE id=$id";

                //execute the query
                $res = mysqli_query($conn,$sql);
                //count the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res); 
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                }
                else
                {
                    //redirect to manage category whith session massage
                    $_SESSION['no-category-found']= "<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else
            {
                //redirect to manage category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image</td>
                    <td>
                    <?php
                            if($current_image != "")
                            {
                                //display the image
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image;?> "width="150px">
                                <?php 
                            }
                            else
                            {
                                //display msg
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?> 
                    </td>
                </tr>
                
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //get all the values from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //updating new image if selected
                //check whether executre or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image detalis
                    $image_name = $_FILES['image']['name'];

                    //check whether the imageis available or not
                    if($image_name != "")
                    {
                        //image available
                        //a.upload the new image

                        //auto rename our image 
                        //get the extensions of our image (jpg,png,gif,etc)
                        $ext= end(explode('.',$image_name));
                        //rename the image
                        $image_name= "Food_Category_".rand(000,999).'.'.$ext; //

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path ="../images/category/".$image_name;
                        //finally upload the image
                        $upload = move_uploaded_file($source_path,$destination_path);
                        //check wethervthe image is uploaded then we will stop theprocess and redirect with error massage
                        if($upload==false)
                        {
                            //set image 
                            $_SESSION['upload']="<div class='error'>Failed To Upload Image.</div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/manage-category.php');
                            //stop the process
                            die();

                        }

                        //b.remove the current image
                        if($current_image!="")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);
                            //check whether the image is removed or not
                            //if faild to remove then display message and stop the process
                            if($remove==false)
                            {
                                //fail to remove image
                                $_SESSION['faild-remove'] = "<div class='error'>Failed to Remove Current Image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die(); //stop the process
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                //update the data base
                $sql2 = "UPDATE table_catergory SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active'
                    WHERE id=$id 
                ";

                //execute the query
                $res2 = mysqli_query($conn,$sql2);

                //redirect to mange category with message
                //check whether execute or not
                if($res2==true)
                {
                    //category updated
                    $_SESSION['update'] = "<div class = 'success'>Category Updated Sucessfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class = 'error'>Failed to Update Category.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
        ?>

    </div>
</div>


<?php include('partials/footer.php'); ?>