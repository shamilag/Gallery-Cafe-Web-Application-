<?php include('partials/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
            <h1>Manage Admin/Staff</h1>

            <br /><br /><br />
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION ['add']; //displaying massage
                    unset($_SESSION['add']); //removing massage
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                

            ?>
            <br><br>
            <!-- Button to Add Admin -->
             <a href="add-admin.php" class="btn-primary">Create Account</a>
             <br /><br /><br />

            <table class="tbl-full">
                <tr>
                    <th>serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>

                <?php
                    //query to get all admin
                    $sql = "SELECT * FROM table_admin";
                    //Execute the query
                    $res = mysqli_query($conn,$sql);

                    //check whether the query is execute of not
                    if($res==TRUE)
                    {
                        //count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //function to get all rows in database

                        $sn=1; //create a variable and and assined

                        //check the num of rows
                        if($count>0)
                        {
                            //we have data in data base
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                //using while loop to get all the  data from data base.
                                //and while loop will run as long as we have data in data base.

                                //get individual data
                                $id=$rows['id'];
                                $fullname=$rows['fullname'];
                                $username=$rows['username'];
                                $email=$rows['email'];
                                $position=$rows['position'];

                                //display the value in our table
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $fullname; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $position; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Details</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Details</a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }
                            else
                        {
                            //we do not have data in database
                        }
                    }
                ?>

            </table>

            </div>
         </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php');?>