<?php
    //Authorization - Access control
    //check whether the user is logged in or not
    if(!isset($_SESSION['user']))
    {
        //user is not login
        //rederect to login page with massage
        $_SESSION['no-login-message']= "<div class='error text-center'>Please Login to Access Admin Panel.</div>";
        //redirect to login
        header('location:'.SITEURL.'admin/staff_login.php');
    }
?>