<?php

include 'conection.php';

session_start();
session_unset();
session_destroy();

header('location:login3.html');

?>