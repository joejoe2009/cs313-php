<?php
function get_db()
{
  try {

    $dbUrl = getenv('DATABASE_URL');
    echo $dbUrl;
  
  } catch (PDOException $ex) {
    // for debugging only not for production site
    echo "Error connecting to DB. Details: $ex";
    die();
  }
  return $db;
}
?>