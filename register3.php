<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "real"; 

    $conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user-type'];
 
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
        echo '<script>alert("User already exists!");</script>';
        
    }else{
       if($pass != $cpass){
        echo '<script>alert("confirm password not matched!");</script>';
       
          
       }else{
          mysqli_query($conn, "INSERT INTO `users`(username, email, password, user_type) VALUES('$username', '$email', '$cpassword', '$user_type')") or die('query failed');
          echo '<script>alert("Registered successfully");</script>';
          header('location:login1.html');
       }
    }
 
 }
?>