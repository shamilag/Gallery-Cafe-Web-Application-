<?php include('partials/menu.php');?>

<div class = "main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br>
        <br>

        <!-- Add Category Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class=("tbl-30")>
                <tr>
                    <td>Title:  </Title></td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured:   </td>
                    <td>
                    <input type="radio" name="featured" value="Yes">Yes
                    <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:   </td>
                    <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <!-- Add Category Form Ends -->
        <?php
            //check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //echo"Clicked";
                //get the value from catergory 
                $title= $_POST['title'];
                //for radio input, we need to chech whether the button is selected or not
               // $featured=$_POST['featured'];
               // $active=$_POST['active'];

                
                if(isset($_POST['featured']))
                {
                    //get the value from form 
                    $featured=$_POST['featured'];   
                }
                else
                {
                    //set the default value
                    $featured="No";
                }

                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="No";
                }
                //check whether the image is selected or not and set the value for image name accordingly
                //print_r($_FILES['image']);

                //die(); //break the code here
                if(isset($_FILES['image']['name']))
                {
                    //upload the image
                    //to upload image we need image name, source path and destination path
                    $image_name=$_FILES['image']['name'];
                    
                    //upload the image only image is selected
                    if($image_name != "")
                    {
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
                            header('location:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();

                        }
                    }   
                }
                else
                {
                    //don't upload image and set the image_name value as blank
                    $image_name = "";
                }

                //create sql query to insert category in to database
                $sql = "INSERT INTO table_catergory SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";
                //execute the query and save in data base
                $res = mysqli_query($conn,$sql);
                //chech whether the query executed or not and data added or not 
                if($res==true)
                {
                    //query exected and category added
                    $_SESSION['add']= "<div class= 'success'>Category Added Successfully.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //failed to add category 
                    $_SESSION['add']= "<div class= 'error'>Failed to Add Category.</div>";
                    //Redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>