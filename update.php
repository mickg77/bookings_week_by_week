<?php
//starts the session 
    session_start();    
    include_once('functions/functions.php');
    //checks if the session has been initiated
    if(!isset($_SESSION['user_session']))
      {
        //if not, it takes us back to the main page  
        header('Location: login.php');
      }
    else{
      if(isset($_POST['submit'])){
        
          $id=$_POST["id"];    
          $name=$_POST["namebox"];
          $date=$_POST["datebox"];
          $time=$_POST["timebox"];
          $mytable=$_POST["tablebox"];
  
          $stmt = $conn->prepare("UPDATE bookings SET name=:name, date=:date,time=:time,mytable=:mytable WHERE booking_id=:id");
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':date', $date);
          $stmt->bindParam(':time', $time);
          $stmt->bindParam(':mytable', $mytable);
          $stmt->bindParam(':id', $id);
          echo '<script>console.log("blah")</script>';
          $stmt->execute();
            if($stmt){
              echo '<script>alert("Record Updated")</script>';
        
            }
    
            else {
              echo "There is an Error ".$sql."<br/> ".mysqli_error($conn);
            }
      }else {header('Location:login.php');}
    
    }
    
    
include('header.php');
include_once('functions/functions.php');
echo '<h3>Welcome '.$_SESSION['user_session'].'
</h3>';


include('footer.php');
?>

