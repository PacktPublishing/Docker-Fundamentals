<?php
$dbname = 'schtest';
$dbuser = 'schdbuser';
$dbpass = 'schdbpass';
$dbhost = 'db';

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: <br />\n";
    echo "Errno: " . $mysqli->connect_errno . "<br />\n";
    echo "Error: " . $mysqli->connect_error . "<br />\n";
    exit;

} else {
    $sql = "SHOW TABLES FROM $dbname";
    if (!$result = $mysqli->query($sql)) {
        // Oh no! The query failed.
        echo "Sorry, the website is experiencing problems.";

        // Again, do not do this on a public site, but we'll show you how
        // to get the error information
        echo "Error: Our query failed to execute and here is why: <br />\n";
        echo "Query: " . $sql . "<br />\n";
        echo "Errno: " . $mysqli->errno . "<br />\n";
        echo "Error: " . $mysqli->error . "<br />\n";
        exit;
    }

    if ($result->num_rows === 0) {
        echo "We couldn't find any tables? Let's create a new table!\n";
        $createsql = 'CREATE TABLE mytable (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL)';
        if (!$result = $mysqli->query($createsql)) {
          // Oh no! The query failed.
          echo "Sorry, we could not create a table.<br />\n";

          // Again, do not do this on a public site, but we'll show you how
          // to get the error information
          echo "Error: Our query failed to execute and here is why: <br />\n";
          echo "Query: " . $createsql . "<br />\n";
          echo "Errno: " . $mysqli->errno . "<br />\n";
          echo "Error: " . $mysqli->error . "<br />\n";
          exit;

        }
        $result = $mysqli->query($sql);

    }
    $actor = $result->fetch_assoc();
    print_r($actor);
}