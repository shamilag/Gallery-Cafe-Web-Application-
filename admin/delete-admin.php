<?php

    //include constants.php file here
    include('../config/constants.php');
    //get the ID of admin to be delete
    echo $id = $_GET['id'];

    //create sql query to delete admin
    $sql= "DELETE FROM table_admin WHERE id=$id";

    //execte the query
    $res = mysqli_query($conn, $sql);

    //check whether the query executed successfully or not
    if($res==true)
    {
        //query executed succesfully and admin deleted
        //echo "Admin Deleted";
        //create session variable to display massage
        $_SESSION['delete']= "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //failed to delete admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
        
    
    //redirect to manage admin page with message (success/error)
?>