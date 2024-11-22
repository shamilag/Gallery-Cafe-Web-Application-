<?php include('partials-front/menu.php');?>



    <!-- Reservation Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Table Reservation</h2>

            <form action="table-reservation.php" method="POST" class="order">
                <fieldset>
                    <legend>Table Reservation Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="fullname" placeholder="E.g. First Name " class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. +94*********" class="input-responsive" required>

                    <div class="order-label">No Of Persons</div>
                    <input type="number" name="qty-persons" placeholder="E.g. qty of persons " class="input-responsive" required>

                    <div class="order-label">Booking Date</div>
                    <input type="date" name="booking-date" placeholder="E.g. dd/mm/year " class="input-responsive" required>

                    <div class="order-label">Booking Time</div>
                    <input type="time" name="booking-time" placeholder="E.g. 00.00-23.59 " class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. dfg@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="5" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
                    
                    <input type="submit" name="submit" value="Confirm Booking" class="btn btn-primary">
                </fieldset>
            </form>

            <?php
                //check whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //get all the details from the form 
                    $fullname = $_POST['fullname'];
                    $contact = $_POST['contact'];
                    $qty = $_POST['qty-persons'];
                    $booking_date = $_POST['booking-date']; //order date
                    $booking_time = $_POST['booking-time'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $status = "ordered"; //ordered , deliver or canceled
                    
                    
                    

                    //save the order in data base 
                    //create sql to save the data
                    $sql2 = "INSERT INTO table_reservation SET
                        
                        fullname = '$fullname',
                        contact = '$contact',
                        qty_persons = $qty,
                        booking_date ='$booking_date',
                        booking_time ='$booking_time',
                        email = '$email',
                        address = '$address',
                        status = '$status'   
                    ";
                    //echo $sql2; die();

                    //execute the query
                    $res2 = mysqli_query($conn,$sql2);

                    //check whether query executed successfully or not
                    if($res2==true)
                    {
                        //query executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'>Booking Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else
                    {
                        //fail to save order
                        $_SESSION['order'] = "<div class='error text-center'>Failed To Booking.</div>";
                        header('location:'.SITEURL);
                    }
                }
                ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Reservation Section Ends Here -->


    
    <?php include('partials-front/footer.php');?>