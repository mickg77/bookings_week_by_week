<?php
//starts the session 
    session_start();     
    //checks if the session has been initiated
    if($_SESSION['user_session']!='abc')
      {
        //if not, it takes us back to the main page  
        header('Location: login.php');
      }
include('header.php');
include_once('functions/functions.php');
echo '<h3>Welcome '.$_SESSION['user_session'].'</h3>';
delete_record();

include('footer.php');
?>

