<?php 
    include_once '../config/constants.php';
    include('admin-login-check.php');
?> 



<html>
    <head>
        <title> The Gallary Cafe - Home Page</title>
        
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <!-- Menu Section Starts -->
         <div class="menu text-center">
            <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Add Staff</a></li>
                <li><a href="manage-category.php">Cousins/Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-table-reservation.php">Table Reservation</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="staff_login.php">Logout</a></li>
            </ul>
            </div>
         </div>
        <!-- Menu Section Ends -->