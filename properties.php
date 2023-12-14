 <!-- under construction by yash mahajan 


<?php

include 'conection.php';

session_start();


?>



<!DOCTYPE html>
<head>
    <title>Properties</title>
    <link rel="stylesheet" href="properties.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="x" style="border-style: solid; border-bottom-color: #c29b40;">
        <a href="login1.html">
          <button id="logoutButton">Join/Log In</button></a>
      </div>
    <header>
        <div class="logo">
            
            <h1>MT Real-Estate</h1>
        </div>
        <nav><b>
            <ul>
              <li><a href="home.html">HOME</a></li>
              <li><a href="about.html">ABOUT US</a></li>
              <li><a href="properties.html">PROPERTIES</a></li>
              <li><a href="agents.html">AGENTS</a></li>
              <li><a href="contact.html">CONTACT US</a></li>
            </ul>
            </b>
          </nav>
    </header>
    <div class="property-card">
        <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="100px" width="100px">
        <h3>Stunning Cottage</h3>
        <p>4 bedrooms | 3 bathrooms</p>
        <p>Price: $750,000</p>
        <a href="#" class="btn">View Details</a>
    </div> 
 <html>
        <head></head>
         <body>
           <section class="a">
           <div >
                <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
            </div>
                <div class="b"> 
                    <h3>Stunning Cottage</h3>
                    <p>4 bedrooms | 3 bathrooms</p>
                    <p>Price: $750,000</p>
                    <a href="view.html" class="btn">View Details</a> 
                </div>
            </section>
            <hr>
            <section class="c">
                <div >
                     <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
                 </div>
                     <div class="b"> 
                         <h3>Stunning Cottage</h3>
                         <p>4 bedrooms | 3 bathrooms</p>
                         <p>Price: $750,000</p>
                         <a href="#" class="btn">View Details</a> 
                     </div>
                 </section>
                 <hr>
                 <section class="a">
                    <div >
                         <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
                     </div>
                         <div class="b"> 
                             <h3>Stunning Cottage</h3>
                             <p>4 bedrooms | 3 bathrooms</p>
                             <p>Price: $750,000</p>
                             <a href="#" class="btn">View Details</a> 
                         </div>
                     </section>
                     <hr>
                     <section class="c">
                        <div >
                             <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
                         </div>
                             <div class="b"> 
                                 <h3>Stunning Cottage</h3>
                                 <p>4 bedrooms | 3 bathrooms</p>
                                 <p>Price: $750,000</p>
                                 <a href="#" class="btn">View Details</a> 
                             </div>
                         </section>
                         <hr>
                         <section class="a">
                            <div >
                                 <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
                             </div>
                                 <div class="b"> 
                                     <h3>Stunning Cottage</h3>
                                     <p>4 bedrooms | 3 bathrooms</p>
                                     <p>Price: $750,000</p>
                                     <a href="#" class="btn">View Details</a> 
                                 </div>
                             </section>
                             <hr>
                             <section class="c">
                                <div >
                                     <img src="images\todd-kent-178j8tJrNlc-unsplash.jpg" alt="Property 4" height="300px" width="50%">
                                 </div>
                                     <div class="b"> 
                                         <h3>Stunning Cottage</h3>
                                         <p>4 bedrooms | 3 bathrooms</p>
                                         <p>Price: $750,000</p>
                                         <a href="#" class="btn">View Details</a> 
                                     </div>
                                 </section>
         </body>
        
</body> -->


<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="View details" name="View details" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section> 
