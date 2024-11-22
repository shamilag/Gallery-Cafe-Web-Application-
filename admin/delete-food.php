<?php

    //Include constant page
    include('../config/constants.php');

    //echo "Delete Food Page";

    if(isset($_GET['id']) AND isset($_GET['image_name'])) 
    {
        //process to delete
        //echo "process to delete";

        //get id and image name
        $id = $_GET['id'];
        $image_name =$_GET['image_name'];

        //remove the image if available
        //check whether the image is available or not and delete only if available
        if($image_name != "")
        {
            //it has image need to remove from folder
            //get the image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove= unlink($path);

            //check whether the image is remove or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload']= "<div class='error'> Failed to Remove Image File.</div>";
                //redirect to manage food
                header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process of deleting food
                die();
            }
        }

        //delete food from database
        $sql = "DELETE FROM table_food WHERE id=$id";
        //execute the query
        $res = mysqli_query($conn,$sql);

        //check whethere the query execute or not and set the session message respectively
        //redirect to manage food with session message
        if($res==true)
        {
            //food delete
            $_SESSION['delete']= "<div class='success'> Food Delete Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //failed to delete food 
            $_SESSION['delete']= "<div class='error'> Failed to Delete Food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        //redirect to manage food page
        //echo "redirect";
        $_SESSION['unauthorized']="<div class='error'> Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');

    }
?>