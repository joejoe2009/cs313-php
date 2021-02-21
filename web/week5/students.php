<?php
require_once '/app/web/model/main-model.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//get_db() function created in connection.php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Students</title>
</head>

<body>
<?php
$students = getStudents();
foreach($students as $row)

            {
            // The variable "row" now holds the complete record for that
            // row, and we can access the different values based on their
            // name
            $name = $row['name'];
            $username = $row['username'];
            $password = $row['password'];
            echo "<p><strong>$name $username $password</strong><p>";

            // if($search_name == $row['name'] || $search_username == $row['username']) {
            //     array_push($nameArray, $row['name']);
            //     array_push($nameArray, $row['username']);
            //     array_push($nameArray, $row['password']);
            // } 
        }




​//$success = updateStudent($id, $name, $username, $password);
//if($success){
    
//}

?>

<form method="post" action="./addStudents.php">
        Name: <input type="text" name="name" value="<?php echo $name;?>">

        Username: <input type="text" name="username" value="<?php echo $username;?>">
        
        pswword: <input type="text" name="password" value="<?php echo $password;?>">
        
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

        Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other
<input type="submit">
</form>

    <nav>
    <li></li>
    <li></li>
    <li></li>
    </nav>
</body>
</html>
