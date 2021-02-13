<?php
function get_db()
{
  try {
    // default Heroku Postgres configuration URL
    // this is a built in function in php to get the value from an enviornment variable
    //$dbUrl = getenv('DATABASE_URL');
​
    // Get the various parts of the DB Connection from the URL
    $dbopts = parse_url(getenv('DATABASE_URL'));
​
    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');
​
    // Create the PDO connection
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
​
    // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Now we can use $db->
​
  } catch (PDOException $ex) {
    // for debugging only not for production site
    echo "Error connecting to DB. Details: $ex";
    die();
  }
  return $db;
}
?>