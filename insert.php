<?php
require_once("db_connect.php");
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
// SQL query to insert data
$sql = "INSERT INTO customers (name, email, password) VALUES ('$name', '$email', '$password')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "New customer registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
