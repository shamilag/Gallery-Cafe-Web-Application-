<?php include('partials/staff-menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
            <h1>Admin & Staff</h1>

            <br /><br /><br />
            
            <br><br>
            

            <table class="tbl-full">
                <tr>
                    <th>serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Position</th>
                    
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

<?php include('partials/staff-footer.php');?>