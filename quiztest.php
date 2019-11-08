<?php
$email = 'oliward@gmail.com';
$hashed_and_salted_password = 'i3289';
$salt = 'k3i2o';
$activation_code = "kjk39";
$query = "INSERT INTO `users` ('email', 'password', 'salt', 'activation_code') VALUES ("$email", '.$hashed_and_salted_password.'", "'.$salt.'', `$activation_code`);";
?>