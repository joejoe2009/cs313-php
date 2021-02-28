<?php
require_once '/app/web/model/main-model.php';


//get_db() function created in connection.php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Students</title>
<link rel="stylesheet" href="css/pr.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
  <div class="form-group">
  <label for="name">Name:</label>
     <input type="text" name="name" value="<?php echo $name;?>">
 </div>

 <div class="form-group">
  <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $username;?>">
    </div>
        
<div class="form-group">
 <label for="password">Passwword:</label>
 <input type="text" name="password" value="<?php echo $password;?>">
</div>
        

        Gender:
    <div class="form-check">
   <label class="form-check-label">
    <input type="radio" class="form-check-input" name="gender" value=<?php if (isset($gender) && $gender=="female") echo "checked";?>>Female
  </label>
</div>

<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="gender" value=<?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
</label>
</div>

<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="gender" value=<?php if (isset($gender) && $gender=="other") echo "checked";?>>Other
</label>
</div>
<input type="submit">
</form>

    <nav>
    <li></li>
    <li></li>
    <li></li>
    </nav>
</body>
</html>
