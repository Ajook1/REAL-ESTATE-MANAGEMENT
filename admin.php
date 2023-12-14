<?php

include 'conection.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login1.html');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <style>
  body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-color: #001731;
    color: #2c3e50;
}

.header {
    background-color: #002349;
    color: white;
    padding: 15px;
    text-align: center;
    border: 3px solid ;
    border-bottom-color: goldenrod;
}

.flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    color: #fff;
    text-decoration: none;
    font-size: 24px;
}

.logo span {
    font-weight: 300;
}

.navbar {
    display: flex;
    gap: 20px;
}

.navbar a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease-in-out;
}

.navbar a:hover {
    color: #f39c12;
}

.icons {
    display: flex;
    gap: 20px;
    cursor: pointer;
}

.account-box {
    display: none;
    position: absolute;
    top: 60px;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

.account-box p {
    margin: 5px 0;
}

.account-box a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
    margin-right: 5px;
}

.account-box a:hover {
    text-decoration: underline;
}

.account-box .delete-btn {
    color: #e74c3c;
}

.account-box .delete-btn:hover {
    color: #c0392b;
}

.dashboard {
    padding: 20px;
}

.title {
    font-size: 36px;
    margin-bottom: 20px;
    color: darkgoldenrod;
}

.box-container {
    display: flex;
    gap: 20px;
    justify-content: center;
}

.box {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    cursor: pointer;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.box:hover {
    transform: scale(1.05);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
}

.box h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #3498db;
}

.box p {
    color: #7f8c8d;
}
    </style>
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
    
         <a href="admin.php">HOME</a>
         <!-- <a href="property.php">PROPERTY</a> -->
         <a href="user.php">USER</a>        
      </nav>

   
      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>new <a href="login.php">login</a> | <a href="register.php">register</a></div>
      </div>

   </div>

</header>

<section class="dashboard">

   <h1 class="title">Dashboard</h1>

   <div class="box-container">


      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>

   </div>

</section>



</body>
</html>

