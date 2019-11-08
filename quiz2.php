<?php
$class1 = 'bob';
$class2 = 'sue';
echo "<p><span class='$class1 $class2'> \"Hello. she said\" </span></p>";


$protocol = 'https';
$domain = 'developme';
$tld = 'training';
echo "<a href=$protocol"."://".$domain."."."$tld>Click here!</a>";


$email = 'oliward@gmail.com';
$hashed_and_salted_password = 'i3289';
$salt = 'k3i2o';
$activation_code = "kjk39";
$query = "INSERT INTO `users` ('email', 'password', 'salt', 'activation_code') VALUES ('$email, '$hashed_and_salted_password', '$salt', '$activation_code');";

//1. line 4: conflicting opening ' and closing ", amended opening tag to "
//2. line 4: after the closing span tag, the " needs to be after she said
//3. line 4: can the variables be used as class names? Not throwing any errors though
//4. line 4: "" around Hello. she said must be escaped using \
//5. line 4: too many double quotes used, amended so that the whole echo uses "" and the class names inside use ''
//6. line 10: too many double quotes used, removed them and used '' instead
//7. line 10: added in extra double quotes so that the strings contcatonate properly
//8. line 17: opens with ' and closes with ", replaced opening quote with double quote
//9. line 17: replaced double quotes around $email with single quotes for consistency, removed uneccesary dots around variable names (we are inserting into columns in the database, not concatonating - right?), replaced backticks around $activation_code with single quotes

?>