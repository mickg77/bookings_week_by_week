<?php include('header.php'); 

    //starts the session 
    session_start();     
    //checks if the session has been initiated
    if(!isset($_SESSION['user_session']))
      {
        //if not, it takes us back to the main page  
        header('Location: userlogin.php');
      }
  ?>  
    <h2>Book a Table</h2>
    <!--this is the booking form-->
    <!-- data-ajax turns off jquery navigation-->
    <form method="POST" action="book.php" data-ajax="false">
        <label>Name</label>
<?php echo '<input type="text" name="namebox" readonly required value=" '.$_SESSION['user_session']. '"> ' ?>        <label>Date</label>
        <input type="date" name="datebox">
        <label>Time</label>
        <input type="time" name="timebox">
        <label>Table</label>
        <input type="text" name="tablebox" required>
        <!--this allows us to check which type of form was used-->
        <input type="hidden" value="book" name="book">
        <input type="submit" value="book">
        
    </form>

    
    

<?php
include('footer.php');

?>