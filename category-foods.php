<?php include('partials-front/menu.php');?>

    <?php
        //check whether id is pass or not
        if(isset($_GET['category_id']))
        {
            //category id is set and get the id
            $category_id = $_GET['category_id'];
            //GET THE CATEGORY title based on category id
            $sql = "SELECT title FROM table_catergory WHERE id=$category_id";

            //execute the query
            $res = mysqli_query($conn,$sql);

            //get the value from data base
            $row = mysqli_fetch_assoc($res);
            //get the title
            $category_title = $row['title'];
        }
        else
        {
            //category not passed
            //redirect to home page
            header('location:'.SITEURL);
        }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            //create sql query to get food based on select ed category
            $sql2 = "SELECT*FROM table_food WHERE category_id=$category_id";

            //execute the query
            $res2 = mysqli_query($conn,$sql2);

            //count rows to check whether the category available or not
            $count2 = mysqli_num_rows($res2);

            //checik whether the food are available or not
            if($count2>0)
            {
                //food available
                while($row2=mysqli_fetch_assoc($res2))
                {
                    //get the values like id, title, image_name
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $description = $row2['description'];
                    $price = $row2['price'];
                    $image_name = $row2['image_name'];
                    ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    //check whether image is available  or not
                                    if($image_name=="")
                                    {
                                        // image not available
                                        echo "<div class= 'error'> Image not Available</div>";
                                    }
                                    else
                                    {
                                        //image availale
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chiken Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price">Rs<?php echo $price;?></p>
                                <p class="food-detail">
                                    <?php echo $description;?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    <?php
                }
            }
            else
            {
                //food not available
                echo "<div class='error'>Food Not Found.</div>";
            }


            ?>

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>