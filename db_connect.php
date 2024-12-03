<?php
$servername = "localhost";
$username = "root"; // Use your database username
$password = ""; // Use your database password
$dbname = "if0_37772348_db_name"; // The name of your database

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
