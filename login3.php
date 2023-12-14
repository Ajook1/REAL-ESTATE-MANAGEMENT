<?php

include 'conection.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);
                                                                                       
                      
      if($row['user_type'] == 'user'){

         $_SESSION['admin_name'] = $row['username'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:home.php');

      }elseif($row['user_type'] == 'admin'){

         $_SESSION['user_name'] = $row['username'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:admin.php');

      }

     

   }else{
    echo '<script>alert("incorrect email or password!");</script>';
  
   }

}

?>