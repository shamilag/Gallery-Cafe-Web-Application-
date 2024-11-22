<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Details</h1>
        <br><br><br>

        <?php 
            //get id of select admin
            $id=$_GET['id'];
            //create sql query to get the details
            $sql="SELECT * FROM table_admin WHERE id=$id";
            //execute the query
            $res=mysqli_query($conn,$sql);
            //check whether the query is executed or not
            if($res==true)
            {
                //check wheather the data is available or not
                $count = mysqli_num_rows($res);
                //check whether we have admin data or not
                if($count==1)
                {
                    //get the the details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $fullname=$row['fullname'];
                    $username=$row['username'];
                    $email = $row['email'];
                    $position = $row['position'];
                    

                    
                }
                else
                {
                    //redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" value="<?php echo $fullname;?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username;?>">
                    </td>
                </tr>

                <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" value="<?php echo $email;?>">
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

           

                    
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Details" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //get all the valuve from form to update
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        

        //create a sql query to update admin
        $sql = "UPDATE table_admin SET 
        fullname = '$fullname',
        username = '$username', 
        email= '$email',
        position= '$position'
        
         WHERE id='$id'";

        //execute the query
        $res = mysqli_query($conn, $sql);

        //check queryexecuted successfuly or not
        if($res==true)
        {
            //query executed and admin updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
            
        }
        else
        {
            //failed to update admin
            $_SESSION['update'] = "<div class='success'>Failed Update Admin.</div>";
            //redirect to manage admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>
<?php include('partials/footer.php'); ?>
