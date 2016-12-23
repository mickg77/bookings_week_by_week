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
</head> 
<body>
	
	<div data-role="page" id="demo-page" data-theme="c">
		<div data-role="panel" id="mypanel">
		<h2>List Icons:</h2>
    <ul data-role="listview" data-inset="true">    
    
      <li data-icon="false"><a href="index.php" data-icon="false">Home</a></a></li>
      <li data-icon="false"><a href="register.php" data-icon="false">Register</a></a></li>
      <li data-icon="false"><a href="login.php" data-icon="false">Login</a></a></li>
      <li data-icon="false"><a href="logout.php" data-icon="false">Logout</a></a></li>
    </ul>
</div><!-- /panel -->
	<div data-role="header" data-position="fixed"> 
    <h1 onload="getCookie('username')">My Restaurant</h1>
    <a href="#mypanel" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-corner-all" data-ajax="false"></a>
</div>

<div role="main" class="ui-content">

     
