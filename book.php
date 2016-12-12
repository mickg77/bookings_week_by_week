<?php

include('header.php');

include_once('functions/functions.php');


if($_POST["book"]=="book"){
   
    add_record();


    
   echo' <p>Record added.</p>
    <a href="index.php" rel="external">Go home</a>';


}
else {
    
    header('Location: index.php');
}

include('footer.php');
?>

