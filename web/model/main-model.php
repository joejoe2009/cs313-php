<?php

require_once '/app/web/week5/connection.php';

function getStudents(){
    $db = get_db();
    $sql = "SELECT name, username, password FROM students";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}

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

function updateStudent($id, $name, $username, $password){
    $db = get_db();
    $sql = 'UPDATE students SET name = :name, username = :username, password = :password WHERE id = :id;';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

