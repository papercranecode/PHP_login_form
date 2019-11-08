<?php
include('database.php');

// need the code
// need to check we can find it in database
// if we can find it, check that account isn't already activated
// if all is good, we want to update their account to be activated UPDATE SET activated_status = 1
// check the query
// show them success message, tell them to go login

//declare variables
$error_messages = []; //an empty array for our list of error messages
$success_message = "";
$error = false; // assume no problems yet
$success = false;
$code = "";
$email = "";
$password = "";

if (isset($_GET['code'])){ //code is the activation code that appears in the browser when you run it
    // echo "This is the isset GET part";
    // we're good to go

    $code = mysqli_real_escape_string($db_connection, $_GET['code']); //$code is the code we get from the database connection

    // check the code is in the database, find the record with that code
    $query = "SELECT * FROM `accounts` WHERE `activation code` = '$code';"; // we go into the db, and look for the code

    $result = mysqli_query($db_connection, $query); // Performs a query on the database

    // $clean_code = mysqli_real_escape_string($db_connection, $code);

    
    if (mysqli_num_rows($result) > 0){ //if the result is greater than 0, then it means we have a match on that code
        // we have a match
        $row = mysqli_fetch_assoc($result); // Fetch a result row as an associative array. $row is the variable we store the array in

        // var_dump($row);

        if ($row['activated status'] == 1){ // if $row, which is the result from above, is equal to 1 already, then the account is                                            already activated
            // already activated, give message
            $error = true;
            $error_messages[] = "Your account has already been activated.";

        }else{
            // we're ready to activate
            // UPDATE `test` SET `last updated` = current_timestamp WHERE x = y;

            $query = "UPDATE `accounts` SET `activated status` = 'active' WHERE `activation code` = '$code';";
            $result = mysqli_query($db_connection, $query);
                // echo $query;
            if ($result){
                // echo "This is the query result part"; 
                // query ran okay and we have a result
                if (mysqli_affected_rows($db_connection) == 1){ //this checks if at least 1 row was affected
                    // echo "this is the affected rows success update part";
                    // and we changed 1 or more rows of data
                    // all good, then we want to "activate" their account
                    $success = true;
                    //we need to echo out the success message at the bottom of the page for it to show up!
                    $success_message = "Your account has been created! Log in <a href=\"http://scotchbox/login.php?\">here!</a>";

                }else{ //we didn't manage to activate the account
                    // echo "This is the result failed contact support part";
                    $error = true;
                    $error_messages[] = "Sorry, something went wrong, please contact support";
                }
                
            }else{
                echo 'hi';
            }
        }

    }else{
        // echo "this is the oh dear part";
        $error = true;
        $error_messages[] = "Oh dear, something went wrong";
    }
    
}else{
    // echo "This is the couldn't find activation code part";
    $error = true;
    $error_messages[] = "Couldn't find activation code"; 
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


//for login page, use activation code in MySQL table

?>

