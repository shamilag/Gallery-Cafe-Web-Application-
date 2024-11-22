<?php
    //include constants file
    include('../config/constants.php');

    //echo "delete page";
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        //echo "get the value delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is available
        if($image_name != "")
        {
            //image is available. so remove it
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add an errow message and stop the process
            if ($remove==false)
            {
                //set the session massage
                $_SESSION['remove']= "<div class ='error'>Failed to Remove Category Image.<?div>";
                //redirect to manage catergory page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }

        //delete data from data base
        //sql query delete data from data base
        $sql= "DELETE FROM table_catergory WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn,$sql);

        //check whether the  data is delete from data base or not
        if($res==true)
        {
            //Set success massage and redrect
            $_SESSION['delete']="<div class='success'>Catergory Deleted Successfully.</div>";
            //redirect manage category 
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //set fail message and redirect
            $_SESSION['delete']="<div class='error'>Failed to Delete Category.</div>";
            //redirect manage category 
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    }
    else
    {
        //redirect to mansage catergory page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>