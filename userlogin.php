<?php

//starts the session 
    session_start();     
    //checks if the session has been initiated
    if(isset($_SESSION['user_session']))
      {
        //if it is, it takes us to the delete page  
        header('Location: booking.php');
      }


include_once('functions/functions.php');
dbconnect();
if(isset($_POST['btn-login'])){
    $uname = $_POST['namebox'];
    $upass = $_POST['passwordbox'];
    $cryptpass=hash("SHA256",$upass);

    
    try
       {
          $stmt = $conn->prepare("SELECT * FROM people WHERE username=:uname AND password=:upass LIMIT 1");
          $stmt->bindParam(':uname', $uname);
          $stmt->bindParam(':upass', $cryptpass);
    
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                session_start();
                $_SESSION['user_session'] = $userRow['username'];
                header('Location: booking.php');
             }
             else
             {
                header('Location: userlogin.php');
                echo '<script>alert("Please login to book a table");</script>';
             }
      }
        
    
       catch(PDOException $e){
           echo $e->getMessage();
       }
}
    include('header.php'); ?>
    <h2>Michel's Restaurant</h2>
    <!--this is the login form-->
    <p>Login to book a table</p>
    <form method="POST" data-ajax="false">
        <label>Name</label>
        <input type="text" name="namebox" required>
        <label>Password</label>
        <input type="password" name="passwordbox" required>
        <input type="submit" value="Login" name="btn-login">
    </form>
<?php include('footer.php');?>