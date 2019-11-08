<!DOCTYPE html>
<html>
	<head>
		<title>Logged in!</title>
		<meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        
        <style>
            
            body {
                margin: 0 auto;
                padding:  20px 40px;
            }
        
        </style>
    </head>
  
	<body>

<?php

session_start(); // start session

//declare variables:
$error_messages = []; //an empty array for our list of error messages
$success_message = "";
$error = false; // assume no problems yet
$success = false;
$code = "";
$login_email = "";
$login_password = "";

include('database.php');


if (isset($_SESSION['logged_in'])){ //we are using isset to check for a value
            if ('YES' == $_SESSION['logged_in']){
                //echo 'Welcome to your account!'; //the user is logged in, so we echo a welcome message
                ?>

                <h1 class="text-center">Welcome to your account</h1>
                <h2 class="text-center">You are logged in, do a victory dance!</h2> <!-- you can put PHP anywhere inside the HTML -->  
                <!-- <img src="http://placekitten.com/1600/500" alt="kitteh!" class="center-block"> -->
                <img src="https://media.giphy.com/media/jzaZ23z45UxK8/source.gif" alt="dance!" class="center-block">
                
                <p>Log out here</p>
                <?php
            }
        } 

    ?>

    </body>
</html>