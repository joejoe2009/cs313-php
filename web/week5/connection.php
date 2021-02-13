<?php
function get_db()
{
  try {

    echo getenv('DATABASE_URL');
  
  } catch (PDOException $ex) {
    // for debugging only not for production site
    echo "Error connecting to DB. Details: $ex";
    die();
  }
  return $db;
}
?>