<?php
include ("../main-model.php");
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


function insertstudents($name, $username, $password){
    $db = get_db();
    echo "name" . $name;
    $sql = 'INSERT INTO students (name, username, password) VALUES (:name, :username, :password )';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
     $rowsChanged = $stmt->rowCount();
     $stmt->closeCursor();
    return $rowsChanged;
}
echo "name 2" . $name; 
// ​$success = insertstudents($name, $username, $password);
// if($success){
//  header('location: ./students.php');
//  } else{
//      header('location: ./students.php');
//  }

