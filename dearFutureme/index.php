<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
 ?>
  	<style type = "text/css">
 		#text{

 			height: 25px;
 			border-radius: 5px;
 			padding: 4px;
 			border: solid thin #aaa;
 			width: 100%;
 		}

 		#button{

 			padding: 10px;
 			width: 100px;
 			color:white;
 			background-color: lightblue;
 			border: none;
 		}

 		#box{

 			background-color: gray;
 			margin: auto;
 			width: 300px;
 			padding: 20px;
 		}

 		.body{
 			align-content: center;
 			text-align: center;
 		}

 	</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Website</title>
</head>
<body class="body">

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Hello, <?php echo $user_data['user_name']," ", $user_data['password'] ;?>, How you doin buddy?
</body>
</html>