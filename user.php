<?php

include 'conection.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login1.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:user.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
         body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    background-color: #ecf0f1;
    color: #2c3e50;
}

.header {
    background-color: #002349;
    color: white;
    padding: 15px;
    text-align: center;
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
    color: #2ecc71;
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
   
<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
    
      <a href="admin.php">HOME</a>
         <!-- <a href="">PROPERTY</a> -->
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


<section class="users">

   <h1 class="title"> user accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> user type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="user.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>




</body>
</html>