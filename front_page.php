<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> The Gallery Cafe </title>
    <link rel="stylesheet" href="style-front.css">
    <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!--Navbar-->
    <header>
        <a href="#" class="logo">
            <img src="images/l2.jpg" alt="">
        </a>
     <!--Menu icon--> 
     <i class='bx bx-menu' id="menu-icon"></i>
     <!--Links-->  
     <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About us</a></li>
        <li><a href="#produts">Food & Beverage</a></li>
        <li><a href="#customer"> Special Events </a></li>
     </ul>
     <!--Icon-->
        <div class="header-icon">
         <i class='bx bxs-cart-add'></i>
         <i class='bx bx-search-alt-2' id="search-icon"></i>
        </div>
     <!--search box--> 
     <div class="search-box">
        <input type="search" placeholder="search here......">
     </div>   
   </header>

   <!--Home-->
     <section class="home" id="home">
      <div class="home-text">
         <br><br>
         <h1>The Gallery  <br>  Cafe</h1>
         <br>
         <p>The finest culinary adventure at The Gallery Cafe</p>
         <p>Part of the luxury of staying at The Gallery Cafe is the fresh, sustainable cuisine you’ll encounter during your stay, satisfying the mind and body in one dream holiday. Each meal is ethically prepared by our executive chef who reimagines fresh, vibrant ingredients that are foraged right here on property or sourced from nearby fishers and farmers markets. It is this innovative, hyperlocal culinary concept that allows for a more intimate and traceable connection between guests and land.</p>
         <br><br>
         <p>Login / Sign Up </p>
         <br>
         <a href="admin/customer-login.php" class="btn">Login</a>
         <a href="admin/customer-registration.php" class="btn">Singup</a>
      </div>
      <div class="home-image">
         <img src="images/bg6.jpg" alt="">
      </div>
     </section>

     <!--About-->
     <br>
     <section class="about" id="about">
      
      <div class="about-img">
         <img src="images/res.jpg" alt="">
      </div>
      <div class="about-text">
         <h2>Our Restaurant</h2>
         <br>
         <p>At The Gallery Cafe, our executive chef makes wonderful use of the ingredients grown by our team and sourced locally from nearby farmers. We also forage the rainforest for wild foods such as kitul treacle, wild herbs, and flavorful leaves and fruits.

We invite you to complete your meal with our farm raised “bean to bar” house-roasted coffee.</p>
         
         <br>
         
         

      </div>
      <br><br><br>

      <div class="about-img1">
         <img src="images/menu1.jpg" alt="">
      </div>
      <div class="about-text1">
         <h2>Menu About</h2>
         <br>
         <p>The smell of cardamom, cinnamon, fenugreek and cumin reaches out from every dish whether you’re eating in markets, restaurants or houses.

It’s these spices that lured the traders hundreds of years ago. In turn these traders left their own mark on the local cuisine. Sri Lankan food takes inspiration from the Portuguese, the Moors, the Indians and even the English. But the end result is distinctly theirs.

While much of the local food is seafood based (one of the perks of being an island), Sri Lanka is also one of the most vegetarian-and vegan-friendly countries in the world. Their food is a celebration of fresh fruit and vegetables like pandan, okra, beans, aubergine, cashews, beetroot and even potato.</p>
         
         <br>
         
         

      </div>
      <br><br><br>

      <div class="about-img">
         <img src="images/park.jpg" alt="">
      </div>
      <div class="about-text">
         <h2>Parking</h2>
         <br>
         <p>At The Gallery Cafe, we understand the importance of a hassle-free dining experience, starting from the moment you arrive. Conveniently located  near the town our restaurant offers ample parking right on-site. Whether you're joining us for a casual lunch, a special dinner celebration, or hosting an event with us, you can rest assured that parking is readily available. Enjoy peace of mind knowing that your vehicle is securely parked just steps away from our welcoming entrance. Experience exceptional dining with the added convenience of accessible parking at The Gallery Cafe.</p>
         
         <br>
         
         

      </div>

     </section>

     

     <!--produts-->
     <section class="produts" id="produts">
      <div class="heading">
         <h2>Propuler Foods</h2>
      </div>
      <!--container-->
      <div class="Product-Container">
         <div class="box">
            <img src="images/sri.jpeg" alt="">
            <h3>Rice & Curry</h3>
            <div class="content">
               <span>Rs.400/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>

         <div class="box">
            <img src="images/string_hoppers.jpg" alt="">
            <h3>String Hoppers</h3>
            <div class="content">
               <span>Rs.350/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>

         <div class="box">
            <img src="images/hoppers.jpeg" alt="">
            <h3>Hoppers</h3>
            <div class="content">
               <span>Rs.500/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>

         <div class="box">
            <img src="images/pizz.jpg" alt="">
            <h3>Pizza</h3>
            <div class="content">
               <span>Rs.4000/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>

         <div class="box">
            <img src="images/burger.jpg" alt="">
            <h3>Burger</h3>
            <div class="content">
               <span>Rs.220/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>

         <div class="box">
            <img src="images/hot.jpg" alt="">
            <h3>Hot Dogs</h3>
            <div class="content">
               <span>Rs.250/=</span>
               <a href="#">Add To Cart</a>
            </div>
         </div>
      </div>
     </section>
    
    

    <script src="script.js"></script>
</body>
</html>