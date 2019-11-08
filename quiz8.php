What would happen if I submitted this form?:

With this PHP?
$email = $_POST['email'];
$query = "SELECT * FROM users WHERE email = '$email';";
$result = mysqli_multi_query($mysql_connection, $query);


ANSWER:
The email field contains a command to drop the `users` table from the MySQL table using DROP, presumably this means the code is in the HTML bit as a value, but if it exists within a PHP tag then could it make the MySQL database remove all users upon the sending of the form??

$email = $_POST['email']; - this checks if anything has been entered into the email field. As stated above, we have words in this field that could potentially make MySQL drop the whole table.

$query = "SELECT * FROM users WHERE email = '$email';"; - this code performs a query, we are selecting from the table users, and the row email, looking for an email that matches the email entered into the email field.

$result = mysqli_multi_query($mysql_connection, $query); - this code performs a query on the database, we are connecting to the database and performing the above query on it.


One possible result is that nothing will happen, because no password has been entered. Judging by the * next to password, I would think a password is required and that you will not be able to submit the form. Alternatively, if there is email validation on the email form, then it would not let you submit the data as it is not a valid email structure.

If a password is not required, and there is no email validation looking for whether the data entered is a valid email address or not, then the DROP code in the field becomes the value of $email. $query will then go into the database and look for the email.