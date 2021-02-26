<?php
//include ('/app/web/model/main-model.php');
require_once '/app/web/week5/connection.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password =  $_POST['password'];

echo $name;
function insertstudents($name, $username, $password){
    $db = get_db();
    $sql = 'INSERT INTO students (name, username, password) VALUES (:name, :username, :password )';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
     $rowsChanged = $stmt->rowCount();
     $stmt->closeCursor();
     echo "insertStudents";
    return $rowsChanged;
}


$success = insertstudents($name, $username, $password);
echo $success;

// if($success){
//  header('location: ./students.php');
//  } else{
//      header('location: ./students.php');
//  }

?>

