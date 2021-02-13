<?php
require 'connection.php';
get_db() function created in connection.php
$db = get_db();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Students</title>
</head>

<body>
<?php
$statement = $db->prepare("SELECT name, username, password FROM students");
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
            // The variable "row" now holds the complete record for that
            // row, and we can access the different values based on their
            // name
            $name = $row['name'];
            $username = $row['username'];
            $password = $row['password'];
            echo "<p><strong>$name $username $password</strong><p>";
            } 

?>
</body>
</html>
