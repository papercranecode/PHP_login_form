
// What do these functions do? 

mysqli_query() -> Connects to a MySQL database server.

mysqli_fetch_assoc() -> Returns an associative array that corresponds to the row we have fetched. Returns false if there are no more rows. Field names are case sensitive.

mysqli_num_rows() -> Returns the number of rows present in the result set. Can be used to check if there is any data in the database yet. A connection to the MySQL database must first be established.

mysqli_affected_rows() -> Returns the number of affected rows in a previous MySQL query. Can be used to determine whether subsequent code should run or not.

mysqli_insert_id() -> Returns an ID, generated using AUTO_INCREMENT, used in a previous MySQL query.
