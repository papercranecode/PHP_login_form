<?php

//Write an SQL query that finds where people live whose favourite beverage ISN'T water and are over 29 from the table users;

$query = "SELECT `fullname`, `location` FROM `users` WHERE `beverage` <> 'water' AND `age` >= '29';";

//Result:
// +-------------+---------------+
// | fullname    | location      |
// +-------------+---------------+
// | Oli Ward    | Bedminster    |
// | Simon Capet | College Green |
// | Simon New   | Montpelier    |
// +-------------+---------------+

?>