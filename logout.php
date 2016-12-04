<?php
   include_once('functions/functions.php');
   session_start(); 
   session_destroy();
   unset($_SESSION['user_session']);  
   header('Location: index.php');
?>
