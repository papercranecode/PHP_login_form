<?php

//Write an SQL query that finds the total age of people who have an 's' or a 'O' in their name;

$query = "SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s|O%';"; //returns null
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s%' AND `fullname` NOT LIKE '%O%'; //returns a valid result
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s%' AND '%O%'; //returns null
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s%' AND WHERE `fullname` LIKE '%O%'; //syntax error
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s|O%' GROUP BY `fullname`; //returns empty set
//SELECT SUM(`age`) FROM `users` WHERE `fullname` LIKE '%s%' AND `fullname` LIKE '%O%'; //returns wrong number
//SELECT SUM(`age`) FROM `users` WHERE `fullname` REGEXP '%s%|%O%'; //returns null

?>
