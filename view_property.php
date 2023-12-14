<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

include 'components/save_send.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Property</title>
   <link rel="stylesheet" href="home.css">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #002349; /* Dark gray background */
    color: #ffffff; /* White text */
}

.heading {
    color: #ffcc00; /* Yellow heading color */
}

.details {
    padding: 20px;
}

.images-container {
    margin-bottom: 20px;
    text-align: center;
    width: 800px;
}

.swiper2 {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    border:5px solid #c29b40;
}

.swiper2 img {
    width: 100%;
    height: auto;
    border-radius: 12px; /* Slightly rounded corners for images */
    margin-bottom: 15px; /* Increased space between images */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
}

.name {
    margin-top: 15px; /* Adjusted spacing */
}

.location {
    margin-top: 10px; /* Adjusted spacing */
}

.info {
    margin-top: 15px; /* Adjusted spacing */
}

.title {
    margin-top: 25px; /* Adjusted spacing */
    color: #ffcc00; /* Yellow title color */
}

.flex6 {
    display: flex;
    justify-content: space-between;
    margin-top: 15px; /* Adjusted spacing */
}

.box6 {
    width: 48%;
}

.description {
    margin-top: 15px; /* Adjusted spacing */
    line-height: 1.5; /* Increased line height for better readability */
}

.empty {
    color: #ffcc00; /* Yellow empty message color */
    margin-top: 20px; /* Adjusted spacing */
}

   </style>
</head>
<body>
   
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

<!-- view property section starts  -->

<section class="view-property">

   <h1 class="heading">property details</h1>

   <?php
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE id = ? ORDER BY date DESC LIMIT 1");
      $select_properties->execute([$get_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $property_id = $fetch_property['id'];

         $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
         $select_user->execute([$fetch_property['user_id']]);
         $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

         $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
         $select_saved->execute([$fetch_property['id'], $user_id]);
   ?>
  
   <div class="details">
     <div class="images-contaainer">
      <center>
         <div class="swiper2">
            <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="" class="slide">
            <?php if(!empty($fetch_property['image_02'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_02']; ?>" alt="" class="slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_03'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_03']; ?>" alt="" class="slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_04'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_04']; ?>" alt="" class="slide">
            <?php } ?>
            <?php if(!empty($fetch_property['image_05'])){ ?>
            <img src="uploaded_files/<?= $fetch_property['image_05']; ?>" alt="" class="slide">
            <?php } ?>
         </div>
      </center>
        
     </div>
      <h3 class="name"> <i>name:</i><?= $fetch_property['property_name']; ?></h3>
      <p class="location"><i>location</i><span><?= $fetch_property['address']; ?></span></p>
      <div class="info">
         <p><span><i>price:</i><?= $fetch_property['price']; ?></span></p>
         
         
         <p><span><i>type:</i><?= $fetch_property['type']; ?></span></p>
         <p><span><i>offer:</i><?= $fetch_property['offer']; ?></span></p>
         <p></i>date:</i><span><?= $fetch_property['date']; ?></span></p>
      </div>
      <h3 class="title">details</h3>
      <div class="flex6">
         <div class="box6">
            <p><i>rooms :</i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
            <p><i>deposit amount : </i><span><span class="fas fa-indian-rupee-sign" style="margin-right: .5rem;"></span><?= $fetch_property['deposite']; ?></span></p>
            <p><i>status :</i><span><?= $fetch_property['status']; ?></span></p>
            <p><i>bedroom :</i><span><?= $fetch_property['bedroom']; ?></span></p>
            <p><i>bathroom :</i><span><?= $fetch_property['bathroom']; ?></span></p>
            <p><i>balcony :</i><span><?= $fetch_property['balcony']; ?></span></p>
         </div>
         <div class="box6">
            <p><i>carpet area :</i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            <p><i>age :</i><span><?= $fetch_property['age']; ?> years</span></p>
            <p><i>total floors :</i><span><?= $fetch_property['total_floors']; ?></span></p>
            <p><i>room floor :</i><span><?= $fetch_property['room_floor']; ?></span></p>
            <p><i>furnished :</i><span><?= $fetch_property['furnished']; ?></span></p>
            <p><i>loan :</i><span><?= $fetch_property['loan']; ?></span></p>
         </div>
      </div>
      <h3 class="title">amenities</h3>
      <div class="flex6">
         <div class="box6">
            <p><i class="fas fa-<?php if($fetch_property['lift'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>lifts</span></p>
            <p><i class="fas fa-<?php if($fetch_property['security_guard'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>security guards</span></p>
            <p><i class="fas fa-<?php if($fetch_property['play_ground'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>play ground</span></p>
            <p><i class="fas fa-<?php if($fetch_property['garden'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>gardens</span></p>
            
            <p><i class="fas fa-<?php if($fetch_property['power_backup'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>power backup</span></p>
         </div>
         <div class="box6">
            <p><i class="fas fa-<?php if($fetch_property['parking_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>parking area</span></p>
            <p><i class="fas fa-<?php if($fetch_property['gym'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>gym</span></p>
            <p><i class="fas fa-<?php if($fetch_property['shopping_mall'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>shopping mall</span></p>
            <p><i class="fas fa-<?php if($fetch_property['hospital'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>hospital</span></p>
            <p><i class="fas fa-<?php if($fetch_property['school'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>schools</span></p>
            <p><i class="fas fa-<?php if($fetch_property['market_area'] == 'yes'){echo 'check';}else{echo 'times';} ?>"></i><span>market area</span></p>
         </div>
      </div>
      <h3 class="title">description</h3>
      <p class="description"><?= $fetch_property['description']; ?></p>
   
        
   </div>

   <br><hr><br>
   <center> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.176069641021!2d77.3058510740227!3d19.143768682074796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd1d7ed6ccaee87%3A0x65c6dfebae1ccc31!2sGokuldham%20City%20Yash%20Group!5e0!3m2!1sen!2sin!4v1700639014537!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</center><br><br>
   <?php
      }
   }else{
      echo '<p class="empty">property timest found! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
   }
   ?>

</section>

<!-- view property section ends -->


















</body>
</html>