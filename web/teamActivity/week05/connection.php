<?php
function get_db()
{
  try {
    // default Heroku Postgres configuration URL
    // this is a built in function in php to get the value from an enviornment variable
    $dbUrl = getenv('DATABASE_URL');

    //if we are on heroku this will be set otherwise we can check for a local connection
    //heroku takes care of all of this for us
    if (!isset($dbUrl) || empty($dbUrl)) {
      // example localhost configuration URL with 
      // user: "my_username"
      // password: "my_password"
      // database: "my_database"

      // hardcoded for debugging only not for production site
      $dbUrl = "postgres://my_username:my_password@localhost:5432/my_database";
    }

    // Get the various parts of the DB Connection from the URL
    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"], '/');

    // Create the PDO connection
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Now we can use $db->

  } catch (PDOException $ex) {
    // for debugging only not for production site
    echo "Error connecting to DB. Details: $ex";
    die();
  }
  return $db;
}
