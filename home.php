<?php

if(isset($_COOKIE['user_id'])){
  $user_id = $_COOKIE['user_id'];
}else{
  $user_id = '';
}

include 'components/save_send.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="home.js">
    <title>Real Estate</title>
    <link rel="icon" type="images/x-icon" href="logo\MT.png" />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>

</head>
<body>
  <div class="x">
    <a href="login1.html">
      <button id="logoutButton">Join/Log In</button></a>
  </div>

    <header>
        <div class="logo">
            
            <h1>MT Real-Estate</h1>
        </div>
        <nav><b>
            <ul>
              <li><a href="home.php">HOME</a></li>
              <li><a href="about.html">ABOUT US</a></li>
              <li><a href="my_listings.php">PROPERTIES</a></li>
              <li><a href="agents.html">AGENTS</a></li>
              <li><a href="contact.html">CONTACT US</a></li>
              <li><a href="post_property.php">SELL</a></li>

              
            </ul>

            <?php if($user_id != ''){ ?>
                  
                  <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">LOGOUT</a>
                  <?php } ?></li>
  
            </b>
          </nav>
    </header>
    
    <div class="video-wrapper">
      <video playsinline autoplay muted loop poster="images\im1.jpg">
        <source src="images\H1.mp4" type="video/mp4">

      </video>
    </div>
  
<div class="main" style="font-size: 20px;border-style: solid; border-color: #c29b40;">
  <b><marquee class="marq "
           direction="left"
           scrollamount="10"
           behavior=scroll
           loop="">
      WELCOME TO MT REAL ESTATE
  </marquee></b>
</div>
<hr>

<section class="l">
  <div class="m"> 
      <p style="font-size: 24px; margin-top: 20px;font-family: Georgia, serif; color: black;">
       "For those who seek an exceptional home and life, there is only MT Realty."</p><br>
       <div class="separator"></div><br>
       <p style="font-size: 20px; font-family: Times New Roman, Times, serif;">"Built on centuries of tradition and dedicated to innovating the luxury real estate industry,
         MT Realty offers transformative experiences through a global network of exceptional agents."</p>
  </div>
  <div >
   <img src="images/im4.jpg" alt="Shubhangi Takbide" >
</div>
</section><br><br>

<section class="l">
  <div class="sepa"></div>
  <div class="m">
    <p style="font-size: 24px;font-family: Georgia, serif; 
    color: black; margin-left: 100px;"><u>
     "OUR STORY"</u></p>
     <p style="font-size: 20px; font-family: Times New Roman, Times, serif; margin-left: 100px;">"Only one network of agents represents the longest standing tastemaker in the world. In the spirit of innovation, 
      an exceptional luxury real estate company bearing the MT’s. Beyond the beautiful properties and the personal touch of our agents, 
      only one brand can deliver a lifestyle that caters to you. With a network of homes for sale worldwide, our website lets you search property listings globally,
       and includes a large inventory of luxury homes for sale, including houses, condos, townhomes, villas, and more."
      <br><b><a href="about.html">
      SEE DETAILS →</a></b>
      </p>
</div>
</section>

<section class="n" style="background-color: #002349;">
  <div >
       <img src="images\i2.jpg" alt="Shubhangi Takbide" >
  </div>
  <div class="m">
    <p style="font-size: 30px;font-family: Georgia, serif; 
    color: white; margin-left: 60px;">
     "Exclusive Access to Local Experts"</p><br>

     <p style="font-size: 20px; font-family: Times New Roman, Times, serif; 
     margin-left: 90px;color: grey;">"With experts in every part of the world, we are local everywhere,
       allowing us to walk alongside our clients at every stage of their journey. With innovative technology and unrivaled service, we ensure that your home is connected with buyers,
        locally and worldwide."
      </p><br>

      <div class="x" style="width: 150px; margin-left: 150px;">
        <a href="my_listings.php">
          <button id="logoutButton" style="width: 200px;">Sell With Us →</button></a><br><br>
      </div>
</div>      
</section>

<section class="v">
  <div class="vid">
    <video controls>
      <source src="images\H2.mp4" type="video/mp4">
    </video>
  </div><br><br>
  <center style="font-size: 18px; color: grey;">
    <p style="font-size:22px;color: white;font-family:Georgia, serif; ;">Get Inspired </p><br><br>
   <p>For those who seek an exceptional home and life, browse our video series catalogue.</p><br><br>
   <div class="x" style="width: 150px;">
    <a href="about.html">
      <button id="logoutButton" style="width: 200px;">View All →</button></a><br><br>
  </div>
  </center><br><br>
  </section>
<footer>
    <div class="social-icons">
        <a href="#"><img src="logo\317752_facebook_social media_social_icon.png" alt="Facebook"></a>
        <a href="#"><img src="logo\317720_social media_tweet_twitter_social_icon.png" alt="Twitter"></a>
        <a href="#"><img src="logo\6636566_instagram_social media_social network_icon.png" alt="Instagram"></a>
    </div>
    <p>&copy; 2023 Real Estate Agency. All rights reserved.</p>
</footer>
    <script src="login.js"></script>
    
</body>
</html>

