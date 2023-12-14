<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['property_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
      $select_images->execute([$delete_id]);
      while($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)){
         $image_01 = $fetch_images['image_01'];
         $image_02 = $fetch_images['image_02'];
         $image_03 = $fetch_images['image_03'];
         $image_04 = $fetch_images['image_04'];
         $image_05 = $fetch_images['image_05'];
         unlink('uploaded_files/'.$image_01);
         if(!empty($image_02)){
            unlink('uploaded_files/'.$image_02);
         }
         if(!empty($image_03)){
            unlink('uploaded_files/'.$image_03);
         }
         if(!empty($image_04)){
            unlink('uploaded_files/'.$image_04);
         }
         if(!empty($image_05)){
            unlink('uploaded_files/'.$image_05);
         }
      }
      $delete_saved = $conn->prepare("DELETE FROM `saved` WHERE property_id = ?");
      
      $delete_requests = $conn->prepare("DELETE FROM `requests` WHERE property_id = ?");
      $delete_requests->execute([$delete_id]);
      $delete_listing = $conn->prepare("DELETE FROM `property` WHERE id = ?");
      $delete_listing->execute([$delete_id]);
      $success_msg[] = 'listing deleted successfully!';
   }else{
      $warning_msg[] = 'listing deleted already!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>my listings</title>
<link rel="stylesheet" href="home.css">
<link rel="stylesheet" href="properties.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   
<style>
         * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      /* Body styles */
      body {
         font-family: 'Arial', sans-serif;
         background-color:#001731; /* Light background color */
      }

      /* Heading styles */
      .heading {
         color: #1a1a1a; /* Dark blue color */
      }

      /* Box container styles */
      .box-container {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between;
      }

      /* Box styles */
      .box {
         background-color: white; /* Dark blue color */
         color: #ffd700; /* Golden color */
         margin: 10px;
         padding: 15px;
         border-radius: 8px;
        
         border-radius: 20px;
    height: auto;
    width: 250px;
    border:5px solid  #c29b40;
      }

      /* Thumbnail styles */
      .thumb {
         position: relative;
         overflow: hidden;
         border-radius: 8px;
      }

      .thumb img {
         width: 100%;
         height: auto;
      }

      /* Button styles */
      .btn,
      .btn02 {
         display: inline-block;
         padding: 10px 15px;
         margin-top: 10px;
         text-align: center;
         text-decoration: none;
         border-radius: 4px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      .btn:hover,
      .btn02:hover {
         background-color:white; /* Golden color on hover */
         color: #1a1a1a; /* Dark blue color on hover */
      }

      /* Empty message styles */
      .empty {
         color: #1a1a1a; /* Dark blue color */
      }
</style>
</head>
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
<body><br>
   <center><h1>Featured Properties</h1></center><br><hr>
<section class="a">
           <div >
                <img src="images\pro1.jpeg" alt="Property 4" height="300px" width="50%">
            </div>
                <div class="b"> 
                    <h3>Stunning Cottage</h3>
                    <p>4 bedrooms | 3 bathrooms</p>
                    <p>Price: $750,000</p><br>
                    <div class="x">
                        <a href="view.html">
                          <button id="logoutButton">View Details →</button></a>
                      </div>
                </div>
            </section>
            <hr>
            <section class="c">
                <div >
                     <img src="images\pro3.jpg" alt="Property 4" height="300px" width="50%">
                 </div>
                     <div class="b"> 
                         <h3>Stunning Cottage</h3>
                         <p>3 bedrooms | 3 bathrooms</p>
                         <p>Price: ₹750,000</p><br>
                         <div class="x">
                            <a href="view2.html">
                              <button id="logoutButton">View Details →</button></a>
                          </div>
                     </div>
                 </section>
                 <hr>
                 <section class="a">
                    <div >
                         <img src="images\pro6.jpg" alt="Property 4" height="300px" width="50%">
                     </div>
                         <div class="b"> 
                             <h3>Stunning Cottage</h3>
                             <p>4 bedrooms | 2 bathrooms</p>
                             <p>Price: ₹850,000</p><br>
                             <div class="x">
                                <a href="view3.html">
                                  <button id="logoutButton">View Details →</button></a>
                              </div>
                         </div>
                     </section>
                     <hr>
                     <section class="c">
                        <div >
                             <img src="images\pro7.webp" alt="Property 4" height="300px" width="50%">
                         </div>
                             <div class="b"> 
                                 <h3>Stunning Cottage</h3>
                                 <p>5 bedrooms | 4 bathrooms</p>
                                 <p>Price: ₹5,50,000</p><br>
                                 <div class="x">
                                    <a href="view2.html">
                                      <button id="logoutButton">View Details →</button></a>
                                  </div>
                             </div>
                         </section>
                         <hr>
                         <section class="a">
                            <div >
                                 <img src="images\pro8.webp" alt="Property 4" height="300px" width="50%">
                             </div>
                                 <div class="b"> 
                                     <h3>Stunning Cottage</h3>
                                     <p>2 bedrooms | 2 bathrooms</p>
                                     <p>Price: ₹50,00,000</p><br>
                                     <div class="x">
                                        <a href="view.html">
                                          <button id="logoutButton">View Details →</button></a>
                                      </div>
                                 </div>
                             </section>
                             <hr>
                             <section class="c">
                                <div >
                                     <img src="images\pro4.jpg" alt="Property 4" height="300px" width="50%">
                                 </div>
                                     <div class="b"> 
                                         <h3>Stunning Cottage</h3>
                                         <p>4 bedrooms | 4 bathrooms</p>
                                         <p>Price: ₹750,000</p><br>
                                         <div class="x">
                                            <a href="view3.html">
                                              <button id="logoutButton">View Details →</button></a>
                                          </div>
                                     </div>
                                 </section><hr><hr><br>
                                 <center><h1>Current listing properties</h1></center><br>
<hr><hr>
         
<section class="my-listings">

   <!-- <div class="box-container"> -->
<section class="c">
   <?php
      $total_images = 0;
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ? ORDER BY date DESC");
      $select_properties->execute([$user_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $property_id = $fetch_property['id'];

         if(!empty($fetch_property['image_02'])){
            $image_coutn_02 = 1;
         }else{
            $image_coutn_02 = 0;
         }
         if(!empty($fetch_property['image_03'])){
            $image_coutn_03 = 1;
         }else{
            $image_coutn_03 = 0;
         }
         if(!empty($fetch_property['image_04'])){
            $image_coutn_04 = 1;
         }else{
            $image_coutn_04 = 0;
         }
         if(!empty($fetch_property['image_05'])){
            $image_coutn_05 = 1;
         }else{
            $image_coutn_05 = 0;
         }

         $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

   ?>
   <form accept="" method="POST" class="box">
      <input type="hidden" name="property_id" value="<?= $property_id; ?>">
      <div class="thumb">
         <p><span><?= $total_images; ?></span></p> 
         <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
      </div>
      
      <div class="btn02">
         
         <input type="submit" name="delete" value="delete" class="btn02" onclick="return confirm('delete this listing?');">
      
      <a href="view_property.php?get_id=<?= $property_id; ?>" class="btn">view property</a>
   </div>

   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>

   </section>
</section>
</body>
</html>

<!-- ------------------------------------------------------------------- -->














