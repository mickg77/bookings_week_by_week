<?php

//starts the session 
    session_start();     
    //checks if the session has been initiated
    if($_SESSION['user_session']=='abc')
      {
        //if it is, it takes us to the delete page  
        header('Location: delete.php');
      }


include_once('functions/functions.php');
dbconnect();
if(isset($_POST['btn-login'])){
    $uname = $_POST['namebox'];
    $upass = $_POST['passwordbox'];
    //hashes the password before sending it to the query
    //$upass = password_hash($upass, PASSWORD_DEFAULT);
    echo $upass;
    try
       {
          $stmt = $conn->prepare("SELECT * FROM users WHERE username=:uname AND password=:upass LIMIT 1");
          $stmt->bindParam(':uname', $uname);
          $stmt->bindParam(':upass', $upass);
          $stmt->execute();
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
                session_start();
                $_SESSION['user_session'] = $userRow['username'];
                header('Location: delete.php');
             }
             else
             {
                header('Location: login.php');
                
             }
          }
       catch(PDOException $e){
           echo $e->getMessage();
       }
}?>
<?php include('header.php'); ?>
    <h2>Michel's Restaurant</h2>
    <!--this is the login form-->

    
    <form method="POST" data-ajax="false" name="login" onload="getCookie('username')">
        
        <label>Name</label>
        <input type="text" name="namebox" id="namebox" required onblur="setCookie('username',this.value)">
        <label>Password</label>
        <input type="password" name="passwordbox" required>
        <input type="submit" value="Login" name="btn-login">
    </form>
<?php include('footer.php');?>