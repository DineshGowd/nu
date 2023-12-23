<?php
// Database credentials
$hostname = "127.0.0.1";
$port = "3306";
$username = "root";
$password = "root123";
$dbname = "blogPriyanka";

// Create connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
