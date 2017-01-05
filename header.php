<!DOCTYPE html> 
<html> 
<head> 
	<title>Page Title</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="js/myjs.js"></script>
	<link rel="stylesheet" href="css/michael.css" />
<link rel="stylesheet" href="themes/colours.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="css/800.css" />
</head> 
<body>
	
	<div data-role="page" id="demo-page" data-theme="b">
	  <div id="mainmenu">
	  <ul>
	  <li><a href="index.php" data-icon="false">Home</a></li>
      <li data-icon="false"><a href="booking.php" data-icon="false">Book a table</a></li>
      <li data-icon="false"><a href="userlogin.php" data-icon="false">User Login</a></li>
      <li data-icon="false"><a href="register.php" data-icon="false">Register</a></li>
      <li data-icon="false"><a href="login.php" data-icon="false">Admin Login</a></li>
      <li data-icon="false"><a href="logout.php" data-icon="false">Logout</a></li> 
	  </ul>
	</div>
		<div data-role="panel" id="mypanel">
		<h2>Site Menu: </h2>
    <ul data-role="listview" data-inset="true">    
    
      <li data-icon="false"><a href="index.php" data-icon="false">Home</a></a></li>
      <li data-icon="false"><a href="booking.php" data-icon="false">Book a table</a></a></li>
      <li data-icon="false"><a href="userlogin.php" data-icon="false">User Login</a></a></li>
      <li data-icon="false"><a href="register.php" data-icon="false">Register</a></a></li>
      <li data-icon="false"><a href="login.php" data-icon="false">Admin Login</a></a></li>
      <li data-icon="false"><a href="logout.php" data-icon="false">Logout</a></a></li>
    </ul>
</div><!-- /panel -->
	<div data-role="header" data-position="fixed"> 
    <h1>My Restaurant</h1>
    <a href="#mypanel" id="reveal" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all" data-ajax="false"></a>
</div>

<div role="main" class="ui-content">

     
