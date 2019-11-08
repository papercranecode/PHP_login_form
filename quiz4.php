1. What is $result and $row in this example? 
2. What do they contain if the query in $query returns some rows of data?


$query = "SELECT * FROM users;";
$result = mysqli_query($mysql_connection, $query);
$row = mysqli_fetch_assoc($result);

ANSWER:

1.
$result: this code performs a query on the database, in this case we are connecting to the database and performing the above query on it, which is to select all information from the table `users`.

$row: in this example $row is the variable in which we store the associative array from the database row we have fetched.


2.
$result is the variable in which we store the information we have queried from the MySQL database.

$row is the variable in which we store the associative array from the $result query in.