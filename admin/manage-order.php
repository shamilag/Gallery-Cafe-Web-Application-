<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Admin Manage Oder</h1>
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
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order_date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php
                    //create sql queary to get all the order
                    $sql = "SELECT*FROM table_oder ORDER BY id DESC"; //Display the latest oder at first

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
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $forder_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $fcustomer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>

                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $food;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $qty;?></td>
                                    <td><?php echo $total;?></td>
                                    <td><?php echo $forder_date;?></td>
                                    
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
                                    
                                    <td><?php echo $customer_name;?></td>
                                    <td><?php echo $fcustomer_contact;?></td>
                                    <td><?php echo $customer_email;?></td>
                                    <td><?php echo $customer_address;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo$id; ?>" class="btn-secondary">Update Oder</a>
                                        
                                    </td>

                                    
                                </tr>

                            <?php

                        }
                    }
                    else
                    {
                        //Oder not available
                        echo "<tr> <td colspan='12' class='error'> Orders Not Available .</td></tr>" ;
                    }
                ?>

                
            </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>