<?php
require_once("db_connect.php");
$customerID = rand(0, 8388607);;
$forename = $conn->real_escape_string($_POST['forename']);
$surname = $conn->real_escape_string($_POST['surname']);
$dateofbirth= $conn->real_escape_string($_POST['dateofbirth']);
$formatdateofbirth = date("Y-m-d", strtotime($dateofbirth));
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// SQL query to insert data
$sql = "INSERT INTO customers (customerID,customer_forename,customer_surname,date_of_birth,customer_email, password_hash) VALUES ('$customerID','$forename','$surname','$formatdateofbirth','$email','$hashed_password')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "New customer registered successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
