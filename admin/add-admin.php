<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Staff</h1>

        <br><br>
        <?php
            if(isset($_SESSION['add'])) //check the session is set of not
            {
                echo $_SESSION['add'];  //display session massage if set
                unset($_SESSION['add']);    //removing session massage
            }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="fullname" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Userame</td>
                <td>
                    <input type="text" name="username" placeholder="Enter Your Userame">
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" placeholder="Enter Your email">
                </td>
            </tr>

            <tr>
                <td>Position</td>
                <td>
                    
                    <select name="position" id="position">
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Enter Your Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Member" class="btn-secondary">
                </td>
            </tr>

        </table>
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
        $username = $_POST['username'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $password = md5($_POST['password']); //password encryption with md5

        //SQL Query to save the data into database
        $sql = "INSERT INTO table_admin SET 
            fullname='$fullname',
            username= '$username',
            email= '$email',
            position= '$position',
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
             $_SESSION['add']="Admin Added Successfully";
            //Redirect Page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php'); 
        }
        else
        {
            //failed to insert data
            //echo "Fail to Insert Data";
             //create a sessionvariable to display message
             $_SESSION['add']="Fails to add admin";
             //Redirect Page to add admin
             header("location:".SITEURL.'admin/add-admin.php'); 
        }


    }
    
   
?> 
<?php include('partials/footer.php');?>