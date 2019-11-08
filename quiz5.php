<?php

//Write an SQL query, to be run on mysql prompt, that finds all the names of people who live in Bedminster and like water from the table users;

$query = "SELECT `fullname`, `location` FROM `users` WHERE `location` = 'Bedminster' AND `beverage` = 'water';";

//result: 
// +--------------+------------+
// | fullname     | location   |
// +--------------+------------+
// | Kasia Pranke | Bedminster |
// +--------------+------------+

?>