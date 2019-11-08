<!-- 1. build the html form
 2. need the code from the activation page?
 3. link the MySQL table and check the user's login details against credentials in table
 4. if credentials don't match, echo an error message
 5. if credentials do match, echo a success message 
 6. check if user is already logged in before sending the form -->



<!DOCTYPE html>
<html>
	<head>
		<title>Log in</title>
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

    //we want to run the session check for the user already being logged in before the rest of the code, otherwise no point
    
    //this bit is the same as on the register.php page - using POST for security as we're handling sensitive data
    // don't need to use isset, because we don't have any values we want to read
    if ($_POST) { //this checks if something has been typed into any of the fields, if empty then code below won't run
        // echo "POST bit at the top";
        // var_dump($_POST);
        $email = $_POST["email"];
        $password = $_POST["password"];

        //checking for errors in the form first
        if (!$password){ //if  the password field is empty, run the below code
            // echo "please fill in both password fields";
            $error = true;
            $error_messages[] = 'Please fill in both password fields';
        }

        if (!$email){ //if all fields are empty run the below code
            // echo "please provide an email bit";
            $error = true;
            $error_messages[] = 'Please provide an email address';
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //this validates the email entered
            // echo "please provide a valid email address bit";
            $error = true;
            $error_messages[] = 'Please provide a valid email address'; //if it doesn't pass, run this code
        }

        if (!$error){ //if there is NO error above, run the below code:
            //check the data that was submitted against the database
            //if it's a match, log the person in
            // echo "no error";
            $md5_password = md5($password);

            $query = "SELECT * FROM `accounts` WHERE '$email' = `email` AND '$md5_password' = `password`;"; //md5 on password
            $result = mysqli_query($db_connection, $query);
            if ($result){
                // query ran okay
                if (mysqli_num_rows($result) > 0){ //if the result is greater than 0, then it means we have a match on that code
                    // check if rows are affected, >1 - check for the hashed password, do an md5 on the password
                    $_SESSION['logged_in'] = 'YES';

                    header("Location: account.php");
                    exit;
                }else{
                    // todo
                    echo 'oh no';
                    $error = true;
                    $error_messages[] = "Uh oh, something went wrong";
                }
            }else{
                echo 'uh oh 2';
                $error = true;
                $error_messages[] = "Uh oh, something went wrong 2";
            }
        }
        else{ //we couldn't log in above, so echo an error message
            // echo "couldn't log in";
            $error = true;
            $error_messages[] = "Couldn't log in, please contact support";
        }
    }

    if ($success){
        echo $success_message; //if the query was successful, we echo put the success message here
    }
    
    if ($error){
        foreach($error_messages AS $message){
            // echo "this is the foreach echo messages part";
            echo '<p>'.$message.'</p>'; //echoing out error messages in a paragraph
        }
    } 

    ?>



    <h1>Log in to your account</h1>

    <!-- This is the form -->
    <form action="" method="POST"><!--  needs to be post because we are handling sensitive data -->

<!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
    <label for="login_email">Email</label><br />
    <input type="text" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" placeholder="Please enter an email" required> 

    <br />
    <br />

<!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
    <label for="login_password">Password</label><br />
    <input type="password" name="password" value="" placeholder="Please enter a password" required>

    <br />
    <br />

    <input type="submit" value="Log in" class="btn btn-primary">

    </body>

</html>