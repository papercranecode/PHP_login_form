<?php
$db_connection = new mysqli("localhost", "root", "root", "scotchbox"); //this is the MySQL library I created
// Check connection to the MySQL database
if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error); //this stops the script and the below code doesn't run
}