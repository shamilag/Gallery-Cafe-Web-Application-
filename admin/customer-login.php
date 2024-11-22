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
            <h1 class="text-center">Customer Login</h1>
            <br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <!-- Login form starts here -->
             <form action="" method ="POST" class="text-center"> <br><br>
             Email: <br>
             <input type="email" name="email" placeholder="Enter email"> <br><br>
             Password: <br>
             <input type="password" name="password" placeholder="Enter Password"> <br><br>

             <input type="submit" name="submit" value="login" class="btn-primary">
             </form>
             <!-- Login form starts here -->

             <br><p class="text-center">New Customer Register - <a href="customer-registration.php">Click Here</a></p>

        </div>
    </body>

</html>

<?php
    //chech whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        //get the data from login form
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        //sql to check whether the user with username and password exist or not
        $sql = "SELECT*FROM table_customer WHERE email='$email' AND password='$password'";

        //3.Execute the query
        $res= mysqli_query($conn,$sql);

        //count rows to check whether the user exists or not
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login']="<div class='success'></div>";
            $_SESSION['email']= $email; //to check whether the user is logged in or not and logout will unset it
            //redirect to home Page/Dashboard
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            //user not Available and Login fail
            $_SESSION['login'] = "<div class='error text-center'>Login Fail(Check your Username or Password).</div>";
            //redirect to home page dashboard
            header('location:'.SITEURL.'admin/customer-login.php');
        }
    }
?>