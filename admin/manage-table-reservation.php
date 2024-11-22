<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Manage Booking Status</h1>
    <br><br>
        <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
   <br><br>

    <table class="tbl-full">
                        
                <tr>
                    <th>S.N</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Qty of Person</th>
                    <th>Booking_date</th>
                    <th>Booking_time</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php
                    //create sql queary to get all the order
                    $sql = "SELECT*FROM table_reservation ORDER BY id DESC"; //Display the latest oder at first

                    //execute the query
                    $res = mysqli_query($conn,$sql);

                    //count rows to check wheather we have oder or not
                    $count = mysqli_num_rows($res);

                    //create serial number variable and set default value as 1
                    $sn=1;

                    if($count>0)
                    {
                        
                        //oder availablef
                       
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the values from individual columns
                            $id = $row['id'];
                            $fullname = $row['fullname'];
                            $contact = $row['contact'];
                            $qty = $row['qty-persons'];
                            $booking_date = $row['booking_date'];
                            $booking_time = $row['booking_time'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $status = $row['status'];

                            ?>

                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $fullname;?></td>
                                    <td><?php echo $contact;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $booking_date;?></td>
                                    <td><?php echo $booking_time;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $address;?></td>
                                    
                                    <td>
                                        <?php 
                                        //ordered, on delivery, dilivered, cancelled
                                        if($status=="ordered")
                                        {
                                            echo "<lable style='color: white;'>$status</lable>";
                                        }
                                      
                                        elseif($status=="on delivery")
                                        {
                                            echo "<lable style='color: orange;'>$status</lable>";
                                        }
                                        elseif($status=="delivered")
                                        {
                                            echo "<lable style='color: green;'>$status</lable>";
                                        }
                                        elseif($status=="cancelled")
                                        {
                                            echo "<lable style='color: red;'>$status</lable>";
                                        }
                                        ?>
                                    </td>
                                    
                                   
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-table-reservation.php?id=<?php echo$id; ?>" class="btn-secondary">Update Oder</a>
                                        
                                    </td>

                                    
                                </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //Oder not available
                        echo "<tr> <td colspan='12' class='error'> Booking Not Available .</td></tr>" ;
                    }
                ?>

                
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>