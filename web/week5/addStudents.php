<?php
include ("./main-model.php");
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

​$success = insertstudents($name, $username, $password);
if($success){
 header('location: ./students.php');
 } else{
     header('location: ./students.php');
 }

