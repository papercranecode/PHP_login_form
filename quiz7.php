<?php

//Write an SQL query that finds the total age of people who have an 's' or a 'O' in their name;

$query = "SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s|O%';"; //returns null
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s%' AND `fullname` LIKE '%O%';"; //returns wrong number
//SELECT SUM(`age`) FROM `users` WHERE `fullname` REGEXP '%s%|%O%'; //returns null

?>
