<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Oder System</title>
        <link rel="stylesheet" href="admin.css">
        <style> * {

            background: url(../images/ad6.jpg);
        }
        
        
        
        
        </style>
    </head>
    <body>
    <div class = "login">
        <h1 class="text-center">Customer Registration</h1>
        <br><br><br>


        <?php
                if(isset($_SESSION['add'])) //check the session is set of not
                {
                    echo $_SESSION['add'];  //display session massage if set
                    unset($_SESSION['add']);    //removing session massage
                }
            ?>

            <form action="" method="POST">
                
             <!-- Register form starts here -->
             <form action="" method ="POST" class="text-center"> <br><br>
             Full Name: <br>
             <input type="text" name="fullname" placeholder="Enter Full Name"> <br><br>
             Email: <br>
             <input type="email" name="email" placeholder="Enter email"> <br><br>
             Address: <br>
             <input type="text" name="address" placeholder="Enter Address"> <br><br>
             Password: <br>
             <input type="password" name="password" placeholder="Enter Password"> <br><br>

             <input type="submit" name="submit" value="Submit" class="btn-primary">
             </form>
             <!-- register form end here -->
            </form>
        </div>
    </div>     



    <?php 
        //process the valuve from form and save it in data base
        //Check whether the submit button is clicked or not

        if(isset($_POST['submit']))
        {
            //Button clicked
            //echo "Button Clicked";

            //Get the Data from form
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $password = md5($_POST['password']); //password encryption with md5

            //SQL Query to save the data into database
            $sql = "INSERT INTO table_customer SET 
                fullname='$fullname',
                email= '$email',
                address= '$address',
                password= '$password'
            ";
            
            //executing query and saving data into database
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            //check whether the (quary is execute) data is inserted or not and display appropriate message
            if($res==TRUE)
            {
                //data insert
                //echo "Data Inserted";
                //create a sessionvariable to display message
                $_SESSION['add']=" ";
                //Redirect Page to manage admin
                header("location:".SITEURL.'admin/customer-login.php'); 
            }
            else
            {
                //failed to insert data
                //echo "Fail to Insert Data";
                //create a sessionvariable to display message
                $_SESSION['add']="Fails to add Submit";
                //Redirect Page to add admin
                header("location:".SITEURL.'admin/customer-registration.php'); 
            }


        }

    
    
    ?> 
