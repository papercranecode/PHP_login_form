<!-- 
1.Form
2.PHP form handling
3.Check user input
4.Create an activation code - requirements?
5.Save in database (will need to CREATE TABLE first)
6.Send activation email
7.Account creation success message 
-->


<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
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

        //session_start(); - this is not needed because we are not using $_SESSION
        // set the defaults
        $error_messages = [];
        $success_message = "";
        $error = false; // assume no problems yet
        $success = false;
        $email = "";
        $password = "";

        include('database.php');

        //checking for errors in the form first
        if ($_POST) { //this checks if something has been typed into any of the fields, if empty then code below won't run
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmpassword = $_POST["confirmpassword"];

            if ((!$password) OR (!$confirmpassword)){ //if either of the password fields are empty, run the below code
                $error = true;
                $error_messages[] = 'Please fill in both password fields';
            }elseif ($password != $confirmpassword) { //if the password and confirm password are not the same, run below code
                $error = true;
                $error_messages[] = 'Passwords don\'t match';
            }elseif(!password_check($password)){ //if the password is less than 8 chars, run the below code
                $error = true;
                $error_messages[] = 'Password isn\'t strong enough';
            }

            if (!$email){ //if all fields are empty run the below code
                $error = true;
                $error_messages[] = 'Please provide an email address';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //this validates the email entered
                $error = true;
                $error_messages[] = 'Please provide a valid email address'; //if it doesn't pass, run this code
            }


            if (!$error){ //if there is NO error, run the below code:
                // make activation code
                $activation_code = hash('sha256', $password.time().'sjkdlfjasldkj'.rand(0,100000)); //this creates a random password hash

                // prepare our data for the database
                $clean_email = mysqli_real_escape_string($db_connection, $email);

                $password = md5($password);

                $clean_password = mysqli_real_escape_string($db_connection, $password);

                $clean_activation_code = mysqli_real_escape_string($db_connection, $activation_code);

                $query = "INSERT INTO `accounts` (`email`, `password`, `activation code`) VALUES ('$clean_email', '$clean_password', '$clean_activation_code');"; 

                //$test_result = mysqli_query($db_connection, "CREATE TABLE `test2`");

                $result = mysqli_query($db_connection, $query);


                if ($result){
                    // query ran okay
                    if (mysqli_affected_rows($db_connection) == 1){ //this checks if at least 1 row was affected
                        // and we changed 1 or more rows of data

                        // then we send this email:
                       // $success_email = "Click on the link to activate your account: $activation_code"; //this sends activation code
                        $headers = "From: Kristin <team@example.com>\r\n";
                        $headers .= "Reply-To: Help <help@example.com>\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html;\r\n";
                        $subject = "Your account has been created"; //subject of email that is sent

                        //email body
                        $success_email = "Hi " . $email . "<br /> <br />
                        Please click the link below to activate your new account. <br /> <br />
                        <a href=\"http://scotchbox/activation.php?code=$activation_code\">Click Me!</a>"; //this makes the activation code the link


                        if (mail($email, $subject, $success_email, $headers)){ //this sends the email to MailHog

                            // echo success message on the same page
                            $success = true;
                        }else{
                            $error = true;
                            $error_messages[] = "We couldn't create your account :'(";
                        }

                    }elseif(mysqli_affected_rows($db_connection) != 1){ // if we did NOT affect at least 1 row, run the below code:
                        echo "mySQL affected rows error";
                        // Uh oh, something went wrong
                        $error = true;
                        $error_messages[] = "Whoopsie, we seem to have a little error.";
                    
                }else{
                    echo "result error";
                    // Uh oh, query didn't run! A problem with the query
                    $error = true;
                    $error_messages[] = "Uh oh, the query didn't run. Sorry about that.";
                }
            }
        }
    }

        //call a validation function
        function password_check($password) { //if the password is less than 8 characters it returns false/gives error
            if (strlen($password) < 8){
                // too short
                return false;
            }
            return true;
            //if pw length too short return false, if doesn't contain special chars return false, if ... return false
            //if it goes past all of these without running then we get to the return true at the end which means everything was fine
        }

        // var_dump($_POST);

        ?>

        <h1>Register for an account today!</h1>

        <?php
        if ($success){ ?>
            <p>Great success, your account has been created! Log in <a href="http://scotchbox/login.php?">here!</a></p>
        <?php
        }else{
            if ($error){ //if there is an error, we echo out the error  under the h1 tag. we could also do an alert?
                foreach($error_messages AS $message){
                    echo '<p>'.$message.'</p>'; //echoing out error messages in a paragraph
                }
            } 
            // ?php var_dump($error_messages); var_dump($success_message); - this goes after the form!!
            ?>
            
            <!-- This is the form -->
                <form action="register.php" method="POST"><!--  needs to be post because we are hanling sensitive data -->

            <!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
                <label for="email">Email</label><br />
                <input type="text" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>" placeholder="Please enter an email" required> 

                <br />
                <br />

            <!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
                <label for="password">Password</label><br />
                <input type="password" name="password" value="" placeholder="Please enter a password" required>
                <br />
                <label for="password">Confirm Password</label><br />
                <input type="password" name="confirmpassword" value="" placeholder="Confirm your password" required>
                <br />
                <br />

                <input type="submit" value="Create account" class="btn btn-primary">

            </form>
        <?php } ?>

    </body>
</html>