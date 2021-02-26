<?php
include ('/app/web/model/main-model.php');
require_once '/app/web/week5/connection.php';
$name = $_POST['name'];
$username = $_POST['username'];
$password =  $_POST['password'];




$success = insertstudents($name, $username, $password);
echo "success = " . $success;

 if($success){
 header('location: ./students.php');
 } else{
    header('location: ./students.php');
 }

?>

