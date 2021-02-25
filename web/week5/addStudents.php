<?php
include ('/app/web/main-model.php');
require_once '/app/web/week5/connection.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password =  $_POST['password'];


//function iam($name)
    // $db = get_db();
    // echo "name" . $name;
    // $sql = 'INSERT INTO students (name, username, password) VALUES (:name, :username, :password )';
    // $stmt = $db->prepare($sql);
    // $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    // $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    // $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    // $stmt->execute();
    //  $rowsChanged = $stmt->rowCount();
    //  $stmt->closeCursor();
    //return "name3";
//}
//var_dump(function_exists('iam'));
echo "name 2" . $name; 
 ​echo iam($name);

 $success = insertstudents($name, $username, $password);
echo $success;
// if($success){
//  header('location: ./students.php');
//  } else{
//      header('location: ./students.php');
//  }

?>

