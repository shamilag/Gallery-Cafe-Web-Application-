<?php 
    include_once '../config/constants.php';
    include('staff-login-check.php');
?> 



<html>
    <head>
        <title> The Gallary Cafe - Home Page</title>
        
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
         <div class="staff-menu text-center">
            <div class="wrapper">
            <ul>
                <li><a href="staff-index.php">Home</a></li>
                <li><a href="staff-manage-admin.php">Staff Details</a></li>
                <li><a href="staff-manage-category.php">Category</a></li>
                <li><a href="staff-manage-food.php">Food</a></li>
                <li><a href="manage-table-reservation.php">Table Reservation</a></li>
                <li><a href="staff-manage-order.php">Order</a></li>
                <li><a href="staff_login.php">Logout</a></li>
            </ul>
            </div>
         </div>
        <!--Staff Menu Section Ends -->