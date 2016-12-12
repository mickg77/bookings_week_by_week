<?php include('header.php'); 
include_once('functions/functions.php');
dbconnect();
if(isset($_POST['btn-reg'])){

    $uname = $_POST['namebox'];
    $password1 = $_POST['passwordbox1'];
    $password2 = $_POST['passwordbox2'];
    $email =$_POST['email'];
    try{
        
            $stmt = $conn->prepare('SELECT * FROM people WHERE username=:user');
            $stmt->bindParam(':user', $uname);
            $stmt->execute(); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
          
if($password1==$password2){
//the passwords match

            if( ! $row){
                
                    //row doesn't exist, on you go
                    $stmt = $conn->prepare('INSERT INTO people (username, email, password, active) VALUES (:uname, :uemail, :upass, "1")'); 
                    $stmt->bindParam(':uname', $uname);
                    $stmt->bindParam(':upass', $password1);
                    $stmt->bindParam(':uemail', $email);
                    $stmt->execute();
                   
         
         }
            
           
          else {
               echo('User already exists. Try a different username');
               
          }
}//password match if
else {
    echo '<p>Please try again. The passwords do not match</p>';   
}
}//end of try
      catch(PDOException $e){
           echo $e->getMessage();
}
}
?>
    
    <h2>Register for the site</h2>
    <!--this is the booking form-->
    <form method="POST" data-ajax="false" id="myform">
        <label>Name</label>
        <input type="text" name="namebox" required>
        <label>Password</label>
        <input type="password" name="passwordbox1" id="passwordbox1" required>
        <p id="passwordlength"></p>
        <label>Password</label>
        <input type="password" name="passwordbox2" required>
        <label>Email</label>
        <input type="email" name="email" required>
        
        
        <input type="submit" value="book" name="btn-reg">
        
    </form>
   
<?php
include('footer.php');

?>