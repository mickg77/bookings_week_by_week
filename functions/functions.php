<?php


      $servername ="localhost";
      $username ="mickg77";
      $password ="";
      $dbname ="c9";
    
    //global connection to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function dbconnect(){  
    global $servername, $username, $password, $dbname;
    
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "Connected successfully"; 
    }
    
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}
    
function add_record(){
    //function adds to the database
   global $conn;
   
    try{
    
     
    
      
    $name=$_POST["namebox"];
    $date=$_POST["datebox"];
    $time=$_POST["timebox"];
    $mytable=$_POST["tablebox"];
    
    $stmt = $conn->prepare("INSERT INTO bookings (name, date,time,mytable) VALUES (:name, :date, :time, :mytable)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':mytable', $mytable);
    
    $stmt->execute();
    
  
}
catch(PDOException $e) {
    echo "Error: " .$e->getMessage();
    
}
$conn = null;
    
}

function display_all(){
    
     //function to display all of the records in the bookings table
    global $servername, $username, $password, $dbname, $conn;
   
   try{
    dbconnect();
    
   
    
        $stmt = $conn->prepare("SELECT * FROM bookings");
        $stmt->execute();
    
        //$result=$stmt->fetchAll();
        echo '<table>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo '
        <tr>
          <td>'.$row["booking_id"].'</td>
          <td>  '.$row["name"].'</td>
          <td>  '.$row["date"].'</td>
          <td>  '.$row["time"].'</td>
          </tr>
    ';
}
echo '</table>';
   
       
   
   }
   catch(PDOException $e) {
    echo "Error: " .$e->getMessage();
    
}
$conn = null;

}//end of display all

function delete_record(){
    
    //function to display all of the records in the bookings table
  //function to display all of the records in the bookings table
    global $servername, $username, $password, $dbname,$conn;
   try{
    //dbconnect();
    
    
   
    
        $stmt = $conn->prepare("SELECT * FROM bookings");
        $stmt->execute();
    
        
        
        echo '<div id="results"> <table>';
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    echo '
        <tr>
          <td>'.$row["booking_id"].'</td>
          <td>  '.$row["name"].'</td>
          <td>  '.$row["date"].'</td>
          <td>  '.$row["time"].'</td>
          <td><a rel="external" onclick="return checkDelete();" href="delete.php?action=delete&booking_id='.$row["booking_id"].'">Delete this!</a>
          <td><a rel="external" onclick="return checkDelete();" href="delete.php?action=amend&booking_id='.$row["booking_id"].'">Amend this!</a>

          </td></tr>
    ';
}

echo '</table></div>';


       
   
   }
   catch(PDOException $e) {
    echo "Error: " .$e->getMessage();
    
}
    //if submitted action was delete
    
   if($_GET['action'] == 'delete') { // if delete was requested AND an id is present...
    
    
    $num=$_GET['booking_id'];
    
    $stmt = $conn->prepare("DELETE FROM bookings WHERE booking_id = :num");
    $stmt->bindParam(':num', $num);
    
    $stmt->execute();

    
    
    if($stmt){
       echo 'Record Deleted.';
       echo '<script>location.href="delete.php";</script>';
        
      
    }
    else {
        echo "There is an Error ".$sql."<br/> ".mysqli_error($conn);
    } 
   }
    
    //this is for amending a record
    
    if($_GET['action'] == 'amend') { // if amend was requested AND an id is present...
    
    $num=$_GET['booking_id'];
    
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE booking_id = :num");
    $stmt->bindParam(':num', $num);
    $stmt->execute();
    
    
    if($stmt){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       
      echo '
       <form method="POST" data-ajax="false" action="update.php">
        <label>Name</label>
        <input type="hidden" name="id" value="'.$row['booking_id'].'">
        <input type="text" name="namebox" required value="'.$row['name'].'">
        <label>Date</label>
        <input type="date" name="datebox" value="'.$row['date'].'">
        <label>Time</label>
        <input type="time" name="timebox" value="'.$row['time'].'">
        <label>Table</label>
        <input type="text" name="tablebox" value="'.$row['date'].'" required>
       
        
        <input type="submit" value="Make Changes" name="submit"  >
        
    </form>
       ';
       
        
      
    }
    else {
        echo "There is an Error ".$sql."<br/> ".mysqli_error($conn);
    }
    }
    
    
   
    
    
$conn = null;
}//end of display all

?>