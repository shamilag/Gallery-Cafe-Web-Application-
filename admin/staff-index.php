
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('partials/staff-menu.php');?>
    <!-- Main Content Section Starts -->
    <div class="main-content">
            <div class="wrapper">
            <h1>Staff Dashboard</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br>
            <div class="col-4 text-center">

                <?php 
                    //sql query
                    $sql = "SELECT * FROM table_catergory";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Categories
            </div>
            <div class="col-4 text-center">
            <?php 
                    //sql query
                    $sql = "SELECT * FROM table_food";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Food
            </div>
            <div class="col-4 text-center">
            <?php 
                    //sql query
                    $sql = "SELECT * FROM table_oder";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $count = mysqli_num_rows($res);
                    echo "<h1>$count</h1>";
                ?>
                <br>
                Total Orders
            </div>

            <div class="col-4 text-center">
                <?php 
                    //sql query to get total revenue generate
                    $sql = "SELECT SUM(total) AS Total FROM table_oder WHERE status='delivered'";
                    //execute the query
                    $res = mysqli_query($conn,$sql);
                    //count rows
                    $row = mysqli_fetch_assoc($res);
                    //get the total revenue
                    $total = $row['Total'];
                    
                    
                ?>
                
                    <h1><?php echo "<h1> Rs $total <h1>";?></h1>
                <br>
                Revenue Generate
            </div>
            <div class="clearfix"></div>
            </div>
         </div>
        <!-- Main Content Section Ends -->

<?php include('partials/staff-footer.php');?>
    
</body>
</html>

        
