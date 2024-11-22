<?php include('partials/staff-menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Category</h1>

    <br /><br /><br />
        
        

            <table class="tbl-full">
                <tr>
                    <th>serial Number</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    
                </tr>
                    
                <?php
                    //query to get all categories from Database
                    $sql="SELECT * FROM table_catergory";

                    //execute query
                    $res = mysqli_query($conn,$sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    //created ser

                    //check whether we have data in data base or not
                    if($count>0)
                    {
                        //count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); //function to get all rows in database

                        $sn=1; //create a variable and and assined

                        //we have dat in dat base
                        //get the data and display
                        while($row=mysqli_fetch_assoc($res))
                        {
                            
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                        
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title;?></td>

                                <td>
                                    <?php
                                    //chech whether image name is available or not
                                        if($image_name!="")
                                        {
                                             //display the image
                                             ?>
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px">
                                             <?php
                                         }
                                        else
                                         {
                                            //display the message
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>
                                
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                              
                            </tr> 
                            <?php
                        }
                    }
                    else
                    {
                        //we do not have data
                        
                       
                    } 
                ?>


                
               
            </table>
    </div>
</div>

<?php include('partials/staff-footer.php'); ?>